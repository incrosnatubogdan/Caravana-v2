<?php

$config['panels'] = [
	url::link('//administration/home')                   => ['name'=>'Acasa', 'class'=>'pull-left'],
	url::link('//administration/static_pages')           => ['name'=>'Content static', 'class'=>'pull-left'],
	url::link('//administration/articles')               => ['name'=>'Articole', 'class'=>'pull-left'],
	url::link('//administration/sections')               => ['name'=>'Sectiuni', 'class'=>'pull-left'],
	url::link('//administration/users')                  => ['name'=>'Useri', 'class'=>'pull-left'],
	url::link('/administration/authentification/logout') => ['name'=>'Iesire', 'class'=>'pull-left'],
	url::link('//administration/contact_messages')       => ['name'=>'Mesaje contact', 'class'=>'pull-right'],
	url::link('//administration/events')                 => ['name'=>'Caravane', 'class'=>'pull-right'],
	url::link('//administration/fields')                 => ['name'=>'Formular', 'class'=>'pull-right'],
	url::link('//administration/patients')               => ['name'=>'Pacienti', 'class'=>'pull-right'],
];

return $config;
