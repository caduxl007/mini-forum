<h2>Você está em: <a href="<?php echo INCLUDE_PATH; ?>">FORUM</a> > <?php echo $forumInfo['nome']; ?></h2>

<form method="post">
	<input type="text" name="titulo_topico">
	<input type="hidden" name="forum_id" value="<?php echo $forumInfo['id']; ?>">
	<input type="submit" name="cadastrar_topico" value="Cadastrar!">
</form>

<ul>
	<?php
		foreach ($topicos as $key => $value) {
	?>
	<li><a href="<?php echo INCLUDE_PATH; ?><?php echo $forumInfo['id']; ?>/<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></a></li>
	<?php } ?>
</ul>