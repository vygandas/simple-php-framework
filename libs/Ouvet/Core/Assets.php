<?php

/**
 * Class Assets
 * @author Vygandas Pliasas <vygandas@outlook.com>
 * @package Ouvet\Core
 */
class Assets
{
    /**
     * Initialize assets
     */
    public static function Init()
    {
        self::CompileLess();
        self::CompileJs();
    }

    /**
     * Compile less files. If in development environment - compile every time.
     * If in production - compile only if there're new less file.
     */
    public static function CompileLess()
    {
        $sLessPath = APPLICATION_ROOT . Configuration::get('system/assets/less_full_path');
        $sCssPath = APPLICATION_ROOT . Configuration::get('system/assets/compiled_css_full_path');
        $less = new lessc;
        if (Configuration::get("env") == "dev") {
            try {
                $less->checkedCompile($sLessPath, $sCssPath);
            } catch (exception $e) {
                Exceptions::DealWith($e->getMessage());
            }
        } else {
            if (Files::GetModifiedTime($sCssPath) < Files::GetModifiedTime($sLessPath)) {
                try {
                    $less->checkedCompile($sLessPath, $sCssPath);
                } catch (exception $e) {
                    Exceptions::DealWith($e->getMessage());
                }
            }
        }
    }

    /**
     * Compiles/minifies and joins javascripts
     */
    public static function CompileJs()
    {
        $sJsScript = "";
        $sMainJsFile = _path(APPLICATION_ROOT . Configuration::get('system/assets/js_full_path')) . 'main.js';
        $aFilesToInclude = file($sMainJsFile);
        foreach($aFilesToInclude as $sFile)
        {
            $sJsScript .= file_get_contents(_path(APPLICATION_ROOT . Configuration::get('system/assets/js_full_path')) . $sFile) . "\n";
        }
        file_put_contents(APPLICATION_ROOT . Configuration::get('system/assets/compiled_js_full_path'), $sJsScript);
        //TODO: implement JavaScript minification
    }

    /**
     * Get css main file path in public folder
     * @return string
     */
    public static function GetCss()
    {
        $sModifiedTime = filemtime(APPLICATION_ROOT . Configuration::get('system/assets/compiled_css_full_path'));
        return self::Link(Configuration::get('system/assets/compiled_css_url') . "?m=" . $sModifiedTime);
    }

    /**
     * Get javascript main file path in public folder
     * @return string
     */
    public static function GetJs()
    {
        $sModifiedTime = filemtime(APPLICATION_ROOT . Configuration::get('system/assets/compiled_js_full_path'));
        return self::Link(Configuration::get('system/assets/compiled_js_url') . "?m=" . $sModifiedTime);
    }

    /**
     * Build a link
     * @param $sLink , link destination
     * @return string
     */
    public static function Link($sLink)
    {
        return _path(Request::Url()) . _path(Configuration::get('system/base_url')) . ltrim($sLink, '/');
    }

}

/**
 * Class A
 * Short name for Assets class
 */
class A extends Assets
{

}