<?php
require "includes/part.php";
function changeDateFormat($sourceDate, $newFormat) {
    $r = date($newFormat, strtotime($sourceDate));
    return $r;
}
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    //$id=$_SESSION['logged_user']->id;
    $student = R::load('contingent', 375);            //человек
    $content="";

    //for формирование выподающего списка НИРС
    $typenirsALL = R::findAll('typenirs');
    $content="<table  class='change' border='3'  style='width: 100%'><tr>
                <td>Вид НИРС</td>
                <td>наименование, тема и т.п.</td>
                <td>дата</td>
                <td>результат</td>
                <td>файл</td>
                </tr>";
    foreach ($student->ownNirsList as $nirs) {
        $data1='';
        $typenirs = R::load('typenirs', $nirs->typenirs_id);//инфо специальности

        $typenirsALLcheck="<select name='new_typenirs'>";
        $typenirsALL = R::findAll('typenirs');
        foreach ($typenirsALL as $arr){
            $dop='';
            if ($arr->id==$typenirs->id){
                $dop="selected";
            }
            $typenirsALLcheck.="<option $dop value='$arr->id'>$arr->type</option>";
        };
        $typenirsALLcheck.="</select>";
        $content.= "<tr>
                    <td>$typenirsALLcheck</td>
                    <td contenteditable='true'>$nirs->name_nirs</td>
                    <td><input id='new_date_nir' type='date' value=$nirs->date_nirs></td>
                    <td contenteditable='true'>$nirs->rezult</td>
                    <td><a href='$nirs->file'>$nirs->file</a></td>
                    </tr>";
    }
	include "tabs/blank-nirs.php";
	$content.=$content_tab2;
    $content.="</table>";
    echo $content;
}
?>