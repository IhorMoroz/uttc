<?php

namespace core\models;


use core\helpers\DB;

class Image extends Model
{
    const TABLE = 'images';
    const PATH_TO_SAVE = "img/";

    public $id;
    public $name;
    public $key_post;

    static public function getImagesByKey($key)
    {
        $sql = "SELECT *
                FROM ".self::TABLE."
                WHERE key_post = :key_img AND active = 1";
        return DB::getInstance()->prepareQuery($sql,['key_img' => $key],__CLASS__);
    }

    static public function saveImg($key)
    {
        for($i = 0;$i < count($_FILES["images"]["name"]);$i++){
            if($_FILES["images"]["name"][0]){
                if($_FILES["images"]["tmp_name"][$i] && Image::getFormatImg($_FILES["images"]["type"][$i])){
                    if(move_uploaded_file($_FILES['images']['tmp_name'][$i], self::PATH_TO_SAVE.$_FILES['images']['name'][$i]))
                        Image::addImg($_FILES['images']['name'][$i],$key);
                }
            }
        }
    }

    static public function removeImg($key)
    {
        $sql = "UPDATE ".self::TABLE."
                SET active = 0
                WHERE key_post = :key_img";
        return DB::getInstance()->prepareQuery($sql,['key_img' => $key],__CLASS__);
    }

    static private function getFormatImg($imgType)
    {
        $format = null;
        switch($imgType){
            case "image/jpeg":
                $format = ".jpg";
                break;
            case "image/png":
                $format = ".png";
                break;
        }
        return $format;
    }

    static private function addImg($name,$key)
    {
        $img = new Image();
        $img->name = $name;
        $img->key_post = $key;
        $img->save();
    }
}