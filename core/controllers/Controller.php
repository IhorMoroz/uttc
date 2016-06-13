<?php

namespace core\controllers;


use core\models\Comment;
use core\models\Image;

abstract class Controller
{
    const DOMAIN = 'uttc';

    static protected function fillsPostImg($posts)
    {
        foreach($posts as $post)
        {
            $post->images = Image::getImagesByKey($post->key_img);
        }
        return $posts;
    }

    static protected function fillsPostComments($posts)
    {
        foreach($posts as $post)
        {
            $post->comments = Comment::getCommentsByKey($post->id);
        }
        return $posts;
    }
}