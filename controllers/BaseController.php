<?php


namespace controllers;


class BaseController
{
    public function render($view, $variables = []){
        $viewPath = $_SERVER['DOCUMENT_ROOT']."/views/{$view}.php";
        extract($variables);
        ob_start();
        require_once $viewPath;
        return ob_get_clean();

//        ob_start();
//        require_once $_SERVER['DOCUMENT_ROOT']."/views/{$view}.php";
//        $out = ob_get_clean();
//        return $out;
    }

    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}