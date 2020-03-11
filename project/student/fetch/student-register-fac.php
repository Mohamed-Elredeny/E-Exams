<?php
if(isset($_POST['Stdfac'])){
$con = mysqli_connect('localhost','root','','e-examsproject');
$output='';
$select_level_with_fac=mysqli_query($con,"SELECT * FROM levels WHERE facility ='".$_POST['Stdfac']."' ");
$select_level_with_fac_res = mysqli_fetch_all($select_level_with_fac,MYSQLI_ASSOC);
$output ='<option value="">Select Level</option>';

foreach ($select_level_with_fac_res as $se) {
	$output .='<option value='.$se['id'].'>'.$se['name'].'</option>';
}
echo $output;
}else{
	header('location:http://localhost/E%20Exams%20Project');
}