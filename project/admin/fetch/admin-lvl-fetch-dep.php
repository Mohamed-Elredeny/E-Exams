<?php
if(isset($_POST['AddNew'])){
$con = mysqli_connect('localhost','root','','e-examsproject');
$output='';
$select_dep_with_level=mysqli_query($con,"SELECT * FROM departments WHERE id ='".$_POST['AddNew']."' ");
$select_dep_with_level_res = mysqli_fetch_all($select_dep_with_level,MYSQLI_ASSOC);
$output ='<option value="">Select Department</option>';

foreach ($select_dep_with_level_res as $se) {
	$output .='<option value='.$se['id'].'>'.$se['name'].'</option>';
}
echo $output;
}else{
	header('location:http://localhost/E%20Exams%20Project');
}