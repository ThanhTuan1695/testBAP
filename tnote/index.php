<?php 

	require_once (dirname(__FILE__). '/core/init.php');
	require_once 'includes/header.php';
	if ($user) {
		if (isset($_GET['ac'])) {
			$ac = addslashes(trim(htmlentities($_GET['ac'])));
			if ($ac == 'create_note') {
				require_once 'templates/createnote-form.php';
			}elseif ($ac == 'edit_note') {
				if ($_GET['ide']) {
					$get_id = addslashes(trim(htmlentities($_GET['ide'])));
					$id_user = $db->takeId($user);
					if ($get_id != '') {
						$sql = "SELECT id_note, user_id FROM note.notes WHERE user_id = '$id_user' AND id_note = '$get_id'";
						if ($db->num_rows($sql)) {
							require_once 'templates/editnote-form.php';
						}else{
?>
							 <div class="container">
	                            <div class="alert alert-danger">
	                                Note not exist!!!.
	                            </div>
	                         </div>
<?php
						}
					}else{
						header("Localtion: index.php");
					}
				}else{
				header("Localtion: index.php");
				}
			}elseif ($ac == 'change_password') {
				require_once 'templates/changepass-form.php';
			}
		}else{
			require_once 'templates/listnote.php';
		}
	}else{
		require_once 'templates/signin-up-form.php';
	}
	require_once 'includes/footer.php';
 ?>