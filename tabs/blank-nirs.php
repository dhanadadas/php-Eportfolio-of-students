<?php
$typenirsALLcheck="<select name='new_typenirs'>";
$typenirsALLcheck.="<option selected value=''></option>";// первый пустой
$typenirsALL = R::findAll('typenirs');
foreach ($typenirsALL as $arr){
	$typenirsALLcheck.="<option value='$arr->id'>$arr->type</option>";
};
$typenirsALLcheck.="</select>";

$content_tab2.= "<tr>
			<td>$typenirsALLcheck</td>
			<td id='new_name_nirs'  contenteditable='true'></td>
			<td><input id='new_date_nir' type='date' value=''></td>
			<td id='new_rezult_nir' contenteditable='true'></td>
			<td><input name='myFile' type='file'></td>
			</tr>";
