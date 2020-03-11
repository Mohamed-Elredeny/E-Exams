<?php
if(isset($_POST['Stdlvl'])){
$con = mysqli_connect('localhost','root','','e-examsproject');
$output='';
$select_dep_with_lvl=mysqli_query($con,"SELECT * FROM departments WHERE level ='".$_POST['Stdlvl']."' ");
$select_dep_with_lvl_res = mysqli_fetch_all($select_dep_with_lvl,MYSQLI_ASSOC);
$output ='<option value="">Select Department</option>';

foreach ($select_dep_with_lvl_res as $se) {
	$output .='<option value='.$se['id'].'>'.$se['name'].'</option>';
}
echo $output;
}else{
	header('location:http://localhost/E%20Exams%20Project');
}