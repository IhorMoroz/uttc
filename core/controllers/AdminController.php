<?php

namespace core\controllers;


use core\models\Comment;
use core\models\Image;
use core\models\Post;
use core\models\Status;
use core\view\View;

class AdminController extends Controller
{

    public function mainAction()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if(!empty($_POST[id])) $this->edit();
            else $this->add();
        }
    }

    public function indexAction()
    {
        $view = new View();
        $view->posts = Post::getPosts();
        $view->posts = self::fillsPostImg($view->posts);
        $view->posts = self::fillsPostComments($view->posts);
        $view->content = $view->render('a.post.temp.php');
        $view->display('a.index.temp.php');
    }

    public function newAction()
    {
        $view = new View();
        $view->status = Status::getAll();
        $view->content = $view->render('a.new.temp.php');
        $view->display('a.index.temp.php');
    }

    public function editAction($id)
    {
        $id = (int)$id[0];
        $view = new View();
        $view->post = Post::getPost($id);
        $view->post = self::fillsPostImg($view->post);
        $view->status = Status::getAll();
        $view->content = $view->render('a.edit.temp.php');
        $view->display('a.index.temp.php');
    }

    public function dropAction($id)
    {
        $post = new Post();
        $post->dropPost($id);
        header("Location: http://".self::DOMAIN."/admin/");
    }

    private function add()
    {
        $post = new Post();
        $post->addPost();
        header("Location: http://".self::DOMAIN."/admin/");
    }

    private function edit()
    {
        $post = new Post();
        $post->editPost();
        header("Location: http://".self::DOMAIN."/admin/");
    }
}