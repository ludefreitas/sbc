<?php

use \Sbc\PageAdmin;

use \Sbc\Model\Saude;
use \Sbc\Model\User;

$app->get("/admin/cid", function() {

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {
		$pagination = Saude::getPageSearchCid($search, $page);
	} else {
		$pagination = Saude::getPageCid($page);
	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{
		array_push($pages, [
			'href'=>'/admin/cid?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}

	$page = new PageAdmin();

	// envia para a página o array retornado pelo listAll
	$page->setTpl("cid", array( // aqui temos um array com muitos arrays
		"cid"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		"pages"=>$pages,
		"error"=>Saude::getError()
	));
});
?>