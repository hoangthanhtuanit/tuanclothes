<?php

class Pagination
{
    public $params = [
        'total' => 0,
        'limit' => 0,
        'controller' => '',
        'action' => '',
        'full_mode' => TRUE
    ];

    public function __construct($params = []){
        $this->params = $params;
    }

    public function getTotalPage(){
        $total = $this->params['total'];
        $limit = $this->params['limit'];
        $total_page = $total / $limit;
        $total_page = ceil($total_page);
        return $total_page;
    }

    public function getCurrentPage(){
        $page = 1;
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
            $total_page = $this->getTotalPage();
            if ($page >= $total_page) {
                $page = $total_page;
            }
        }
        return $page;
    }

    public function getPrevPage(){
        $prev_page = '';
        $current_page = $this->getCurrentPage();
        if ($current_page >= 2) {
            $controller = $this->params['controller'];
            $action = $this->params['action'];
            $prev_url =
                "index.php?controller=$controller&action=$action&page=" . ($current_page - 1);
            $prev_page = "<li><a href='$prev_url'><i class='zmdi zmdi-chevron-left'></i></a></li>";
        }
        return $prev_page;
    }

    public function getNextPage(){
        $next_page = '';
        $total_page = $this->getTotalPage();
        $current_page = $this->getCurrentPage();
        if ($current_page < $total_page) {
            $controller = $this->params['controller'];
            $action = $this->params['action'];
            $next_url =
                "index.php?controller=$controller&action=$action&page=" . ($current_page + 1);
            $next_page = "<li><a href='$next_url'><i class='zmdi zmdi-chevron-right'></i></a></li>";
        }
        return $next_page;
    }

    public function getPagination(){
        $pagination = '';
        $total_page = $this->getTotalPage();
        if ($total_page == 1) {
            return '';
        }
        $pagination .= "<ul class='htc__pagenation'>";
        $prev_page = $this->getPrevPage();
        $pagination .= $prev_page;

        $full_mode = $this->params['full_mode'];
        $controller = $this->params['controller'];
        $action = $this->params['action'];
        if ($full_mode) {
            for ($page = 1; $page <= $total_page; $page++) {
                $current_page = $this->getCurrentPage();
                if ($current_page == $page) {
                    $pagination .=
                        "<li class='active'><a>$page</a></li>";
                } else {
                    $page_url =
                        "index.php?controller=$controller&action=$action&page=$page";
                    $pagination .= "<li><a href='$page_url'>$page</a></li>";
                }
            }
        } else {
            for ($page = 1; $page <= $total_page; $page++) {
                $current_page = $this->getCurrentPage();
                if ($current_page == $page) {
                    $pagination .=
                        "<li class='active'><a>$page</a></li>";
                } elseif ($page == 1 || $page == $total_page
                    || ($page == $current_page - 1)
                    || ($page == $current_page + 1)) {
                    $page_url =
                        "index.php?controller=$controller&action=$action&page=$page";
                    $pagination .= "<li><a href='$page_url'>$page</a></li>";
                } elseif ($page == 2 || $page == 3
                    || $page == ($total_page - 1)
                    || $page == ($total_page - 2)
                ) {
                    $pagination .= "<li><a>...</a></li>";
                }
            }
        }
        $next_page = $this->getNextPage();
        $pagination .= $next_page;
        $pagination .= "</ul>";
        return $pagination;
    }

    public function getPrevCat(){
        $prev_page = '';
        $current_page = $this->getCurrentPage();
        if ($current_page >= 2) {
            $controller = $this->params['controller'];
            $action = $this->params['action'];
            $id = $this->params['category_id'];
            $prev_url =
                "index.php?controller=$controller&action=$action&id=$id&page=" . ($current_page - 1);
            $prev_page = "<li><a href='$prev_url'><i class='zmdi zmdi-chevron-left'></i></a></li>";
        }
        return $prev_page;
    }

    public function getNextCat(){
        $next_page = '';
        $total_page = $this->getTotalPage();
        $current_page = $this->getCurrentPage();
        if ($current_page < $total_page) {
            $controller = $this->params['controller'];
            $action = $this->params['action'];
            $id = $this->params['category_id'];
            $next_url =
                "index.php?controller=$controller&action=$action&id=$id&page=" . ($current_page + 1);
            $next_page = "<li><a href='$next_url'><i class='zmdi zmdi-chevron-right'></i></a></li>";
        }
        return $next_page;
    }

    public function getPaginationCat(){
        $pagination = '';
        $total_page = $this->getTotalPage();
        if ($total_page == 1) {
            return '';
        }
        $pagination .= "<ul class='htc__pagenation'>";
        $prev_page = $this->getPrevCat();
        $pagination .= $prev_page;

        $full_mode = $this->params['full_mode'];
        $controller = $this->params['controller'];
        $action = $this->params['action'];
        $id = $this->params['category_id'];
        if ($full_mode) {
            for ($page = 1; $page <= $total_page; $page++) {
                $current_page = $this->getCurrentPage();
                if ($current_page == $page) {
                    $pagination .=
                        "<li class='active'><a>$page</a></li>";
                } else {
                    $page_url =
                        "index.php?controller=$controller&action=$action&id=$id&page=$page";
                    $pagination .= "<li><a href='$page_url'>$page</a></li>";
                }
            }
        } else {
            for ($page = 1; $page <= $total_page; $page++) {
                $current_page = $this->getCurrentPage();
                if ($current_page == $page) {
                    $pagination .=
                        "<li class='active'><a>$page</a></li>";
                } elseif ($page == 1 || $page == $total_page
                    || ($page == $current_page - 1)
                    || ($page == $current_page + 1)) {
                    $page_url =
                        "index.php?controller=$controller&action=$action&id=$id&page=$page";
                    $pagination .= "<li><a href='$page_url'>$page</a></li>";
                } elseif ($page == 2 || $page == 3
                    || $page == ($total_page - 1)
                    || $page == ($total_page - 2)
                ) {
                    $pagination .= "<li><a>...</a></li>";
                }
            }
        }
        $next_page = $this->getNextCat();
        $pagination .= $next_page;
        $pagination .= "</ul>";
        return $pagination;
    }
}