<?php

function assertEquals($message, $actual, $expected)
{

    if ($expected !== $actual) {
        extract(debug_backtrace()[0]);
        //print_r(debug_backtrace()[0]);
        //echo "--------------------------------------- \n";
        echo "\n\nfail: $message \n";
        echo "expected      $expected (" . gettype($expected) . ")\n";
        echo "actual        $actual (" . gettype($actual) . ")\n\n";
        echo basename($file) . " (line: " . $line . ")\n";
        speech($message . "Fallito linea " . $line . " file: " . basename($file));
    }
}

function beep()
{
    fprintf(STDOUT, "%s", "\x07");
}

function red($message)
{
    return "\e[31m$message\e[0m";
    echo "\n-----------------------\n";
    echo "- $message";
    echo "\n-----------------------\n";
};


function speech($text)
{
    $sql = 'mshta vbscript:Execute("CreateObject(""SAPI.SpVoice"").Speak(""' . $text . '"")(window.close)")';
    exec($sql);
}

function getFiles($path)
{
    $all = scandir($path);
    $onlyFiles = array_filter($all, function ($item) {
        return !($item == '.' || $item == '..');
    });

    return $onlyFiles;
}


function findText($page, $actual, $expected, $takeScreenshoot = false)
{
    extract(debug_backtrace()[0]);

    $res = stripos($page, $actual);
    $stringFound = $res === false ? false : true;

    if ($expected !== $stringFound) {
        $found = !$expected ? "found: " : "not found: ";
        $msg =  $found . $actual . "\n";

        $msg .= basename($file) . " (line: " . $line . ")\n\n";

        echo $msg;
    }
}

function addQuote($s){
    return "\"".$s."\"";
}


function findTextInUrl($url, $_actual, $expected, $takeScreenshoot = false)
{

    $page = file_get_contents($url);
    $toFind = [];

    if (is_array($_actual)) {
        $toFind = $_actual;
    } else {
        array_push($toFind, $_actual);
    }
    extract(debug_backtrace()[0]);

    // con una singola chiamata controlla un array di stringhe
    array_walk($toFind, function ($actual) use ($line, $file, $url, $page, $expected, $takeScreenshoot) {

        $res = stripos($page, $actual);
        $stringFound = $res === false ? false : true;

        if ($expected !== $stringFound) {


            $found = !$expected ? "found: " : "not found: ";
            $msg =  $found . $actual . "\n";
            $msg .= "page: " . basename($url) . "\n";
            $msg .= basename($file) . " (line: " . $line . ")\n\n";

            echo $msg;

            if ($takeScreenshoot) {
                file_put_contents("./test/static/test_" . basename($url) . '.html', $page);
                file_put_contents("./test/static/test_" . basename($url) . '.msg.txt', $msg);
            }
        }
    });
}




function delete_directory($dirname)
{
    //     if (is_dir($dirname))
    //       $dir_handle = opendir($dirname);
    // if (!$dir_handle)
    //      return false;
    // while($file = readdir($dir_handle)) {
    //       if ($file != "." && $file != "..") {
    //            if (!is_dir($dirname."/".$file))
    //                 unlink($dirname."/".$file);
    //            else
    //                 delete_directory($dirname.'/'.$file);
    //       }
    // }
    // closedir($dir_handle);
    // rmdir($dirname);
    // return true;
}

function HTTPRequest($url, $data, $method = 'POST', $contentType = 'application/x-www-form-urlencoded')
{

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: $contentType\r\n",
            'method'  => $method,
            'content' => http_build_query($data)
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) { /* Handle error */
    }

    return ($result);
}


function CHTTPRequest($url, $data, $method = 'POST', $contentType = 'application/x-www-form-urlencoded')
{

    $curlExec = "curl  ";
    $curlExec .= curlFormParam($data);
    $curlExec .= " $url > " . basename($url) . ".html";

    echo $curlExec . "\n";

    $page = system($curlExec);

    file_put_contents("./test/static/test_" . basename($url) . '.html', $page);
    //file_put_contents("./test/static/test_".basename($url).'.msg.txt',$msg);

    return $page;
}

function curlFormParam($data)
{

    $curlOption = "";
    foreach ($data as $key => $value) {
        $value = addQuote($value);
        $curlOption .= " -F $key=$value ";
    }

    return $curlOption;
}
