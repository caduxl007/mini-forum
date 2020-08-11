<?php
	include('config.php');

	$forumController = new \controllers\forumController();

	//Listagem dos foruns
	Router::get('/',function() use ($forumController){
		$forumController->home();
	});

	//Listagem dos topicos com base no forum
	Router::get('/?',function($arr) use ($forumController){
		$forumController->topicos($arr[1]);
	});

	//Listagens dos posts com base nos tópicos/forum
	Router::get('/?/?',function($arr) use ($forumController){
		$forumController->postSingle($arr);
	});

	if(Router::isExecuted() == false){
		die('Não existe');
	}

?>