<?php

/**
 * Class Configuration
 * @author Vygandas Pliasas <vygandas@outlook.com>
 * @package Ouvet\Core
 */
class Configuration
{
    private static $aConfig;

    /**
     * Initialize configuration component
     * @param $aConf
     */
    public static function Init($aConf)
    {
        self::setConfig($aConf);
    }

    /**
     * Set configuration array
     * @param $aConf , Configuration array to be used
     */
    public static function setConfig($aConf)
    {
        self::$aConfig = $aConf;
    }

    /**
     * @return mixed
     */
    public static function getConfig()
    {
        return self::$aConfig;
    }

    /**
     * Set configuration value by path
     * @param $sKeyPath , e.g. "system/environment"
     * @param $value , the value to be set
     * @return mixed, returns same value after setting it
     */
    public static function set($sKeyPath, $value)
    {
        $aPathExploded = explode("/", $sKeyPath);
        $temp = & self::$aConfig;
        foreach ($aPathExploded as $key) {
            $temp = & $temp[$key];
        }
        $temp = $value;
        unset($temp);
        return $value;
    }

    /**
     * Access settings by using path.
     * @param $sKeyPath , e.g. "system/controller_path"
     * @return mixed
     */
    public static function get($sKeyPath)
    {
        $tmp = self::$aConfig;
        foreach (explode('/', $sKeyPath) as $key) {
            $tmp = $tmp[$key];
        }
        return $tmp;
    }

}