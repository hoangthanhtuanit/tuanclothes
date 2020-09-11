<?php
class Controller
{
    public $error;
    public $content;
    public $title_page;

    public function render($path_view, $variables = []){
        extract($variables);
        ob_start();
        require_once "$path_view";
        return ob_get_clean();
    }
}