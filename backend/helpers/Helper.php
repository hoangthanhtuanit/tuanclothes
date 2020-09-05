<?php

class Helper
{
    public static function flash($name, $text = ''){
        if (isset($_SESSION[$name])) {
            $message = $_SESSION[$name];
            unset($_SESSION[$name]);
            return $message;
        } else {
            $_SESSION[$name] = $text;
        }
        return '';
    }

    public static function dataTree($data, $parent_id = 0, $level  = 0){
        $menuTree = [];
        foreach ($data as $menu) {
            if ($menu['parent_id'] == $parent_id) {
                $menu['level'] = $level;
                $menuTree[] = $menu;
                unset($data[$menu['id']]);
                $child    = self::dataTree($data, $menu['id'], $level + 1);
                $menuTree   = array_merge($menuTree, $child);
            }
        }
        return $menuTree;
    }
}