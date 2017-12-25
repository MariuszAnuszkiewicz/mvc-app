<?php


Config::set('site_name', 'Your site name');
Config::set('languages', array('en', 'fr'));
Config::set('routes', array(

   'default' => '',
   'admin' => 'admin',

));


Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');

//database

Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'mvc');

Config::set('salt', 'jd7sj3sdkd964he7e');

