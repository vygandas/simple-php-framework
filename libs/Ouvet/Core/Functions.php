<?php

/**
 * Returns translated text
 * @param $sText , Phrase or text for translation. If no translation found - returns same text.
 * @return string, Translated text
 */
function _t($sText)
{
    return Localisation::GetTranslation($sText);
}

/**
 * Echoes translated text
 * @param $sText , Phrase or text for translation. If no translation found - echoes same text.
 * @return string, Translated text
 */
function _e($sText)
{
    echo Localisation::GetTranslation($sText);
}

/**
 * Add trailing slash to the path string
 * @param $sPath
 * @return string
 */
function _path($sPath)
{
    if (empty($sPath)) return $sPath;
    $slash_type = (strpos($sPath, '\\') === 0) ? 'win' : 'unix';
    $last_char = substr($sPath, strlen($sPath) - 1, 1);
    if ($last_char != '/' and $last_char != '\\') {
        // no slash:
        $sPath .= ($slash_type == 'win') ? '\\' : '/';
    }
    return $sPath;
}