<?php 

require_once 'core/init.php';

if ($user) {
	header('Location : index.php');
}

$user_signup = isset($_POST['user_signupj']) ? $_POST['user_signupj'] : false;
$pass_signup = isset($_POST['pass_signupj']) ? $_POST['pass_signupj'] : false;
$repass_signup = isset($_POST['repass_signupj']) ? $_POST['repass_signupj'] : false;

$show_alert = "<script>$('#formSignup .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formSignup .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formSignup .alert').attr('class', 'alert alert-success');</script>";

$sql_check_user_exist = "SELECT username FROM users WHERE username = '$user_signup'";

if (strlen($user_signup) < 6 || strlen($user_signup) > 24)
{
    echo $show_alert.'Username is lenght between 6 and 24.';
}

else if (preg_match('/\W/', $user_signup))
{
    echo $show_alert.'Name include A to Z and a to z';
}     

else if ($db->num_rows($sql_check_user_exist))
{
    echo $show_alert.'Account is exist!!!';
}

else if (strlen($pass_signup) < 6)
{
   
    echo $show_alert.'Password so short, you much change your password to safe';
}

else if ($pass_signup != $repass_signup)
{
    echo $show_alert.'Repassword not match with password';
}
else
{

    $pass_signup = md5($pass_signup);   
    $time = time();
    $time = date('Y-m-d H:i:s',$time);
    $sql_signup = "INSERT INTO `note`.`users` ( `username`, `password`, `date_signuped`) VALUES ('$user_signup','$pass_signup','$time')";
    $sql = $db->conn->prepare($sql_signup);
    $sql->execute();
    $session->sendSession($user_signup);
    $db->closeDB();

    echo $show_alert.$success_alert." Register successs.
        <script>
            location.reload();
        </script>
    ";
}