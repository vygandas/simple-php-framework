<?php

/**
 * Class LibLoader
 * @author Vygandas Pliasas <vygandas@outlook.com>
 * @package Ouvet\Core
 */
class LibLoader
{

    private static $sLibRoot = "../libs/";
    private static $aDirList;

    /**
     * Initializes library base path and loads libraries
     * @param string $sNewLibRoot , provide new library path (in case you want to put elsewhere or load additional libs)
     */
    public static function Init($sNewLibRoot = null)
    {
        if (!empty($sNewLibRoot) || $sNewLibRoot != null) {
            self::$sLibRoot = $sNewLibRoot;
        }
        self::Load();
    }

    /**
     * Load all classes in libs/ folder which have its description file "loader.info"
     */
    public static function Load()
    {
        $oFiles = new Files();
        self::$aDirList = $oFiles->getDirFolders(self::$sLibRoot);
        foreach (self::$aDirList as $sDir) {
            $sLoaderFile = APPLICATION_ROOT . 'libs/' . $sDir . '/loader.info';
            if (file_exists($sLoaderFile)) {
                $aClasses = file($sLoaderFile);
                $oFiles->RequireClasses($aClasses, $sDir);
            }
        }
    }

}