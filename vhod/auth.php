<?php
//открываем конект
require_once "includes/moodle.php";
function dump($what){
    echo '<pre>';print_r($what);
    echo '</pre>';
}
$data = $_POST;
if (isset($data['do_login'])){
    $errors=[];
    $user=R::findOne('mdl_user', 'username=?', array($data['login']));
    if ($user){
        //логин существует
        if (password_verify($data['password'], $user->password)){
            //всё хорошо
            $_SESSION['logged_user']=$user;
            echo  '<div style="color:red;">Вы авторизованы! Можете перейти на <a href="http://part.rane-brf.ru/index.php"> главную</a></div><hr>';
?>
				<script type="text/javascript">
                    setTimeout('location.replace("/index.php")', 100);
				</script>
<?php
            $fileopen=fopen("log1.txt", "a+");
            $iddd=$user->id;
            $looggin=$user->username;
            $write=date(DATE_RFC822);
            $write.=" Успешно зашел пользователь с ID $iddd (логин $looggin)";
            fwrite($fileopen,$write);
            fclose($fileopen);

        } else
        {
            $errors[]= 'Не верно введен пароль';
        }
    } else
    {
        $errors[]= 'Не найден с таким логином';
    }
    if ( ! empty($errors) )
    {
        echo '<div style="color:red;">'.dump($errors).'</div><hr>';
    }

}
?>