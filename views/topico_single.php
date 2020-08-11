<h2>Você está em: <a href="<?php echo INCLUDE_PATH; ?>">FORUM</a> > <a href="<?php echo INCLUDE_PATH.$idForum; ?>"><?php echo $forumInfo['nome']; ?></a> > <?php echo $topicoNome; ?></h2>

<?php
	foreach ($posts as $key => $value) {
		echo '<h3>'.$value['nome'].'</h3>';
		echo '<p>'.$value['mensagem'].'</p>';
		echo '<hr>';
	}
?>

<h3 style="background: rgb(225,225,225);"> Responda a esse tópico:</h3>
<form method="post">
	<input style="width: 100%;height: 40px;" type="text" name="nome">
	<textarea style="width: 100%;height: 120px;margin: 10px 0" name="mensagem"></textarea>
	<input type="hidden" name="topico_id" value="<?php echo $idTopico ?>">
	<input type="submit" name="cadastrar_post" value="Enviar!">
</form>