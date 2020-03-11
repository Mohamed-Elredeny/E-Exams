<?php 	

if(isset($_POST['send'])){
	
	$con = mysqli_connect('localhost','root','','e-examsproject');

	if(!empty($_POST['subject'])){
		$subject=$_POST['subject'];
	}
	if(!empty($_POST['question'])){
		$question_type = $_POST['question'];
	}
	if(!empty($_POST['chapter'])){
		$chapter =$_POST['chapter'];
	}
	if(!empty($_POST['diffculty'])){
		$question_difficulty =$_POST['diffculty'];

	}
	$view_questions_for_studing=mysqli_query($con,"SELECT * FROM question_content WHERE question_type='".$question_type."' and question_difficulty='".$question_difficulty."' and chapter_id='".$chapter."' and subject_id='".$subject."' ORDER BY RAND() ");
	if($view_questions_for_studing){
		$view_questions_for_studing_res = mysqli_fetch_all($view_questions_for_studing,MYSQLI_ASSOC);
		if(!count($view_questions_for_studing_res) > 0){
			echo "<br><br><br><br><br>There is no question";
		}
	}

}

session_start(); 

$con = mysqli_connect('localhost','root','','e-examsproject');

$one_student_subjects=mysqli_query($con,"SELECT * FROM student_subjects WHERE student_id ='".$_SESSION['id']."'");
$one_student_subjects_res = mysqli_fetch_all($one_student_subjects,MYSQLI_ASSOC);


