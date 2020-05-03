<?php
//открываем конект
require "includes/part.php";//база данных и сессии
include "includes/function.php";// обработка текущего пользователя
include "includes/processing-users.php";// обработка текущего пользователя

//var
$ID=375;//временное
$test='';
//$prava=2;//0- гость, 1-студент 2- кафедра 3 админ

//загружаем данные
$students=R::findAll('contingent', "ORDER BY `famaly` ASC LIMIT 36");//('contingent', "ORDER BY `famaly` ASC  LIMIT 35");
$stud=R::load('contingent', $ID);

//определяем контент страницы, а так же теги до вычислений
$content1="<select name='select' size='35'>";//<option selected value=''></option> первый пустой
$content2= "<div class='title_part'>ПОРТФОЛИО</div>
			<div id='ajaxBusy' class='loading_gif'><p> <img src='images/loading.gif'></p></div> <?php echo $content2?><br>
			<div class='clearfix'></div>";
$content3=$content1;
$content4=$content1;
//вычисления
//списки
foreach ($students as $student){
	$content3.="<pre>";
	$content4.="<pre>";
	$FIO_I=mb_substr($student->name,0,1,"UTF-8");
	$FIO_S=mb_substr($student->subname,0,1,"UTF-8");
	$content1.="<option class='selector' data-id='$student->id' value='$student->id'>$student->famaly $FIO_I. $FIO_S.</option>";
	$content3.="<option class='selector' data-id='$student->id' value='$student->id'>$student->id</option>";
	$content4.="<option class='selector' data-id='$student->id' value='$student->id'>$student->id</option>";//2 раза id, надо что то делать, в будущем)
	$content1.="</pre>";
	$content3.="</pre>";
	$content4.="</pre>";
};
//таблицы

//добавление после вычислений
$content1.="</select>";
$content3.="</select>";
$content4.="</select>";
?>
<?php
if (isset($_SESSION['logged_user'])):?>



	<?php
	include "header.php";
	?>
    <!--основной контент-->
    <table style="background-color: #dfe2e1" border="3"><tr style='vertical-align: top' height="100%" width="1300px">
            <td height="600px" width="16%"><center>A-Я</center><?php echo $content1?></td>
            <td  width="1000px">
							<?php echo (!$prava>=1 ? "<a id='vhod' href='vhod/index.php'><img src='images/login.png' style='float: left; height: 80px' alt='login'></a>" : "<a id='save' href='#'><img src='images/save.png' style='float: left; height: 40px' alt='save'></a><a href='#'><img id='undo' src='images/undo.png' class='selector' data-id='5' style='  float: left; height: 40px' alt='undo'></a>"); ?>
							<?php echo $content2?>

                <table border="3" style='float:left;width: 15%'><tr><td><img class="zoom" id="foto-prof" src='/unnamed.jpg' style="max-height: 85%; max-width: 95%; text-align: center"></td></tr></table>
                <table border="3" style='float:left; width: 85%'>
                    <tr><td>Код БД</td><td id="ajax_id">выбирите студента
                        </td>
                        <td>АКАДЕМИЧЕСКАЯ ГРУППА</td><td>
												<?php echo (!$prava>=2 ? "<div id='ajax_index_groups_fuul'></div>" : spisok("groups", 'index_groups_fuul'). "<div style='display: none' id='ajax_index_groups_fuul'>2</div>"); ?>
                        </td></tr>
                    <tr><td>ФАМИЛИЯ</td><td<?php if ($prava>=2):?> contenteditable="true"<?php endif; ?> id="ajax_famaly">Фамилия</td>
                        <td>КУРС</td><td id="ajax_kurs">-</td></tr>
                    <tr><td>ИМЯ</td><td<?php if ($prava>=2):?> contenteditable="true"<?php endif; ?> id="ajax_name">Имя</td>
                        <td>НАПРАВЛЕНИЕ ПОДГОТОВКИ</td><td><?php echo (!$prava>=2 ? "<div id='ajax_name_spec'></div>" : spisok("spec", 'name_spec'). "<div style='display: none' id='ajax_name_spec'></div>"); ?></td></tr>
                    <tr><td>ОТЧЕСТВО</td><td<?php if ($prava>=2):?> contenteditable="true"<?php endif; ?> id="ajax_subname">Отчество</td>
                        <td>ФОРМА ОБУЧЕНИЯ</td><td>-</td></tr>
                    <tr><td>ДАТА РОЖДЕНИЯ</td><td>
												<?php echo (!$prava>=2 ? "<div id='ajax_birthday'>дата</div>" : "<input name='ajax_birthday_input' id='ajax_birthday' type='date' value=''>"); ?>
                        </td>
                        <td>КУРАТОР ГРУППЫ</td><td>-</td></tr>
                </table>
                <div style="display: none" id="ajax_groups_id"></div>
                <div style="display: none" id="ajax_spec_id"></div>
                Персональные достижения (по видам деятельности)
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'uch')">Учебные</button>
                    <button class="tablinks" onclick="openCity(event, 'nauch')">Научные</button>
                    <button class="tablinks" onclick="openCity(event, 'soc')">Общественные</button>
                    <button class="tablinks" onclick="openCity(event, 'recenz')">Рецензии</button>
                    <button class="tablinks" onclick="openCity(event, 'dost')">Достижение</button>
                    <button class="tablinks" onclick="openCity(event, 'comm')">Комментарии</button>
                    <button style="color: red; display: none" class="tablinks" id="save_dost" ><b>Сохранить</b></button>

                </div>
                <div id="uch" class="tabcontent">
                    <table id="ajax_reiting" class="change" border="3"  style="width: 100%"><tr>
                            <td>дисциплина</td>
                            <td>%посещ</td>
                            <td>балл</td>
                            <td>место</td>
                        </tr>
                    </table>
                </div>
                <div id="nauch" class="tabcontent change">
                    <table id="ajax_nirs" border="3" style="width: 100%"><tr>
                            <td>Вид НИРС</td>
                            <td>наименование, тема и т.п.</td>
                            <td>дата</td>
                            <td>результат</td>
                            <td>файл</td>
                        </tr>
											<?php include "tabs/blank-nirs.php"; echo $content_tab2 ?>
                    </table>
                </div>
                <div id="soc" class="tabcontent">
                    <h3>Общественные достижения</h3>
                    <p>тут будут общественные достижения</p>
                </div>
                <div id="recenz" class="tabcontent">
                    <h3>Резензии</h3>
                    <p>тут будут резензии</p>
                </div>
                <div id="dost" class="tabcontent">
                    <h3>Достижение</h3>
                    <p>тут будут достижения</p>
                </div>
                <div id="comm" class="tabcontent">
                    <h3>Комментарии</h3>
                    <p>тут будут комментарии</p>
                </div>
            </td>
            <td width="10%"><center>УЧ. РЕЙТИНГ</center> <?php echo $content3?></td>
            <td width="10%"><center>ОБЩ. РЕЙТИНГ</center> <?php echo $content4?></td>
        </tr>
    </table>

	<?php
	include "footer.php";
	?>


<?php else :?>
    <script type="text/javascript">
			location.replace("../vhod/");
    </script>
<?php endif; ?>
