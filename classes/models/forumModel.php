<?php
	namespace models;

	class forumModel
	{
		public function listarForum(){
			$listarForuns = \Mysql::conectar()->prepare("SELECT * FROM `tb_foruns`");
			$listarForuns->execute();
			$foruns = $listarForuns->fetchAll();
			include('views/forum_home.php');
		}

		public function listarTopicos($idForum){
			$forumNome = \Mysql::conectar()->prepare("SELECT * FROM `tb_foruns` WHERE id = ?");
			$forumNome->execute(array($idForum));
			$forumInfo = $forumNome->fetch();
			$listarTopicos = \Mysql::conectar()->prepare("SELECT * FROM `tb_forum.topicos` WHERE forum_id = ?");
			$listarTopicos->execute(array($idForum));
			$topicos = $listarTopicos->fetchAll();
			include('views/topicos.php');
		}

		public function listarPosts($arr){
			$idForum = $arr[1];
			$idTopico = $arr[2];
			$forumNome = \Mysql::conectar()->prepare("SELECT * FROM `tb_foruns` WHERE id = ?");
			$forumNome->execute(array($idForum));
			$forumInfo = $forumNome->fetch();
			$topicoNome = \Mysql::conectar()->prepare("SELECT * FROM `tb_forum.topicos` WHERE id = ?");
			$topicoNome->execute(array($idTopico));
			$topicoNome = $topicoNome->fetch()['nome'];
			$pegarPosts = \Mysql::conectar()->prepare("SELECT * FROM `tb_forum.posts` WHERE topico_id = ?");
			$pegarPosts->execute(array($idTopico));
			$posts = $pegarPosts->fetchAll();
			include('views/topico_single.php');
		}
	}
?>