<?php 
// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;


    error_reporting(0);
    if(isset($_GET['domain'])){
        $domain = $_GET['domain'];
        if ( gethostbyname($domain) != $domain ) {
            echo "<h3 style='color:red;' class='fail'>Domain Already Registered!</h3>";
        }
        else {
            echo "<h3 style='color:green;' class='success'>Hurry, your domain is available!, you can register it.</h3>";
        }
    }