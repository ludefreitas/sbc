<?php

use \Sbc\PageProf;
use \Sbc\Model\User;


$app->get("/prof", function() {

	User::checkLoginProf();

	$page = new PageProf();

	$page->setTpl("index");
});


?>