<?php

header('Content-Type: text/json');

if (!defined('JSON_PRETTY_PRINT')) {
    define('JSON_PRETTY_PRINT', 0);
}

if ($_GET['action'] == 'status') {
    $result = array();
    if (function_exists('opcache_get_status')) {
        $result['opcache'] = opcache_get_status(true);
    }
    if (function_exists('apc_cache_info')) {
        $result['apc_opcode'] = apc_cache_info('filehits');
        $result['apc_user'] = apc_cache_info('user');
    }
    echo json_encode($result, JSON_PRETTY_PRINT);
}

if ($_GET['action'] == 'clear') {
    $result = array();
    if (function_exists('opcache_reset')) {
        $result['opcache'] = opcache_reset();
    }
    if (function_exists('apc_clear_cache')) {
        $result['apc_opcode'] = apc_clear_cache('opcode');
        $result['apc_user'] = apc_clear_cache('user');
    }
    echo json_encode($result, JSON_PRETTY_PRINT);
}
