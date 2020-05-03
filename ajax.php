<?php
require "includes/part.php";
if(isset($_POST['id']))
{
    $id=$_POST['id'];
    //$id=$_SESSION['logged_user']->id;
    $student = R::load('contingent', $id);            //человек
    $groups  = R::load('groups', $student->groups_id);//инфо группы
    $spec    = R::load('spec', $groups->spec_id);     //инфо специальности

    $data = (object)array(
        "id"                => $student->id,
        "name"              => $student->name,
        "famaly"            => $student->famaly,
        "subname"           => $student->subname,
        "birthday"          => $student->birthday,
        "index_groups_fuul" => $groups->index_groups_fuul,
        "kurs"              => $groups->kurs,
        "groups_id"         => $groups->id,
        "spec_id"           => $spec->id,
        "name_spec"         => $spec->name_spec);

    header('Content-type: application/json');
    echo json_encode($data,JSON_UNESCAPED_UNICODE);

}
?>
