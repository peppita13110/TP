<?php

// Chargement des classes à
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) 
    {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else 
    {
        header('Location: index.php?action=post&id=' . $postId);
    }

}

function getComment($idCom)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $comment = $commentManager->getComment($idCom);
    require('view/frontend/updateView.php');
}

function updateComment($id, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $commentManager->updateComment($id, $comment);

    var_dump(intval($id));
    var_dump($comment);

    // header('Location: index.php?action=getComment&id=' . $idCom);
}