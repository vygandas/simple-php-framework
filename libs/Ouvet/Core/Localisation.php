<?php

/**
 * Class Localisation
 * Used for localisation and translation
 * @author Vygandas Pliasas <vygandas@outlook.com>
 * @package Ouvet\Core
 */
class Localisation
{

    private static $sTimezoneName;
    private static $sLanguage;
    private static $sLocale;

    /**
     * Constructor with default values setting
     */
    public static function Init()
    {
        self::SetTimezone(Configuration::get("localisation/timezone"));
        self::SetLanguage(Configuration::get("localisation/language"));
        self::SetLocale(Configuration::get("localisation/locale"));
        date_default_timezone_set(self::GetTimezone());
    }

    public static function GetTimezone()
    {
        return self::$sTimezoneName;
    }

    public static function SetTimezone($sTimezoneName)
    {
        self::$sTimezoneName = $sTimezoneName;
    }

    public static function GetLanguage()
    {
        return self::$sLanguage;
    }

    public static function SetLanguage($sLanguage)
    {
        self::$sLanguage = $sLanguage;
    }

    public static function GetLocale()
    {
        return self::$sTimezoneName;
    }

    public static function SetLocale($sLocale)
    {
        self::$sLocale = $sLocale;
    }

    public static function GetTranslation($sText)
    {
        // TODO: Implement translation engine
        return $sText;
    }

    public static function SetTranslation($sText)
    {
        // TODO: Implement translation engine
        return $sText;
    }
}
