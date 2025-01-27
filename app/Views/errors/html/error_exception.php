<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$error_id = uniqid("error", true);
echo "<!doctype html>\r\n<html>\r\n<head>\r\n\t<meta charset=\"UTF-8\">\r\n\t<meta name=\"robots\" content=\"noindex\">\r\n\r\n\t<title>";
echo htmlspecialchars($title, ENT_SUBSTITUTE, "UTF-8");
echo "</title>\r\n\t<style type=\"text/css\">\r\n\t\t";
echo preg_replace("#[\\r\\n\\t ]+#", " ", file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "debug.css"));
echo "\t</style>\r\n\r\n\t<script type=\"text/javascript\">\r\n\t\t";
echo file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "debug.js");
echo "\t</script>\r\n</head>\r\n<body onLoad=\"init()\">\r\n\r\n\t<!-- Header -->\r\n\t<div class=\"header\">\r\n\t\t<div class=\"container\">\r\n\t\t\t<h1>";
echo htmlspecialchars($title, ENT_SUBSTITUTE, "UTF-8");
echo $exception->getCode() ? " #" . $exception->getCode() : "";
echo "</h1>\r\n\t\t\t<p>\r\n\t\t\t\t";
echo $exception->getMessage();
echo "\t\t\t\t<a href=\"https://www.google.com/search?q=";
echo urlencode($title . " " . preg_replace("#'.*'|\".*\"#Us", "", $exception->getMessage()));
echo "\"\r\n\t\t\t\t   rel=\"noreferrer\" target=\"_blank\">search &rarr;</a>\r\n\t\t\t</p>\r\n\t\t</div>\r\n\t</div>\r\n\r\n\t<!-- Source -->\r\n\t<div class=\"container\">\r\n\t\t<p><b>";
echo self::cleanPath($file, $line);
echo "</b> at line <b>";
echo $line;
echo "</b></p>\r\n\r\n\t\t";
if (is_file($file)) {
    echo "\t\t\t<div class=\"source\">\r\n\t\t\t\t";
    echo self::highlightFile($file, $line, 15);
    echo "\t\t\t</div>\r\n\t\t";
}
echo "\t</div>\r\n\r\n\t<div class=\"container\">\r\n\r\n\t\t<ul class=\"tabs\" id=\"tabs\">\r\n\t\t\t<li><a href=\"#backtrace\">Backtrace</a></li>\r\n\t\t\t\t<li><a href=\"#server\">Server</a></li>\r\n\t\t\t\t<li><a href=\"#request\">Request</a></li>\r\n\t\t\t\t<li><a href=\"#response\">Response</a></li>\r\n\t\t\t\t<li><a href=\"#files\">Files</a></li>\r\n\t\t\t\t<li><a href=\"#memory\">Memory</a></li>\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\r\n\t\t<div class=\"tab-content\">\r\n\r\n\t\t\t<!-- Backtrace -->\r\n\t\t\t<div class=\"content\" id=\"backtrace\">\r\n\r\n\t\t\t\t<ol class=\"trace\">\r\n\t\t\t\t";
foreach ($trace as $index => $row) {
    echo "\r\n\t\t\t\t\t<li>\r\n\t\t\t\t\t\t<p>\r\n\t\t\t\t\t\t\t<!-- Trace info -->\r\n\t\t\t\t\t\t\t";
    if (isset($row["file"]) && is_file($row["file"])) {
        echo "\t\t\t\t\t\t\t\t";
        if (isset($row["function"]) && in_array($row["function"], ["include", "include_once", "require", "require_once"])) {
            echo $row["function"] . " " . self::cleanPath($row["file"]);
        } else {
            echo self::cleanPath($row["file"]) . " : " . $row["line"];
        }
        echo "\t\t\t\t\t\t\t";
    } else {
        echo "\t\t\t\t\t\t\t\t{PHP internal code}\r\n\t\t\t\t\t\t\t";
    }
    echo "\r\n\t\t\t\t\t\t\t<!-- Class/Method -->\r\n\t\t\t\t\t\t\t";
    if (isset($row["class"])) {
        echo "\t\t\t\t\t\t\t\t&nbsp;&nbsp;&mdash;&nbsp;&nbsp;";
        echo $row["class"] . $row["type"] . $row["function"];
        echo "\t\t\t\t\t\t\t\t";
        if (!empty($row["args"])) {
            echo "\t\t\t\t\t\t\t\t\t";
            $args_id = $error_id . "args" . $index;
            echo "\t\t\t\t\t\t\t\t\t( <a href=\"#\" onClick=\"return toggle('";
            echo $args_id;
            echo "');\">arguments</a> )\r\n\t\t\t\t\t\t\t\t\t<div class=\"args\" id=\"";
            echo $args_id;
            echo "\">\r\n\t\t\t\t\t\t\t\t\t\t<table cellspacing=\"0\">\r\n\r\n\t\t\t\t\t\t\t\t\t\t";
            $params = NULL;
            if (substr($row["function"], -1) !== "}") {
                $mirror = isset($row["class"]) ? new ReflectionMethod($row["class"], $row["function"]) : new ReflectionFunction($row["function"]);
                $params = $mirror->getParameters();
            }
            foreach ($row["args"] as $key => $value) {
                echo "\t\t\t\t\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<td><code>";
                echo htmlspecialchars(isset($params[$key]) ? "\$" . $params[$key]->name : "#" . $key, ENT_SUBSTITUTE, "UTF-8");
                echo "</code></td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<td><pre>";
                echo print_r($value, true);
                echo "</pre></td>\r\n\t\t\t\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t\t\t\t";
            }
            echo "\r\n\t\t\t\t\t\t\t\t\t\t</table>\r\n\t\t\t\t\t\t\t\t\t</div>\r\n\t\t\t\t\t\t\t\t";
        } else {
            echo "\t\t\t\t\t\t\t\t\t()\r\n\t\t\t\t\t\t\t\t";
        }
        echo "\t\t\t\t\t\t\t";
    }
    echo "\r\n\t\t\t\t\t\t\t";
    if (!isset($row["class"]) && isset($row["function"])) {
        echo "\t\t\t\t\t\t\t\t&nbsp;&nbsp;&mdash;&nbsp;&nbsp;\t";
        echo $row["function"];
        echo "()\r\n\t\t\t\t\t\t\t";
    }
    echo "\t\t\t\t\t\t</p>\r\n\r\n\t\t\t\t\t\t<!-- Source? -->\r\n\t\t\t\t\t\t";
    if (isset($row["file"]) && is_file($row["file"]) && isset($row["class"])) {
        echo "\t\t\t\t\t\t\t<div class=\"source\">\r\n\t\t\t\t\t\t\t\t";
        echo self::highlightFile($row["file"], $row["line"]);
        echo "\t\t\t\t\t\t\t</div>\r\n\t\t\t\t\t\t";
    }
    echo "\t\t\t\t\t</li>\r\n\r\n\t\t\t\t";
}
echo "\t\t\t\t</ol>\r\n\r\n\t\t\t</div>\r\n\r\n\t\t\t<!-- Server -->\r\n\t\t\t<div class=\"content\" id=\"server\">\r\n\t\t\t\t";
foreach (["_SERVER", "_SESSION"] as $var) {
    echo "\t\t\t\t\t";
    if (!empty($GLOBALS[$var]) && is_array($GLOBALS[$var])) {
        echo "\r\n\t\t\t\t\t<h3>\$";
        echo $var;
        echo "</h3>\r\n\r\n\t\t\t\t\t<table>\r\n\t\t\t\t\t\t<thead>\r\n\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t<th>Key</th>\r\n\t\t\t\t\t\t\t\t<th>Value</th>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t</thead>\r\n\t\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t";
        foreach ($GLOBALS[$var] as $key => $value) {
            echo "\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t<td>";
            echo htmlspecialchars($key, ENT_IGNORE, "UTF-8");
            echo "</td>\r\n\t\t\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t\t\t\t";
            if (is_string($value)) {
                echo "\t\t\t\t\t\t\t\t\t\t";
                echo htmlspecialchars($value, ENT_SUBSTITUTE, "UTF-8");
                echo "\t\t\t\t\t\t\t\t\t";
            } else {
                echo "\t\t\t\t\t\t\t\t\t\t";
                echo "<pre>" . print_r($value, true);
                echo "\t\t\t\t\t\t\t\t\t";
            }
            echo "\t\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t";
        }
        echo "\t\t\t\t\t\t</tbody>\r\n\t\t\t\t\t</table>\r\n\r\n\t\t\t\t";
    }
}
echo "\r\n\t\t\t\t<!-- Constants -->\r\n\t\t\t\t";
$constants = get_defined_constants(true);
echo "\t\t\t\t";
if (!empty($constants["user"])) {
    echo "\t\t\t\t\t<h3>Constants</h3>\r\n\r\n\t\t\t\t\t<table>\r\n\t\t\t\t\t\t<thead>\r\n\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t<th>Key</th>\r\n\t\t\t\t\t\t\t\t<th>Value</th>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t</thead>\r\n\t\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t";
    foreach ($constants["user"] as $key => $value) {
        echo "\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t<td>";
        echo htmlspecialchars($key, ENT_IGNORE, "UTF-8");
        echo "</td>\r\n\t\t\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t\t\t\t";
        if (!is_array($value) && !is_object($value)) {
            echo "\t\t\t\t\t\t\t\t\t\t";
            echo htmlspecialchars($value, ENT_SUBSTITUTE, "UTF-8");
            echo "\t\t\t\t\t\t\t\t\t";
        } else {
            echo "\t\t\t\t\t\t\t\t\t\t";
            echo "<pre>" . print_r($value, true);
            echo "\t\t\t\t\t\t\t\t\t";
        }
        echo "\t\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t";
    }
    echo "\t\t\t\t\t\t</tbody>\r\n\t\t\t\t\t</table>\r\n\t\t\t\t";
}
echo "\t\t\t</div>\r\n\r\n\t\t\t<!-- Request -->\r\n\t\t\t<div class=\"content\" id=\"request\">\r\n\t\t\t\t";
$request = Config\Services::request();
echo "\r\n\t\t\t\t<table>\r\n\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td style=\"width: 10em\">Path</td>\r\n\t\t\t\t\t\t\t<td>";
echo $request->uri;
echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td>HTTP Method</td>\r\n\t\t\t\t\t\t\t<td>";
echo $request->getMethod(true);
echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td>IP Address</td>\r\n\t\t\t\t\t\t\t<td>";
echo $request->getIPAddress();
echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td style=\"width: 10em\">Is AJAX Request?</td>\r\n\t\t\t\t\t\t\t<td>";
echo $request->isAJAX() ? "yes" : "no";
echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td>Is CLI Request?</td>\r\n\t\t\t\t\t\t\t<td>";
echo $request->isCLI() ? "yes" : "no";
echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td>Is Secure Request?</td>\r\n\t\t\t\t\t\t\t<td>";
echo $request->isSecure() ? "yes" : "no";
echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td>User Agent</td>\r\n\t\t\t\t\t\t\t<td>";
echo $request->getUserAgent()->getAgentString();
echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\r\n\t\t\t\t\t</tbody>\r\n\t\t\t\t</table>\r\n\r\n\r\n\t\t\t\t";
$empty = true;
echo "\t\t\t\t";
foreach (["_GET", "_POST", "_COOKIE"] as $var) {
    echo "\t\t\t\t\t";
    if (!empty($GLOBALS[$var]) && is_array($GLOBALS[$var])) {
        echo "\r\n\t\t\t\t\t";
        $empty = false;
        echo "\r\n\t\t\t\t\t<h3>\$";
        echo $var;
        echo "</h3>\r\n\r\n\t\t\t\t\t<table style=\"width: 100%\">\r\n\t\t\t\t\t\t<thead>\r\n\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t<th>Key</th>\r\n\t\t\t\t\t\t\t\t<th>Value</th>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t</thead>\r\n\t\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t";
        foreach ($GLOBALS[$var] as $key => $value) {
            echo "\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t<td>";
            echo htmlspecialchars($key, ENT_IGNORE, "UTF-8");
            echo "</td>\r\n\t\t\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t\t\t\t";
            if (!is_array($value) && !is_object($value)) {
                echo "\t\t\t\t\t\t\t\t\t\t";
                echo htmlspecialchars($value, ENT_SUBSTITUTE, "UTF-8");
                echo "\t\t\t\t\t\t\t\t\t";
            } else {
                echo "\t\t\t\t\t\t\t\t\t\t";
                echo "<pre>" . print_r($value, true);
                echo "\t\t\t\t\t\t\t\t\t";
            }
            echo "\t\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t";
        }
        echo "\t\t\t\t\t\t</tbody>\r\n\t\t\t\t\t</table>\r\n\r\n\t\t\t\t";
    }
}
echo "\r\n\t\t\t\t";
if ($empty) {
    echo "\r\n\t\t\t\t\t<div class=\"alert\">\r\n\t\t\t\t\t\tNo \$_GET, \$_POST, or \$_COOKIE Information to show.\r\n\t\t\t\t\t</div>\r\n\r\n\t\t\t\t";
}
echo "\r\n\t\t\t\t";
$headers = $request->getHeaders();
echo "\t\t\t\t";
if (!empty($headers)) {
    echo "\r\n\t\t\t\t\t<h3>Headers</h3>\r\n\r\n\t\t\t\t\t<table>\r\n\t\t\t\t\t\t<thead>\r\n\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t<th>Header</th>\r\n\t\t\t\t\t\t\t\t<th>Value</th>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t</thead>\r\n\t\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t";
    foreach ($headers as $value) {
        echo "\t\t\t\t\t\t\t";
        if (!empty($value)) {
            echo "\t\t\t\t\t\t\t";
            if (!is_array($value)) {
                $value = [$value];
            }
            echo "\t\t\t\t\t\t\t";
            foreach ($value as $h) {
                echo "\t\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t\t<td>";
                echo esc($h->getName(), "html");
                echo "</td>\r\n\t\t\t\t\t\t\t\t\t<td>";
                echo esc($h->getValueLine(), "html");
                echo "</td>\r\n\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t";
            }
            echo "\t\t\t\t\t\t";
        }
    }
    echo "\t\t\t\t\t\t</tbody>\r\n\t\t\t\t\t</table>\r\n\r\n\t\t\t\t";
}
echo "\t\t\t</div>\r\n\r\n\t\t\t<!-- Response -->\r\n\t\t\t";
$response = Config\Services::response();
$response->setStatusCode(http_response_code());
echo "\t\t\t<div class=\"content\" id=\"response\">\r\n\t\t\t\t<table>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td style=\"width: 15em\">Response Status</td>\r\n\t\t\t\t\t\t<td>";
echo $response->getStatusCode() . " - " . $response->getReason();
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t</table>\r\n\r\n\t\t\t\t";
$headers = $response->getHeaders();
echo "\t\t\t\t";
if (!empty($headers)) {
    echo "\t\t\t\t\t";
    natsort($headers);
    echo "\r\n\t\t\t\t\t<h3>Headers</h3>\r\n\r\n\t\t\t\t\t<table>\r\n\t\t\t\t\t\t<thead>\r\n\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t<th>Header</th>\r\n\t\t\t\t\t\t\t\t<th>Value</th>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t</thead>\r\n\t\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t";
    foreach ($headers as $name => $value) {
        echo "\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t<td>";
        echo esc($name, "html");
        echo "</td>\r\n\t\t\t\t\t\t\t\t<td>";
        echo esc($response->getHeaderLine($name), "html");
        echo "</td>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t";
    }
    echo "\t\t\t\t\t\t</tbody>\r\n\t\t\t\t\t</table>\r\n\r\n\t\t\t\t";
}
echo "\t\t\t</div>\r\n\r\n\t\t\t<!-- Files -->\r\n\t\t\t<div class=\"content\" id=\"files\">\r\n\t\t\t\t";
$files = get_included_files();
echo "\r\n\t\t\t\t<ol>\r\n\t\t\t\t";
foreach ($files as $file) {
    echo "\t\t\t\t\t<li>";
    echo htmlspecialchars(self::cleanPath($file), ENT_SUBSTITUTE, "UTF-8");
    echo "</li>\r\n\t\t\t\t";
}
echo "\t\t\t\t</ol>\r\n\t\t\t</div>\r\n\r\n\t\t\t<!-- Memory -->\r\n\t\t\t<div class=\"content\" id=\"memory\">\r\n\r\n\t\t\t\t<table>\r\n\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td>Memory Usage</td>\r\n\t\t\t\t\t\t\t<td>";
echo self::describeMemory(memory_get_usage(true));
echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td style=\"width: 12em\">Peak Memory Usage:</td>\r\n\t\t\t\t\t\t\t<td>";
echo self::describeMemory(memory_get_peak_usage(true));
echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<td>Memory Limit:</td>\r\n\t\t\t\t\t\t\t<td>";
echo ini_get("memory_limit");
echo "</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t</tbody>\r\n\t\t\t\t</table>\r\n\r\n\t\t\t</div>\r\n\r\n\t\t</div>  <!-- /tab-content -->\r\n\r\n\t</div> <!-- /container -->\r\n\r\n\t<div class=\"footer\">\r\n\t\t<div class=\"container\">\r\n\r\n\t\t\t<p>\r\n\t\t\t\tDisplayed at ";
echo date("H:i:sa");
echo " &mdash;\r\n\t\t\t\tPHP: ";
echo phpversion();
echo "  &mdash;\r\n\t\t\t\tCodeIgniter: ";
echo CodeIgniter\CodeIgniter::CI_VERSION;
echo "\t\t\t</p>\r\n\r\n\t\t</div>\r\n\t</div>\r\n\r\n</body>\r\n</html>\r\n";

?>