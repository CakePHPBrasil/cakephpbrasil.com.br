<?php

use Symfony\Component\HttpFoundation\Request;
use WebDevBr\Validations\Validation;
use Symfony\Component\HttpFoundation\Session\Session;

$app->get('/', function() use ($app) {
	$db = $app['db'];
	$links = $db::table('links')->where('active', true)
		->get();
	return json_encode($links);
});

$app->get('/add', function() use ($app) {
	$form = $app['form.factory']->createBuilder('form')
        ->add('title', 'text', ['label'=>'Título do artigo', 'attr'=>['class'=>'form-control']])
        ->add('desc', 'textarea', ['label'=>'Descrição do artigo', 'attr'=>['class'=>'form-control']])
        ->add('link', 'url', ['attr'=>['class'=>'form-control']])
        ->getForm();

    $session = new Session();
    $form = $form->createView();

	return $app['twig']->render('form.twig.php', compact('session', 'form'));
})->bind('get');

$app->post('/add', function(Request $request) use ($app) {
	$data = isset($request->request->all()['form']) ? $request->request->all() : null;
	Validation::add($data['form']);

	extract($data['form']);

	$db = $app['db'];

	$session = new Session();
	$session->start();

	$count = $db::table('links')
		->where('link', $link)
		->count();

	if ($count) {
		$session->getFlashBag()->add(
		    'danger',
		    'Esta URL já foi cadastrada!'
		);

		return $app->redirect($app['url_generator']->generate('get'));
	}


	$save['title'] = $title;
	$save['desc'] = $desc;
	$save['link'] = $link;

	$db::table('links')->insert($save);

	$session->getFlashBag()->add(
	    'success',
	    'Cadastrado com sucesso, você pode cadastrar outro! Por favor, aguarde a aprovação do link!'
	);

	return $app->redirect($app['url_generator']->generate('get'));
})->bind('post');