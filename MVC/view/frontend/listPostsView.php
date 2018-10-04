<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($posts as $post)
{
?>    
<div class="news">
        <h3>
            <?= htmlspecialchars($post['title']); ?>
            <em>le <?= $post['creation_date_fr']; ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($post['content'])); ?>
            <br />
            <a href="<?="index.php?action=post&id=" . $post['id'] ?>">Commentaires</a>
        </p>
    </div>
 

<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>