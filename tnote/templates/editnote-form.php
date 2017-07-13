<?php 
$id_user  = $db->takeId($user);

$sql_get_data_note = "SELECT * FROM note.notes WHERE user_id = '$id_user' AND id_note = '$get_id'";
$data_note = $db->fetch_data_row($sql_get_data_note, PDO::FETCH_ASSOC);

 
$date_created = $data_note['date_created'];
    $day_created = substr($date_created, 8, 2); 
    $month_created = substr($date_created, 5, 2); 
    $year_created = substr($date_created, 0, 4); 
    $hour_created = substr($date_created, 11, 2); 
    $min_created = substr($date_created, 14, 2); 
 
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary">Edit note</h3>
            <div class="alert alert-info">Create Day
            <?php
                
                echo $day_created.' Month
                     '.$month_created.' Year
                     '.$year_created.' When
                     '.$hour_created.':'.$min_created;
            ?>
            </div>
            <form method="POST" action="javascript:void(0)" id="formEditNote">
                <div class="form-group">
                    <label for="user_signin"> Title </label>
                    <input type="text" class="form-control" id="title_edit_note" value="<?php echo $data_note['title'];  ?>">
                </div>
                <div class="form-group">
                    <label for="pass_signin">Content</label>
                    <textarea class="form-control" id="body_edit_note" rows="5"><?php echo $data_note['body'];  ?></textarea>
                </div>
                <input type="hidden" value="<?php echo $data_note['id_note']; ?>" id="id_edit_note">
                <a href="index.php" class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Back
                </a>
                <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modalDeleteNote">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
                <input type="submit" class="btn btn-primary" id="submit_edit_note" value="Save" />
                   
                
                <br><br>
                <div class="alert alert-danger hidden"></div>
            </form>
        </div>
    </div>
</div>
