<?php
//обработкаданных пользователя
//dump($_SESSION['logged_user']);
if (isset($_SESSION['logged_user'])){
	$login=$_SESSION['logged_user']->username;
	$userFIND = R::findOne('user', "`username` =?", array($login));
	if (empty($userFIND)){
		$user=R::findOrCreate('user',array(username=>$login));
		$user->password=$_SESSION['logged_user']->password;
		$user->firstname=$_SESSION['logged_user']->firstname;
		$user->lastname=$_SESSION['logged_user']->lastname;
		$user->access=1;//0- гость, 1-студент 2- кафедра 3 админ. ПО УМОЛЧАНИЮ 1.
		$user->email=$_SESSION['logged_user']->email;
		$user->moodleID=$_SESSION['logged_user']->id;
		$user->time_reg= time();
		$find_contingent=R::findAll('contingent', ' famaly = :famaly ', [ ':famaly' => $_SESSION['logged_user']->lastname]);
		if (count($find_contingent)==1){
			foreach ($find_contingent as $find_cont)
				$user->contingent_id=$find_cont->id;
		}
		R::store($user);
		$_SESSION['logged_user']=$user;
	} else {
		$_SESSION['logged_user']=$userFIND;
		$userFIND->time_lost=time();
		$prava=$_SESSION['logged_user']->access;
		$ID_user=$_SESSION['logged_user']->id;
		$ID_moodle=$_SESSION['logged_user']->moodle_id;
		R::store($userFIND);
	}
}else{
	$userFIND = R::findOne('user', "`username` =?", array(1));
	$ID_user=$userFIND->id;
	$prava=$userFIND->access;
}