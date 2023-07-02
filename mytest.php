<?php

include('database.php');
$obj = new query();

$conditionArr = array('name'=>'vishal');
$result = $obj->getdata('user','*','','','','');
// echo "<br>";
// print_r($result);

// $conditionArr = array('name'=>'raju','email'=>'raju@gmail.com','mobile'=>'123321');
// $result = $obj->insertdata('user',$conditionArr);

// $conditionArr = array('name'=>'Shahrukh','email'=>'iamsrk@gmail.com','mobile'=>'00000');
// $result = $obj->updateData('user',$conditionArr,'id',3);
// echo $result.'<br>';

?>