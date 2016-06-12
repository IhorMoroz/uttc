<?php

namespace core\models;


use core\helpers\DB;
use core\traits\Filters;

class Comment extends Model
{
    use Filters;

    const TABLE = 'comments';

    public $id;
    public $email;
    public $content;
    public $post_id;

    static public function getCommentsByKey($key)
    {
        $sql = "SELECT *
                FROM ".self::TABLE."
                WHERE post_id = :id";
        return DB::getInstance()->prepareQuery($sql,['id' => $key],__CLASS__);
    }

    public function addComment()
    {
        $comm = new Comment();
        $comm->email = $this->Filter('email')($_POST['email']);
        $comm->content = $this->Filter('str')($_POST['text']);
        $comm->post_id = $this->Filter('int')($_POST['id']);
        $comm->save();
    }
}