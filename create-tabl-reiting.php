<?php
//////////////////////////////////////////////////////////////
require "includes/part.php";                                //
function dump($what){                                       //
    echo '<pre>';print_r($what);                            //
    echo '</pre>';                                          //
}                                                           //
$student = R::load('contingent', 375);                      //загружаем таблицу с пользователем
$reiting = R::dispense('reiting');                          // создаем таблицу рейтинг учеб.
                $reiting-> ditsiplina_id = 2;               //
                $reiting-> percent       = 90.1;            //
                $reiting-> ball          = 92.5;            //
                $reiting-> mesto         = "3 из 32";       //
                $reiting-> contingent_id = "24 из 32";      //
$student->ownReitingList[] = $reiting;                        //создаем отношение
R::store($student);                                         //
//////////////////////////////////////////////////////////////
