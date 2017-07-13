<?php
 
require_once 'core/init.php';
 
if (!$user)
{
    header('Location: index.php'); 
}
 

if (isset($_POST['acj']))
{   
    $ac = $_POST['acj'];
    
    if ($ac == 'create')
    {
        
        $title_create_note = isset($_POST['title_create_notej']) ? $_POST['title_create_notej'] : false;
        $body_create_note = isset($_POST['body_create_notej']) ? $_POST['body_create_notej'] : false;
 
        $title_create_note = trim(htmlentities($title_create_note));
        $body_create_note = htmlentities($body_create_note);
 
        
        $show_alert = "<script>$('#formCreateNote .alert').removeClass('hidden');</script>";
        $hide_alert = "<script>$('#formCreateNote .alert').addClass('hidden');</script>";
        $success_alert = "<script>$('#formCreateNote .alert').attr('class', 'alert alert-success');</script>";
        

        
        $sql = "SELECT id_user FROM note.users WHERE username = '$user'";
        $e = $db->conn->prepare($sql);
        $e->execute();
        $row = $e->fetch(PDO::FETCH_ASSOC);
        $id = $row['id_user'];
        $time = time();
        $time = date('Y-m-d H:i:s',$time);

       
        $sql_create_note = "INSERT INTO `note`.`notes` (`user_id`, `title`, `body`, `date_created`) VALUES ('$id', '$title_create_note', '$body_create_note', '$time')";

        $sqle = $db->conn->prepare($sql_create_note);
        $sqle->execute();
       
        
 
       
        echo $show_alert.$success_alert." Create Success
            <script>
                location.href = 'index.php?ac=edit_note&&ide=".$db->last_insert()."';
            </script>
        ";
    } elseif ($ac == 'edit')
    {

        
        $title_edit_note =isset($_POST['title_edit_notej']) ? $_POST['title_edit_notej'] : false;
        $body_edit_note = isset($_POST['body_edit_notej']) ? $_POST['body_edit_notej'] : false;
        $id_edit_note = isset($_POST['id_edit_notej']) ? $_POST['id_edit_notej'] : false;
        $title_edit_note = trim(htmlentities($title_edit_note));
        $body_edit_note = htmlentities($body_edit_note);
        $id_edit_note = trim(htmlentities($id_edit_note));
     
        

        $show_alert = "<script>$('#formEditNote .alert').removeClass('hidden');</script>";
        $hide_alert = "<script>$('#formEditNote .alert').addClass('hidden');</script>";
        $success_alert = "<script>$('#formEditNote .alert').attr('class', 'alert alert-success');</script>";
    
        $id_user = $db->takeId($user);
       
        $sql_check_id_exist = "SELECT id_note, user_id FROM note.notes WHERE user_id = '$id_user' AND id_note = '$id_edit_note'";
     
         
        if ($db->num_rows($sql_check_id_exist))
        {
            $sql_edit_note = "UPDATE note.notes SET
                body = '$body_edit_note',
                title = '$title_edit_note'
                WHERE user_id = '$id_user' AND id_note = '$id_edit_note'
            ";
            
            $re = $db->conn->prepare($sql_edit_note);
            $re->execute();
            echo $show_alert.$success_alert." Edit note is success
            ";
        }
        else
        {
          
            echo $show_alert.'you can edit from another notes.';
        }
    }else if ($ac == 'delete')
    {
       
        $id_edit_note = isset($_POST['id_edit_notej']) ? $_POST['id_edit_notej'] : false;
        $id_edit_note = trim(htmlentities($id_edit_note));
     
      
        $show_alert = "<script>$('#modalDeleteNote .alert').removeClass('hidden');</script>";
        $hide_alert = "<script>$('#modalDeleteNote .alert').addClass('hidden');</script>";
        $success_alert = "<script>$('#modalDeleteNote .alert').attr('class', 'alert alert-success');</script>";
             
       $id_user = $db->takeId($user);
        $sql_check_id_exist = "SELECT id_note, user_id FROM note.notes WHERE user_id = '$id_user' AND id_note = '$id_edit_note'";
     
       
        if ($db->num_rows($sql_check_id_exist))
        {
            
            $sql_delete_note = "DELETE FROM note.notes WHERE user_id = '$id_user' AND id_note = '$id_edit_note'";
            
            $re = $db->conn->prepare($sql_delete_note);
            $re->execute();
            echo $show_alert.$success_alert." delete .
                <script>
                    location.href = 'index.php';
                </script>
            ";
        }
        
        else
        {
           
            echo $show_alert.'You can not delete.';
        }
    }
}
 
?>