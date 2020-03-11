<?php
if(isset($_POST['Stduni'])){
$con = mysqli_connect('localhost','root','','e-examsproject');
$output='';
$select_fac_with_uni=mysqli_query($con,"SELECT * FROM faculties WHERE university ='".$_POST['Stduni']."' ");
$select_fac_with_uni_res = mysqli_fetch_all($select_fac_with_uni,MYSQLI_ASSOC);
$output ='<option value="">Select Faculty</option>';

foreach ($select_fac_with_uni_res as $se) {
	$output .='<option value='.$se['id'].'>'.$se['name'].'</option>';
}
echo $output;
}else{
	header('location:http://localhost/E%20Exams%20Project');
}