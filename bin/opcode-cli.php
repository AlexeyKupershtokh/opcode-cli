#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Crunch\FastCGI\Client as FastCGI;
use Crunch\FastCGI\ConnectionException;

$opts = getopt('h', array('port:', 'sock:', 'url:', 'action:', 'help'));
if (count($opts) === 0) {
    $opts['port'] = 9000;
} elseif (isset($opts['h']) || isset($opts['help'])) {
    fprintf(STDOUT, 'opcode-cli 1.0' . PHP_EOL . 'Usage: opcode-cli.php --port=port|--sock=path|--url=url --action=status|clear' . PHP_EOL);
    exit(1);
}
if (!isset($opts['action'])) {
    $opts['action'] = 'status';
}

if (isset($opts['sock'])) {
    $host = $opts['sock'];
    $port = null;
} else {
    $host = '127.0.0.1';
    $port = $opts['port'];
}

$query = array('action' => $opts['action']);
$headers = array(
    'GATEWAY_INTERFACE' => 'FastCGI/1.0',
    'SCRIPT_FILENAME' => dirname(__DIR__).'/web/opcode-gateway.php',
    'REQUEST_METHOD' => 'POST',
    'CONTENT_TYPE' => 'application/x-www-form-urlencoded',
    'REQUEST_URI' => '/',
    'QUERY_STRING' => http_build_query($query),
);

try {
    $client = new FastCGI($host, $port);
    $connection = $client->connect();
    $request = $connection->newRequest($headers, $body);
    $response = $connection->request($request);
    print $response->content;
} catch (ConnectionException $ex) {
    fprintf(STDERR, $ex->getMessage().PHP_EOL);
    exit(1);
}
