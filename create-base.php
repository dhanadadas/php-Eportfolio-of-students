<?php
require "includes/part.php";
function dump($what){
	echo '<pre>';print_r($what);
	echo '</pre>';
}
///////создание таблицы ДИСЦИПЛИНА////////////////////////
$ditsiplina =R::dispense('ditsiplina');                 //
$ditsiplina->act = true;                                //
$ditsiplina->code='Адаптивные коммуникативные технологии в инклюзивном образовании';
//$ditsiplina->description = '';                        //
R::store($ditsiplina);                                  //
//////////////////////////////////////////////////////////

//////////создание таблицы ВИДЫ НИРС//////////////////////
$typenirs=R::dispense('typenirs');                      //
$typenirs->type="Публикация (статья)";                  //
R::store($typenirs);                                    //
//////////////////3 вида//////////////////////////////////
$typenirs=R::dispense('typenirs');                      //
$typenirs->type="Участие в научном мероприятии";        //
R::store($typenirs);                                    //
//////////////////////////////////////////////////////////
$typenirs=R::dispense('typenirs');                      //
$typenirs->type="Конкурсы, олимпиады";                  //
R::store($typenirs);                                    //
//////////////////////////////////////////////////////////

//////////создание таблицы специальности//////////////////
$spec=R::dispense("spec");                              //
$spec->ind_spec="080500.62";                            //
$spec->ind_spec_new="38.03.02";                         //
$spec->name_spec="ТЕСТОВОЕ";                            //
$spec->code_cafedra="19";                               //
$spec->name_spec_for_diplom="Менеджмент";               //
$spec->code_napr="3";                                   //
$spec->lit_spec="Мен-Б";                                //
$spec->cvalif="БАКАЛАВР МЕНЕДЖМЕНТА";                   //
$spec->code_ur_o="2";                                   //
$spec->rang_spec="3";                                   //
$spec->code_spec="6";                                   //
R::store($spec);                                        //
//////////////////////////////////////////////////////////

//////////создание таблицы КОД ГРУППЫ/////////////////////
$groups=R::dispense("groups");                          //
$groups->fgroups='false';                               //
$groups->fgroups='false';                               //
$groups->code_up_o='1';                                 //
$groups->spec_id='1';                                   //
$groups->code_naprav='1';                               //
$groups->code_pot='1';                                  //
$groups->potok='А';                                     //
$groups->year="03";                                     //
$groups->code_forma_ob="1";                             //
$groups->kurs="1";                                      //
$groups->index_groups="ГСО-03";                         //
$groups->nomer_groups="1";                              //
$groups->index_groups_fuul="ГСО-03";                    //
R::store($groups);                                      //
//////////////////////////////////////////////////////////

///////////создание таблицы КОНТИНГЕНТ////////////////////
$student=R::dispense('contingent');     				//
$student->fstud=false;                                  //
$student->famaly="Иванов-тест";                         //
$student->name="Иван";                                  //
$student->subname="Иванович";                           //
$student->birthday="25.09.1962";                        //
$student->sex="муж";                                    //
$student->nationality="Россия";                         //
$student->email="sdv@br.ranepa.ru";                     //
$student->fax="72-72-72";                               //
$student->nomergroups="2";                              //
$student->groups_id="1";                                //
$student->vipusk=true;                                  //
$student->yearvipusk="2017";                            //
$student->budget=false;                                 //
$student->krdip=false;                                  //
$student->dostizh_uc_nauch="3 место в районной олимпиаде по истории, 1 место в районной олимпиаде по литературе, за особые успехи в изучении  обществознания, истории, русского языка, информатики";
$student->dostizh_tvorch="музыкальная школа, класс хореографии и фортепиано";
$student->dostih_sport="победы на соревнованиях среди школьников Брянска по волейболу ( не однократно ) и по футболу";
$student->dostizh_obshhestv="за активное участие в общественной жизни школы";
$student->dostizh_proch="3 года активно принимал участие в творческом объединении 'искатель', готовящем активистов района, 6 лет участвовал в детском хоре (солировал)";
//$student->spec_id="1";                                //
R::store($student);                                     //
//////////////////////////////////////////////////////////

//////////создание таблицы НИРС///////////////////////////
$nirs=R::dispense("nirs");                              //
$nirs->contingent_id='1';                               //
$nirs->typenirs_id='1';                                 //
$nirs->name_nirs='Конференция';                         //
$nirs->date_nirs='13.12.2017';                          //
$nirs->rezult='1-е место';                              //
$nirs->file="http://ya.ru";                             //
R::store($nirs);                                        //
//////////////////////////////////////////////////////////




////добовляем 20 тестовых пользователей
//$x=0;
//while ($x!=20){
/////////////создание таблицы КОНТИНГЕНТ////////////////////////
//    $student=R::dispense('contingent');                     //
//    $student->fstud=false;                                  //
//    $student->famaly="Иванов";                              //
//    $student->name="Иван";                                  //
//    $student->subname="Иванович";                           //
//    $student->birthday="25.09.1962";                        //
//    $student->sex="жен";                                    //
//    $student->nationality="Россия";                         //
//    $student->email="sdv@br.ranepa.ru";                     //
//    $student->fax="72-72-72";                               //
//    $student->nomergroups="2";                              //
//    $student->codegroups="ЮВЗ-01(1,2)2";                    //
////$student->foto="3";                                       //
////$student->CopAkadSpr=false;                               //
//    $student->vipusk=true;                                  //
//    $student->yearvipusk="2017";                            //
////$student->CodeVipusk="";                                  //
////$student->PerevodVuz="";                                  //
////$student->CodeZayavPerepod="";                            //
////$student->CodePredPerevod="";                             //
////$student->kurs="";                                        //
////$student->AcademSpravka="";                               //
//    $student->budget=false;                                 //
//    $student->krdip=false;                                  //
//    $student->dostizh_uc_nauch="3 место в районной олимпиаде по истории, 1 место в районной олимпиаде по литературе, за особые успехи в изучении  обществознания, истории, русского языка, информатики";
//    $student->dostizh_tvorch="музыкальная школа, класс хореографии и фортепиано";
//    $student->dostih_sport="победы на соревнованиях среди школьников Брянска по волейболу ( не однократно ) и по футболу";
//    $student->dostizh_obshhestv="за активное участие в общественной жизни школы";
//    $student->dostizh_proch="3 года активно принимал участие в творческом объединении 'искатель', готовящем активистов района, 6 лет участвовал в детском хоре (солировал)";
//    //$student->spec_id="1";                                //
//    R::store($student);                                     //
////////////////////////////////////////////////////////////////
//    $x++;
//};



