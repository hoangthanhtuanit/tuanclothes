<?php

class Controller
{
    public $title_page;
    public $content;
    public $error;

    public function render($path_view, $variables = []){
        extract($variables);
        ob_start();
        require_once "$path_view";
        return ob_get_clean();
    }
}