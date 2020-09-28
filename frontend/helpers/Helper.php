<?php

class Helper
{
    /**
     * @param $name
     * @param string $text
     * @return string
     */
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

    /**
     * Chuyển đổi chuỗi ký tự có dấu thành chuỗi ký tự không dấu,
     * ngăn cách  nhau bởi ký tự -
     * @param $str
     * @return null|string|string[]
     */
    public static function getSlug($str){
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}