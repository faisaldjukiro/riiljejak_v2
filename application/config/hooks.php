<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller_constructor'][] = [
    'class'    => 'RateLimitHook',
    'function' => 'check',
    'filename' => 'RateLimitHook.php',
    'filepath' => 'hooks',
    'params'   => []
];