
<?php
 
require_once 'core/init.php';
 

if (!$user)
{
    header('Location: index.php'); 
}
 

$old_pass = isset($_POST['old_passj']) ? $_POST['old_passj'] : false;
$new_pass = isset($_POST['new_passj']) ? $_POST['new_passj'] : false;
$re_new_pass = isset($_POST['re_new_passj']) ? $_POST['re_new_passj'] : false;
 

$show_alert = "<script>$('#formChangePass .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formChangePass .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formChangePass .alert').attr('class', 'alert alert-success');</script>";
 

if ($old_pass != $data_user['password'])
{
    echo $show_alert.'Wrong password and turn off cap lock button';
}

else if (strlen($new_pass) < 6)
{
    echo $show_alert.'Password too short and change password to safe';
}

else if ($new_pass != $re_new_pass)
{
    echo $show_alert.'confirm password not match with password';
}

else
{
    $new_pass = md5($new_pass); 
    
    $sql_change_pass = "UPDATE users SET password = '$new_pass' WHERE id_user = '$data_user[id_user]'";
   

    echo $show_alert.$success_alert.'Change password success
        <script>
            location.reload();
        </script>
    ';
}
 
?>