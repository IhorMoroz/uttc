<?php

namespace core\traits;

trait UniqueKey{

    public function getUniqueKey()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $rand = '';
        for ($i = 0; $i < 10; $i++) {
            $rand .= $characters[rand(0, strlen($characters))];
        }
        return $rand.date('Ymd');
    }
}