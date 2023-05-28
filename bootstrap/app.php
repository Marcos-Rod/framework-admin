<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([

   "driver" => "mysql",

   "host" => DB_HOST,

   "database" => DB_NAME,

   "username" => DB_USER,

   "password" => DB_PASS

]);

$capsule->setAsGlobal();

$capsule->bootEloquent();