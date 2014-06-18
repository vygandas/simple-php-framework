<?php

/**
 * Class Debug
 * @author Vygandas Pliasas <vygandas@outlook.com>
 * @package Ouvet\Core
 */
class Debug
{

    const ERROR = "error";
    const WARNING = "warning";
    const NOTICE = "notice";

    private static $aLogLines = array();

    /**
     * Get full trace to file you are working on
     * @return mixed
     */
    public static function PrintFileTrace()
    {
        $trace = debug_backtrace();
        echo "<pre>" . $trace[0]['file'] . "</pre>";
    }

    /**
     * Add event description to log array
     * @param $sText , message or description
     * @param $sType , type of logged message
     */
    public static function AddLog($sText, $sType = self::NOTICE)
    {
        self::$aLogLines[] = array(
            "text" => $sText,
            "type" => $sType
        );
    }

    /**
     * Print all logs
     */
    public static function PrintLog()
    {
        echo '<pre>';
        var_dump(self::$aLogLines);
        echo '</pre>';
    }

    /**
     * Get time difference
     * @return float
     */
    public static function GetExecutionTime()
    {
        return microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
    }

    /**
     * Displays all logs in UI
     */
    public static function GetDevConsole()
    {
        if (Configuration::get("dev_console")) {
            echo "<div id='o_Debug_Console' style='overflow:auto;word-wrap: break-word;text-align:left;padding:5px;position:absolute;right:15px;bottom:5px;width:450px;height:100px;background-color:black;color:white;font-size:11px;font-family:\"Courier New\", sans-serif;'>";
            foreach (self::$aLogLines as $aLogLine) {
                $color = "red";
                if ($aLogLine["type"] == "warning") $color = "yellow";
                if ($aLogLine["type"] == "notice") $color = "white";
                echo "<div style='color: $color'>" . $aLogLine["text"] . "</div>";
            }
            echo "<div>Execution time: " . self::GetExecutionTime() . " sec.</div>";
            echo "</div>";
        }
    }
}