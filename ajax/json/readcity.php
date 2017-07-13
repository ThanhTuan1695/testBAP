
		
<?php 
	
		$fp = fopen("city.txt", "r");
		if (!empty($_POST['keyword'])) {	
			if (!$fp) {
			    echo 'open file unsuccess!!';
			}else{
?>
  		<ul id="country-list"> 
<?php 
	    while(!feof($fp)){
	    	$tmp = fgets($fp);
	    	if (strpos($tmp,$_POST['keyword']) !== false) {
?>
   		<li onClick="selectCity('<?php echo trim($tmp);?>');" style="list-style-type: none;"> <?php echo $tmp; ?></li>
<?php
    		}
  		}
?>
    	</ul>
<?php
			}
		}
?>



