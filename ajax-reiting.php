<?php
require "includes/part.php";
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    //$id=$_SESSION['logged_user']->id;
    $student = R::load('contingent', 375);            //человек
    $groups = R::load('groups', $student->groups_id);//инфо группы
    $spec = R::load('spec', $groups->spec_id);     //инфо специальности
    $content="";
    $content="<table  class='change' border='3'  style='width: 100%'><tr>
                    <td>дисциплина</td>
                    <td>%посещ</td>
                    <td>балл</td>
                    <td>место</td>
                </tr>";
    foreach ($student->ownReitingList as $reiting) {
        $ditsiplina = R::load('ditsiplina', $reiting->ditsiplina_id);     //инфо специальности
        $ditsiplinaALL = R::findAll('ditsiplina');
        $ditsiplinaALLcheck="<select name='typenirs'>";
        foreach ($ditsiplinaALL as $arr){
            $dop='';
            if ($arr->id==$ditsiplina->id){
                $dop="selected";
            }
            $ditsiplinaALLcheck.="<option $dop value='$arr->id'>$arr->code</option>";
        };
        $ditsiplinaALLcheck.="</select>";
        $content.= "<tr>
                    <td>$ditsiplinaALLcheck</td>
                    <td contenteditable='true'>$reiting->percent</td>
                    <td contenteditable='true'>$reiting->ball</td>
                    <td style='width: 8%' contenteditable='true'>$reiting->mesto</td>
                    </tr>";
    }
    $content.="</table>";
    echo $content;
}


?>