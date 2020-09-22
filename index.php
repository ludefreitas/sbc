<?php 


require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {

	$sql  = new Sbc\DB\sql();

	$results = $sql->select("SELECT * FROM tb_professor");
    
	echo json_encode($results);

});

$app->run();

 ?>
