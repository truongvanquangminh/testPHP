<?php

use App\Core\App;

// khởi tạo instance config và đưa vào registry
App::bind('config', require 'config.php');

// khởi tạo querybuilder để truy xuất DB
App::bind('database',  new QueryBuilder(
    Connection::make(App::get('config')['database'])
));
