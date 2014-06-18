<?php

/**
 * Class Files
 * @author Vygandas Pliasas <vygandas@outlook.com>
 * @package Ouvet\Core
 */
class Files
{
    /**
     * Get an array of directory tree
     * @param string $sDirectory , directory path
     * @param bool $isRecursive , include sub-directories
     * @param bool $isListDirs , include directories on listing
     * @param bool $isListFiles , include files on listing
     * @param string $sExcludeRegex , exclude paths that matches this regex
     * @return array
     */
    public function getDirTreeToArray($sDirectory, $isRecursive = true, $isListDirs = false, $isListFiles = true, $sExcludeRegex = '')
    {
        $aItems = array();
        $skipByExclude = false;
        $handle = opendir($sDirectory);
        if ($handle) {
            while (false !== ($sFile = readdir($handle))) {
                preg_match("/(^(([\.]){1,2})$|(\.(svn|git|md))|(Thumbs\.db|\.DS_STORE))$/iu", $sFile, $skip);
                if ($sExcludeRegex) {
                    preg_match($sExcludeRegex, $sFile, $skipByExclude);
                }
                if (!$skip && !$skipByExclude) {
                    if (is_dir($sDirectory . DIRECTORY_SEPARATOR . $sFile)) {
                        if ($isRecursive) {
                            $aItems = array_merge($aItems, $this->getDirTreeToArray($sDirectory . DIRECTORY_SEPARATOR . $sFile, $isRecursive, $isListDirs, $isListFiles, $sExcludeRegex));
                        }
                        if ($isListDirs) {
                            $sFile = $sDirectory . DIRECTORY_SEPARATOR . $sFile;
                            $aItems[] = $sFile;
                        }
                    } else {
                        if ($isListFiles) {
                            $sFile = $sDirectory . DIRECTORY_SEPARATOR . $sFile;
                            $aItems[] = $sFile;
                        }
                    }
                }
            }
            closedir($handle);
        }
        return $aItems;
    }

    /**
     * Get directories list in provided base directory. You can set which directories should be
     * excluded from returned list.
     * @param string $sDirectory , base directory
     * @param array $aExceptDirNames , directory names to be excluded
     * @return array
     */
    public function getDirFolders($sDirectory, $aExceptDirNames = array('..', '.', 'Ouvet', '.DS_Store'))
    {
        $aScannedDirectory = array_diff(scandir($sDirectory), $aExceptDirNames);
        return $aScannedDirectory;
    }

    /**
     * Do require_once for provided class files
     * @param array $aClasses , classes to be required (included)
     * @param string $aBaseName , in case file is in this folder
     */
    public function RequireClasses($aClasses, $aBaseName = null)
    {
        $included = false;
        foreach ($aClasses as $sClassFileName) {
            if (file_exists(APPLICATION_ROOT . 'libs/' . $aBaseName . '/' . $sClassFileName)) {
                require_once APPLICATION_ROOT . 'libs/' . $aBaseName . '/' . $sClassFileName;
                $included = true;
            } else if (file_exists(APPLICATION_ROOT . $aBaseName . '/' . $sClassFileName)) {
                require_once APPLICATION_ROOT . $aBaseName . '/' . $sClassFileName;
                $included = true;
            } else if (file_exists(APPLICATION_ROOT . '../' . $aBaseName . '/' . $sClassFileName)) {
                require_once APPLICATION_ROOT . '../' . $aBaseName . '/' . $sClassFileName;
                $included = true;
            } else if (file_exists(APPLICATION_ROOT . '../libs/' . $aBaseName . '/' . $sClassFileName)) {
                require_once APPLICATION_ROOT . '../libs/' . $aBaseName . '/' . $sClassFileName;
                $included = true;
            }
            if ($included) {
                Debug::AddLog("Included library: $sClassFileName");
            }
        }
    }

    /**
     * Return date when file was modified last time. If
     * there's no file, function returns old date (2000)
     * @param $sFilePath
     * @return DateTime
     */
    public static function GetModifiedTime($sFilePath)
    {
        if (file_exists($sFilePath)) {
            return filemtime($sFilePath);
        } else {
            return date("Y-m-d H:i:s", mktime(0, 0, 0, 7, 1, 2000));
        }
    }

    /**
     * Copy folder contents
     * @param $sSourcePath , path to source folder
     * @param $sDestinationPath , path to destination folder
     */
    public static function CopyFolderContents($sSourcePath, $sDestinationPath)
    {
        $dir = opendir($sSourcePath);
        @mkdir($sDestinationPath);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($sSourcePath . '/' . $file)) {
                    recurse_copy($sSourcePath . '/' . $file, $sDestinationPath . '/' . $file);
                } else {
                    copy($sSourcePath . '/' . $file, $sDestinationPath . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
}