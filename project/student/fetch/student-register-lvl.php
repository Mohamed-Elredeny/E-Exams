<?php
if(isset($_POST['Qtype'])){
$con = mysqli_connect('localhost','root','','e-examsproject');
$output='';
$select_dep_with_lvl=mysqli_query($con,"SELECT * FROM questions_in_each_chapter WHERE chapter_id ='".$_POST['Qtype']."' ");
$select_dep_with_lvl_res = mysqli_fetch_all($select_dep_with_lvl,MYSQLI_ASSOC);
$output ='<option value="">Select Department</option>';

foreach ($select_dep_with_lvl_res as $se) {
	$output .='<option value='.$se['id'].'>'.$se['question_id'].'</option>';
}
echo $output;
}else{
	header('location:http://localhost/E%20Exams%20Project');
}