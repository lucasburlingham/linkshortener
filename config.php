<?php
// DEPS:


// Branding
$branding_title = 'GoLCA Link Shortener';
$branding_style_url = 'stylesheet.css';



// Debugging options

//   Enable debugging
$debug = false;

if($debug == true) {
    displayErrors($_POST);
}

function displayErrors($data) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // Show data coming from the form via POST
    echo '<h3>Submitted Data</h3>';
    $slash = $data['SLASH'] . '<br>';
    echo $slash . '<br>';
    $location = $data['SLASH'];
    echo $location . '<br>';
}