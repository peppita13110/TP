<?php
require('controller/frontend.php');

try 
{
    if (isset($_GET['action'])) 
    {
        if ($_GET['action'] == 'listPosts') 
        {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                post();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') 
        {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) 
            {
                addComment($_POST['postId'], $_POST['author'], $_POST['comment']);
            }
                
            else 
            {
               throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }

        elseif ($_GET['action'] == 'getComment') 
        {
            
             if (isset($_GET['id'])) 
            {
                $idCom = $_GET['id'];
                getComment($idCom);
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'updateComment') 
        {
            
             if (isset($_GET['id'])) 
            {
                $id = $_GET['id'];
                $comment = $_POST['comment'];
                updateComment($id, $comment);
            }
            else 
            {
                throw new Exception('Identifiant Commentaire non fournis par votre adsl');
            }
        }
    }
    else 
    {
        listPosts();
    }
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}