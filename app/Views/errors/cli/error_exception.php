<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "An uncaught Exception was encountered\n\nType:        ";
echo get_class($exception);
echo "\nMessage:     ";
echo $message;
echo "\nFilename:    ";
echo $exception->getFile();
echo "\nLine Number: ";
echo $exception->getLine();
echo "\n";
if (defined("SHOW_DEBUG_BACKTRACE") && SHOW_DEBUG_BACKTRACE === true) {
    echo "\n\tBacktrace:\n\t";
    foreach ($exception->getTrace() as $error) {
        echo "\t\t";
        if (isset($error["file"])) {
            echo "\t\t\t";
            echo trim("-" . $error["line"] . " - " . $error["file"] . "::" . $error["function"]) . "\n";
            echo "\t\t";
        }
        echo "\t";
    }
    echo "\n";
}

?>