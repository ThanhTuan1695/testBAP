<?php
 

require_once 'core/init.php';
 

if ($user)
{
    header('Location: index.php'); 
}

$user_signin = isset($_POST['user_signinj']) ? $_POST['user_signinj'] : false;
$pass_signin = isset($_POST['pass_signinj']) ? $_POST['pass_signinj'] : false;
if ($pass_signin) {
    $pass_signin = md5($_POST['pass_signinj']);
}


$show_alert = "<script>$('#formSignin .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formSignin .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formSignin .alert').attr('class', 'alert alert-success');</script>";
 

$sql_check_user_exist = "SELECT username FROM users WHERE username = '$user_signin'";
 

if ($db->num_rows($sql_check_user_exist))
{
   
    $sql_check_login = "SELECT username FROM users WHERE username = '$user_signin' AND password = '$pass_signin'";
    
    if ($db->num_rows($sql_check_login))
    {
       
        $session->sendSession($user_signin);
        
        $db->closeDB();
 
        echo $show_alert.$success_alert." Success.
            <script>
                location.reload();
            </script>
        ";
    }
    
    else
    {
        echo $show_alert.'Password wrong';
    }
}

else
{
    echo $show_alert.'Account not exist!!!.';
}