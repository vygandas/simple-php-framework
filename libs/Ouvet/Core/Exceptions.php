<?php

/**
 * Class Exceptions
 * @author Vygandas Pliasas <vygandas@outlook.com>
 * @package Ouvet\Core
 */
class Exceptions
{

    /**
     * Deal with exception accordingly to current situation and parameter
     * @param $sMessage , Exception message
     * @param string $sType , Exception type
     */
    public static function DealWith($sMessage, $sType = "fatal")
    {
        switch ($sType) {
            case "fatal" :
                self::DoFatal($sMessage);
                break;
            case "404":
                self::Do404($sMessage);
                break;
            case "400":
                self::Do400($sMessage);
                break;
            default :
                self::DoFatal($sMessage);
                break;
        }
    }

    /**
     * Deal with fatal exception
     * @param $sMessage
     * @throws Exception
     */
    private static function DoFatal($sMessage)
    {
        if (Configuration::get("env") == "dev") {
            throw new Exception($sMessage);
        } else {
            ob_start();
            ob_clean();
            header("Location: /");
            exit;
        }
    }

    /**
     * Deal with not found
     * @param $sMessage
     */
    private static function Do404($sMessage)
    {
        ob_start();
        ob_clean();
        header($_SERVER["SERVER_PROTOCOL"] . " 404 $sMessage");
    }

    /**
     * Deal with bad request
     * @param $sMessage
     */
    private static function Do400($sMessage)
    {
        ob_start();
        ob_clean();
        header($_SERVER["SERVER_PROTOCOL"] . " 400 $sMessage");
    }

}