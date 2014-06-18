<?php

/**
 * Class Arrays
 * @author Vygandas Pliasas <vygandas@outlook.com>
 * @package Ouvet\Core
 */
class Arrays
{

    /**
     * Search in array by key and value
     * @param $aArray
     * @param $sKey
     * @param $mValue
     * @return array
     */
    public static function Search($aArray, $sKey, $mValue)
    {
        // More: http://stackoverflow.com/questions/1019076/how-to-search-by-key-value-in-a-multidimensional-array-in-php
        $aResults = array();
        if (is_array($aArray)) {
            if (isset($aArray[$sKey]) && $aArray[$sKey] == $mValue) {
                $aResults[] = $aArray;
            }
            foreach ($aArray as $aSubArray) {
                $aResults = array_merge($aResults, self::Search($aSubArray, $sKey, $mValue));
            }
        }
        return $aResults;
    }

}