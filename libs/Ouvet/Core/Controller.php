<?php

/**
 * Class Controller
 * @author Vygandas Pliasas <vygandas@outlook.com>
 * @package Ouvet\Core
 */
abstract class Controller
{
    public $viewBag;

    private $sViewHtmlFileName;

    private $sControllerMethodName;

    public $layout = "shared";

    /**
     * Constructs controller
     * @param $sControllerName
     * @param $sActionName
     * @param $aData
     */
    public function __construct($sControllerName, $sActionName, $aData)
    {
        $this->sAccessWebMethod = Request::Method();
        if (empty($aData)) {
            $aData = "{}";
        }
        $this->viewBag = json_decode($aData);
        if (empty($this->sViewHtmlFileName)) {
            $this->setSViewHtmlFileName(strtolower($sActionName));
        }
        try {
            $reflector = new ReflectionClass($this);
            $this->sControllerMethodName = $reflector->getMethod($sActionName);
            call_user_func($sControllerName . "::" . $sActionName);
        } catch (Exception $exc) {
            call_user_func($sControllerName . "::index");
        }
    }

    /**
     * Sets view html file
     * @param $sViewHtml
     */
    public function setSViewHtmlFileName($sViewHtml)
    {
        $this->sViewHtmlFileName = $sViewHtml . ".html";
    }

    /**
     * Get view html file name
     * @return mixed
     */
    public function getSViewHtmlFileName()
    {
        return $this->sViewHtmlFileName;
    }

    /**
     * Overrides view html file if another is given
     * @param $sViewHtml
     */
    private function tryOverrideViewHtml($sViewHtml)
    {
        if (!empty($sViewHtml)) {
            $this->setSViewHtmlFileName($sViewHtml);
        }
    }

    /**
     * Render view with master layout
     * @param string $sNewViewHtml , new name of view
     */
    public function View($sNewViewHtml = null)
    {
        $this->tryOverrideViewHtml($sNewViewHtml);
        $viewPath = _path(APPLICATION_ROOT . Configuration::get('system/current_view_path')) . $this->sViewHtmlFileName;
        //TODO: Make this settable from controller
        $sharedView = _path(APPLICATION_ROOT . Configuration::get('system/view_path')) . $this->layout . ".html";
        if (file_exists($viewPath)) {
            $this->smarty = new Smarty();
            $this->smarty->assign("baseUrl", Configuration::get("system/base_url"));
            foreach ($this->viewBag as $key => $value) {
                $this->smarty->assign($key, $value);
            }
            $contents = $this->smarty->fetch($viewPath);
            $this->sharedSmarty = new Smarty();
            $this->sharedSmarty->assign("baseUrl", Configuration::get("system/base_url"));
            $this->sharedSmarty->assign("contents", $contents);
            $this->sharedSmarty->display($sharedView);
        } else {
            header('HTTP/1.0 404 Not Found');
            echo "<h1>404 Not Found</h1>";
            echo "The page that you have requested could not be found.";
        }

        Debug::GetDevConsole();
    }

    /**
     * Renders only view (no layout)
     * @param string $sNewViewHtml , override automatic view
     */
    public function PartialView($sNewViewHtml = null)
    {
        $this->tryOverrideViewHtml($sNewViewHtml);
        $viewPath = _path(APPLICATION_ROOT . Configuration::get('system/view_path')) . $this->sViewHtmlFileName;
        if (file_exists($viewPath)) {
            $this->smarty = new Smarty();
            $this->smarty->assign("baseUrl", Configuration::get("system/base_url"));
            foreach ($this->viewBag as $key => $value) {
                $this->smarty->assign($key, $value);
            }
            $this->smarty->display($viewPath);
        } else {
            header('HTTP/1.0 404 Not Found');
            echo "<h1>404 Not Found</h1>";
            echo "The page that you have requested could not be found.";
        }
        Debug::GetDevConsole();
    }

    /**
     * Renders JSON output
     * @param $object
     */
    public function JSONView($object)
    {
        ob_start();
        ob_clean();
        header('Content-type: application/json');
        echo json_encode($object);
    }

}