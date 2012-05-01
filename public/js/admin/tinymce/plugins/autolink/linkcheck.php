<?php
/**
 *
 *  Example backend script accompanying the TinyMCE autolink plugin.
 *
 *  @author Marek Publicewicz (publicewicz@ambisoft.pl)
 */

    $result = '0';

    $defaultPorts = array(

            'http'  => 80,
            'https' => 443
    );

    function arrayGet($arr, $key, $default = '') {
        return array_key_exists($key, $arr) ? $arr[$key] : $default;
    }

    $url = arrayGet($_GET, 'url');
    if ($url) {
        $arr = parse_url($url);
        $scheme = arrayGet($arr, 'scheme', 'http');
        $host   = arrayGet($arr, 'host');
        $port   = arrayGet($arr, 'port', $defaultPorts[$scheme]);
        $path   = arrayGet($arr, 'path', '/');
        $query  = arrayGet($arr, 'query', '');

        $request = $path;
        if ($query) {
            $request .= '?' . $query;
        }

        $errno   = 0;
        $errstr  = '';
        $timeout = 5;

        $out = '';
        $out = "HEAD $path HTTP/1.0\r\n";
        $out .= "Host: $host\r\n";
        $out .= "Connection: Close\r\n\r\n";

        $fp = @fsockopen($host, $port, $errno, $errstr, $timeout);
        if (!$fp) {
            $result = -1;
        } else {
            $result = '';
            fwrite($fp, $out);
            while (!feof($fp)) {
                $result .= fgets($fp, 128);
            }
            fclose($fp);
            preg_match('!^HTTP/\d.\d\s+(\d+)\s+\S+!', $result, $m);
            $result = $m[1];
        }
    }
    echo $result;

