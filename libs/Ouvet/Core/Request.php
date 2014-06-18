<?php

/**
 * Class Request
 * @author Vygandas Pliasas <vygandas@outlook.com>
 * @package Ouvet\Core
 */
class Request {

    private static $aParameters;

    /**
     * Get data sent to current url
     * @return string
     */
    public static function GetData() {
        $tmpRequestData = '';
        if (isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH'] > 0) {
            $httpContent = fopen('php://input', 'r');
            while ($data = fread($httpContent, 1024)) {
                $tmpRequestData .= $data;
            }
            fclose($httpContent);
        }
        return $tmpRequestData;
    }

    /**
     * Get request method (POST/GET/DELETE/PUT)
     * @return string
     */
    public static function Method() {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Get URI
     * @return string
     */
    public static function Uri() {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * Get URL
     * @return string
     */
    public static function Url() {
        $pu = parse_url($_SERVER['REQUEST_URI']);
        if(!empty($pu["host"])) {
            return $pu["scheme"] . "://" . $pu["host"];
        } else {
            return '/';
        }
    }

    /**
     * Set request parameters
     * @param $aP
     */
    public static function SetParameters($aP) {
        self::$aParameters = $aP;
    }

    /**
     * Get all request parameters
     * @return array
     */
    public static function GetParameters() {
        return self::$aParameters;
    }

    /**
     * Get one request parameter by name
     * @param $sKey
     * @return mixed
     */
    public static function Get($sKey) {
        return self::$aParameters[$sKey];
    }

}