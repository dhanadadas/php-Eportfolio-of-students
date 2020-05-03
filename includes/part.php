<?php
//open libs
require "libs/rb.php";
//connect
R::setup( 'mysql:host=localhost;dbname=bfrane_part','bfrane_part', 'rQw5TwKx');
if (!R::testConnection()) {
    echo 'нет соединения с б1азой данн1ых';
};
session_start();
