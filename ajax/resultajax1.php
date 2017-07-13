<?php 
$number = isset($_POST['number']) ? (int)$_POST['number'] : false;


if (!$number){
    die ('<h3 style="color:red;">please,input the number greate more than 1</h3>');
}

for ($i = 1; $i <= $number; $i++){
    echo '<li>Số: '.$i.'</li>';
}

 ?>