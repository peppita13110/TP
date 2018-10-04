<?php ob_start(); ?>

<form action="<?="index.php?action=updateComment&id=" . $comment['id'] ?>" method="post">
<input type="textarea" name="comment" value="<?= $comment['comment'] ?>">
<input type="submit" value="Envoyez !">
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
<?php var_dump($comment); ?>