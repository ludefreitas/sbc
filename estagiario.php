<?php

use \Sbc\PageEstagiario;
use \Sbc\Model\User;


$app->get("/estagiario", function() {

	User::verifyLoginEstagiario();

	$page = new PageEstagiario();

	$page->setTpl("index");
});


?>