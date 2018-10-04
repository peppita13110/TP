<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date');
        $req->execute(array($postId));
        $comments = $req->fetchAll();

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $req->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function updateComment($id, $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment = :comment WHERE id = :id');
        $req->execute(array(
            'comment' => $comment,
            'id' => $id));

        return $req;
    }

    public function getComment($idCom)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id AS id, comment AS comment FROM comments WHERE id = ?');
        $req->execute(array($idCom));
        $comment = $req->fetch();

        return $comment;
    }
}
