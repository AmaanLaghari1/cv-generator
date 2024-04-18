<?php

require_once "./lib/load.php";

$action->helper->route('/resume/$id', function($data){
    echo "<h1>Create Resume</h1>";
});