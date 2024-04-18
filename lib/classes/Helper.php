<?php
class Helper {
    function route($path, $function){
        $isValid = true;
        $pathURL = $_SERVER['PATH_INFO'];

        $pathURL = rtrim($pathURL, '/');
        $pathURL = ltrim($pathURL, '/');
        $absURLData = explode('/', $pathURL);

        $pathURLData = explode('/', $path);

        $data = array();

        // echo "<pre>";
        print_r($absURLData);

        foreach($pathURLData as $i=> $param){
            if(str_contains($param, '$')){
                $data[ltrim($param, '$')] = $absURLData[$i-1];
            }
            else {
                $isValid = true;
            }
        }

        // print_r($pathURLData);
        if($isValid){
            $function($data);
        }
    }
}