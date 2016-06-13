<?php

namespace core\controllers;


use core\models\Comment;
use core\view\View;
use core\models\Post;
use core\models\Tag;

class IndexController extends Controller
{
    public function __construct()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST") self::addComment();
    }

    public function indexAction()
    {
        $view = new View();
        $view->posts = Post::getPosts();
        $view->posts = self::fillsPostImg($view->posts);
        $view->content = $view->render('home.temp.php');
        $view->display('index.temp.php');
    }

    public function showAction($id)
    {
        $id = (int)$id[0];
        $view = new View();
        $view->post = Post::getPost($id);
        $view->post = self::fillsPostImg($view->post);
        $view->post = self::fillsPostComments($view->post);
        $view->content = $view->render('show.temp.php');
        $view->display('index.temp.php');
    }

    static private function addComment()
    {
        $comm = new Comment();
        $comm->addComment();
        header("Location: http://".self::DOMAIN."/index/show/".$_POST['id']);
    }
}