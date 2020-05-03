<?php
//функции
function dump($what){
	echo '<pre>';print_r($what);
	echo '</pre>';
};
//выподающий список для всего)
function spisok ($parametr, $name){// name - это название столбца которое должно быть отображено в списке
	$rALL= R::findAll($parametr);
	$r="<select id='$name' name=$parametr>";
	foreach ($rALL as $arr){
		$name_arr=$arr->{$name};
		$input="_input_";
		$r.="<option id='\"$name$input$arr->id' value='$arr->id'>$name_arr</option>";
	};
	$r.="</select>";
	return $r;
};