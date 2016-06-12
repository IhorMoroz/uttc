<?php

namespace core\models;


use core\helpers\DB;
use core\traits\Filters;
use core\traits\UniqueKey;

class Post extends Model
{
    use Filters, UniqueKey;

    const TABLE = 'posts';
    const COMMENT = 'comments';
    const IMAGE = 'images';

    public $id;
    public $title;
    public $content;
    public $status;
    public $tags;
    public $key_img;

    static public function getPost($id)
    {
        $sql = "SELECT id, title, content, status, tags, key_img FROM ".self::TABLE." WHERE id = :id";
        return DB::getInstance()->prepareQuery($sql,['id' => $id],__CLASS__);
    }

    static public function getPosts()
    {
        $sql = "SELECT id, title, content, status, tags, key_img
                FROM ".self::TABLE;
        return DB::getInstance()->prepareQuery($sql,[],__CLASS__);
    }

    public function addPost()
    {
        $keyImg = $this->getUniqueKey();
        $post = new Post();
        $post->title = $this->Filter('str')($_POST['title']);
        $post->content = $this->Filter('str')($_POST['content']);
        $post->status = $this->Filter('int')($_POST['status']);
        $post->tags = $this->Filter('str')($_POST['tags']);
        $post->key_img = $keyImg;
        $post->save();

        if(is_uploaded_file($_FILES['images']['tmp_name'][0]) ||
            is_uploaded_file($_FILES['images']['tmp_name'][1]) ||
            is_uploaded_file($_FILES['images']['tmp_name'][2])
        ){
            Image::saveImg($keyImg);
        }
    }

    public function editPost()
    {
        $id = (int)$_POST['id'];
        $post = Post::getOne($id);
        $post->title = $this->Filter('str')($_POST['title']);
        $post->content = $this->Filter('str')($_POST['content']);
        $post->status = $this->Filter('int')($_POST['status']);
        $post->tags = $this->Filter('str')($_POST['tags']);
        $post->save();

        if(is_uploaded_file($_FILES['images']['tmp_name'][0]) ||
            is_uploaded_file($_FILES['images']['tmp_name'][1]) ||
            is_uploaded_file($_FILES['images']['tmp_name'][2])
        ){
            Image::removeImg($this->Filter('str')($_POST['keyImg']));
            Image::saveImg($this->Filter('str')($_POST['keyImg']));
        }
    }

    public function dropPost($id)
    {
        $id = (int)$id[0];
        $post = Post::getOne($id);
        $post->delete();
    }
}