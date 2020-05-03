<?php
//open libs
require "libs/rb.php";
//connect
R::setup( 'mysql:host=localhost;dbname=sreda_db','sreda_db', 'pass');
if (!R::testConnection()) {
    echo 'нет соединения с базой данных';
};
session_start();
