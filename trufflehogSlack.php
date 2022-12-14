#!/usr/bin/env php
<?php

if (php_sapi_name() !== 'cli') die('Only CLI access permitted.');
else if ($argc !== 2 || !is_file($argv[1])) {
    die('Please provide with a path to existent trufflehog output.');
} else {
    define('SLACK_WEBHOOK', 'https://hooks.slack.com/services/x/y/z');
    function slack($txt) {
        $msg = array('text' => $txt);
        $c = curl_init(SLACK_WEBHOOK);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, array('payload' => json_encode($msg)));
        curl_exec($c);
        curl_close($c);
    }

    $contents = file_get_contents($argv[1]);
    $re = "/Found verified result 🐷🔑(.*?)\n[\r]?\n/sm";
    preg_match_all($re, $contents, $results, PREG_SET_ORDER, 0);
    foreach ($results as $i => $result) {
        $credData = trim($result[1]);
        slack("Verified result confirmed 🔑\r\n" . $credData);
    }
}
