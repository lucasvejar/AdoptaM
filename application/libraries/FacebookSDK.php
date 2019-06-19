<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* Cambie las rutas porque instale con el Composer */
/* NO LA USO */

date_default_timezone_set('UTC');
require 'Facebook/Facebook.php';
require_once dirname(__FILE__) . '/vendor/facebook/graph-sdk/src/Facebook/Facebook.php';
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/Facebook/');
require_once __DIR__ . '/vendor/facebook/graph-sdk/src/Facebook/autoload.php';


class FacebookSDK{

    function __construct() {
    }

}


?>