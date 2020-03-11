<?php
include('C:\xampp1\htdocs\E Exams Project\php\student\student-main-page.php');

if(isset($_POST['Question'])){
$con = mysqli_connect('localhost','root','','e-examsproject');
$output1='';
$select_question_with_chapter=mysqli_query($con,"SELECT * FROM questions_in_each_chapter where chapter_id='".$_POST['Question']."' ");
$select_question_with_chapter_res = mysqli_fetch_all($select_question_with_chapter,MYSQLI_ASSOC);
$output1 ='<option value="">Select question</option>';

foreach ($select_question_with_chapter_res as $qe) {
	$output1 .='<option value='.$qe['question_id'].'>'.GetQuestionName($qe['question_id']).'</option>';
}
echo $output1;
}else{
	header('location:http://localhost/E%20Exams%20Project');
}