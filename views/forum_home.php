<h2>Bem-vindo ao nosso fórum</h2>

<form method="post">
	<input type="text" name="titulo_forum">
	<input type="submit" name="cadastrar_forum" value="Cadastrar!">
</form>

<ul>
	<?php
		foreach ($foruns as $key => $value) {
	?>
	<li><a href="<?php echo INCLUDE_PATH; ?><?php echo $value['id']; ?>"><?php echo $value['nome']; ?></a></li>
	<?php } ?>
</ul>