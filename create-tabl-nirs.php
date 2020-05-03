<?php
//////////////////////////////////////////////////////////////
require "includes/part.php";                                //
function dump($what){                                       //
    echo '<pre>';print_r($what);                            //
    echo '</pre>';                                          //
}                                                           //
$student = R::load('contingent', 375);                      //загружаем таблицу с пользователем
$nirs = R::dispense('nirs');                                // создаем таблицу nirs
$nirs->contingent_id='1';                                   //
$nirs->typenirs_id='1';                                     //
$nirs->name_nirs='Конференция';                             //
$nirs->date_nirs='13.12.2017';                              //
$nirs->rezult='1-е место';                                  //
$nirs->file="http://ya.ru";                                 //
$student->ownNirsList[] = $nirs;                            //создаем отношение
R::store($student);                                         //
//////////////////////////////////////////////////////////////
