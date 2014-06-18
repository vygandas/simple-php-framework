<?php

/**
 * Class Routes
 * @author Vygandas Pliasas <vygandas@outlook.com>
 * @package Ouvet\Core
 */
class Routes
{

    const GET = "GET";
    const POST = "POST";
    const DELETE = "DELETE";
    const PUT = "PUT";

    /**
     * All registered routes array
     * @var array
     */
    private static $aRoutes = array();

    /**
     * Initialize routing
     */
    public static function Init()
    {
        $sRoutingConfigFilePath = APPLICATION_ROOT . 'routing.php';
        if (file_exists($sRoutingConfigFilePath)) {
            require_once $sRoutingConfigFilePath;
        }
    }

    /**
     * Adds route to registry.
     * @param $sRoute , uri which has to be called in browser
     * @param $sController , target controller and target controllers action (method), e.g. index@HomeController
     * @param string $sMethod , this is GET,POST,PUT or DELETE web method
     * @param string $sName , name of this route so it could be accessed easily by calling R::ToNamed
     */
    public static function Add($sRoute, $sController, $sMethod = self::GET, $sName = "")
    {
        preg_match_all('/{(.*?)}/', $sRoute, $aRouteParameters);
        self::$aRoutes[] = array(
            "route" => $sRoute,
            "parameters" => $aRouteParameters[1],
            "controller" => $sController,
            "method" => strtolower($sMethod),
            "name" => $sName
        );
    }

    /**
     * Get controller and action from given route
     * @param $sRoute , e.g. /products/super-thing
     * @param string $sMethod , GET/POST/PUT/DELETE
     * @return string, controller name and action
     */
    public static function GetControllerByRoute($sRoute, $sMethod = self::GET)
    {
        $aExplodedGivenRoute = explode('/', strtok($sRoute, '?'));

        foreach (self::$aRoutes as $aRoute) {
            $aRemovedKeys = array();
            $aParametersCollection = array();
            $aExplodedRegisteredRoute = explode('/', $aRoute["route"]);
            $aExplodedRegisteredRouteCopy = $aExplodedRegisteredRoute;

            // Remove variables from registered route
            foreach ($aExplodedRegisteredRoute as $key => $sRegisteredRoute) {
                if ($sRegisteredRoute[0] == "{") {
                    unset($aExplodedRegisteredRoute[$key]);
                    $aRemovedKeys[] = $key;
                }
            }

            // Remove same key parts from given route
            foreach ($aRemovedKeys as $key) {
                $sParameterName = str_replace(['{', '}'], ['', ''], $aExplodedRegisteredRouteCopy[$key]);;
                $aParametersCollection[$sParameterName] = $aExplodedGivenRoute[$key];
                unset($aExplodedGivenRoute[$key]);
            }

            // Search for a match
            if (count(array_diff($aExplodedGivenRoute, $aExplodedRegisteredRoute)) == 0 && strtolower($sMethod) == $aRoute["method"]) {
                // Before return build parameter collection
                Request::SetParameters(array_merge($aParametersCollection, $_POST, $_GET));
                return $aRoute["controller"];
            }
        }

        Exceptions::DealWith("Controller not found", "404");
    }

    /**
     * Returns path to defined route by its name
     * @param $sRouteName
     * @param $aParameters , parameters for route
     * @return string
     * @throws Exception, if route not defined or not found
     */
    public static function ToNamed($sRouteName, $aParameters = array())
    {
        // TODO: implement parameters merge with route. E.g. array('a1'=>222, 'a2'=>555) - then route: /stuff/{a1}/something/{a2} resolves to /stuff/222/something/555
        // TODO: implement new URL mode: eg: route /stuff/a1/222/something/a2/555 would be /stuff-a1-222-something-a2-555. There has to be "-" replacement in cvase we want to pass "-" as a parameter
        $aResult = Arrays::Search(self::$aRoutes, "name", $sRouteName);
        if (count($aResult) > 0) {
            return $aResult[0]["route"];
        } else {
            throw new Exception("Route with name $sRouteName was not found.");
        }
    }

    /**
     * Find controller and route to it
     */
    public static function Dispatcher()
    {
        $sMethod = Request::Method();
        $sUri = Request::Uri();
        if (isset($sUri) && isset($sMethod)) {
            $mRequestData = Request::GetData();
            // Remove subdirectory mark from URL
            $sUrlString = substr($sUri, strlen(Configuration::get("system/base_url")));
            $sActionAndController = Routes::GetControllerByRoute($sUrlString, Request::Method());
            $aActionAndController = explode('@', $sActionAndController);

            $sControllerName = $aActionAndController[1];
            $sActionName = $aActionAndController[0];

            $mainViewPath = strtolower(str_replace('Controller', '', $sControllerName));
            //There is a directive after the / so that is going to be our controller
            $currentController = ucfirst($sControllerName);
            $controllerFile = $sControllerName . ".php";

            Configuration::set('system/current_view_path', Configuration::get('system/view_path') . $mainViewPath . "/");
            $$sControllerClassFilePath = APPLICATION_ROOT . Configuration::get('system/controller_path') . $controllerFile;

            Debug::AddLog("Controller loaded: " . $$controllerClassFilePath);

            if (file_exists($$sControllerClassFilePath)) {
                require_once($$sControllerClassFilePath);
            } else {
                Exceptions::DealWith("Can not find controller");
            }

            // Call controller constructor
            new $currentController($sControllerName, $sActionName, $mRequestData);
        } else {
            Exceptions::DealWith("Bad request", "400");
        }
    }

}

/**
 * Shortcut to routes
 * Class R
 * @extends Routes
 */
class R extends Routes
{

}