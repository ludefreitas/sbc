<?php

use \Sbc\Page;


$app->get("/", function() {

	$page = new Page();

	$page->setTpl("index");
});



?>