<?php
class Helper {
    function route($path){
        include "./views/{$path}.php";
    }
}