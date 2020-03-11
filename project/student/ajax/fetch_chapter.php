<?php
if(isset($_POST['Subject'])){
$con = mysqli_connect('localhost','root','','e-examsproject');
$output='';
$select_chapter_with_subject=mysqli_query($con,"SELECT * FROM chapters WHERE subject_id ='".$_POST['Subject']."' ");
$select_chapter_with_subject_res = mysqli_fetch_all($select_chapter_with_subject,MYSQLI_ASSOC);
$output ='<option value="">Select chapter</option>';

foreach ($select_chapter_with_subject_res as $se) {
	$output .='<option value='.$se['id'].'>'.$se['name'].'</option>';
}
echo $output;
}else{
	header('location:http://localhost/E%20Exams%20Project');
}