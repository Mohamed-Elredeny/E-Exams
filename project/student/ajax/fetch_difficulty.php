<?php
include('C:\xampp1\htdocs\E Exams Project\php\student\student-main-page.php');
echo $_POST['Diffculty'];

$con = mysqli_connect('localhost','root','','e-examsproject');
$output2='';
$select_difficulty=mysqli_query($con,"SELECT * FROM specific_question_difficulty where questions_id='".$_POST['Diffculty']."' ");
$select_difficulty_res = mysqli_fetch_all($select_difficulty,MYSQLI_ASSOC);

$output2 ='<option value="">Select Diffculty</option>';

for($i=0;$i<count($select_difficulty_res);$i++) {
	$output2 .='<option value='.$select_difficulty_res[$i]['diffculty_id'].'>'.GetDifficultyName($select_difficulty_res[$i]['diffculty_id']) .'</option>';
}
echo $output2;
