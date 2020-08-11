<?php
	namespace controllers;

	class forumController
	{

		private $forumModel;

		public function __construct(){
			$this->forumModel = new \models\forumModel();
		}

		public function home(){
			if(isset($_POST['cadastrar_forum'])){
				//Cadastrar novo fórum
				$nome = $_POST['titulo_forum'];
				$sql = \Mysql::conectar()->prepare("INSERT INTO `tb_foruns` VALUES(null,?)");
				$sql->execute(array($nome));
				echo '<script>alert("Cadastro realizado com sucesso!")</script>';
			}
			$this->forumModel->listarForum();
		}
		public function topicos($idForum){
			//Cadastrar topico
			if(isset($_POST['cadastrar_topico'])){
				$nome = $_POST['titulo_topico'];
				$forum_id = $_POST['forum_id'];
				$sql = \Mysql::conectar()->prepare("INSERT INTO `tb_forum.topicos` VALUES(null,?,?)");
				$sql->execute(array($forum_id,$nome));
				echo '<script>alert("Cadastro realizado com sucesso!")</script>';
			}

			//Listar topicos
			$sql = \Mysql::conectar()->prepare("SELECT id FROM `tb_foruns` WHERE id = ?");
			$sql->execute(array($idForum));
			if($sql->rowCount() == 1){
				$this->forumModel->listarTopicos($idForum);
			}else{
				die('Não existe esse fórum');
			}
		}

		public function postSingle($arr){
			//Cadastrar posts
			if(isset($_POST['cadastrar_post'])){
				$nome = $_POST['nome'];
				$mensagem = $_POST['mensagem'];
				$topico_id = $_POST['topico_id'];
				$sql = \Mysql::conectar()->prepare("INSERT INTO `tb_forum.posts` VALUES(null,?,?,?)");
				$sql->execute(array($topico_id,$nome,$mensagem));
				echo '<script>alert("Seu post foi feito com sucesso!")</script>';
			}

			//Listar posts
			$verifica = \Mysql::conectar()->prepare("SELECT id FROM `tb_forum.topicos` WHERE id = ?");
			$verifica->execute(array($arr[2]));
			if($verifica->rowCount() == 1){
				$this->forumModel->listarPosts($arr);
			}else{
				die('O tópico não existe!');
			}
		}
	}
	
?>