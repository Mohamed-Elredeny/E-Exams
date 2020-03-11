<?php
session_start(); 
$con = mysqli_connect('localhost','root','','e-examsproject');


	$studentquery = mysqli_query($con,"SELECT * FROM students WHERE id = '".$_SESSION['id']."'");
	$studentData = mysqli_fetch_all($studentquery,MYSQLI_ASSOC);

	$studentsub = mysqli_query($con,"SELECT * FROM student_subjects WHERE student_id='".$_SESSION['id']."' ");
	$studentsubjects = mysqli_fetch_all($studentsub,MYSQLI_ASSOC);

	//View all doctor to show in contact doctor page
	$view_all_doctor = mysqli_query($con,"SELECT * FROM professors ");
	$view_all_doctor_res = mysqli_fetch_all($view_all_doctor,MYSQLI_ASSOC);



function ViewFloor($offic_id){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$View_floor_name=mysqli_query($con,"SELECT * FROM offices where office_num='".$offic_id."'");
	$View_floor_name_res =mysqli_fetch_all($View_floor_name,MYSQLI_ASSOC);
	return $View_floor_name_res[0]['floor_id'];
}
function ViewFloorName($floor_id){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$View_floor_name1=mysqli_query($con,"SELECT * FROM floors where id='".$floor_id."'");
	$View_floor_name_res1 =mysqli_fetch_all($View_floor_name1,MYSQLI_ASSOC);
	return $View_floor_name_res1[0]['floor_num'];

}
function ViewFacultyName($id){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$View_Faculty_Name= mysqli_query($con,"SELECT * FROM faculties where id='".$id."'  ");
	$View_Faculty_Name_Res=mysqli_fetch_all($View_Faculty_Name,MYSQLI_ASSOC);
	return $View_Faculty_Name_Res[0]['name'];
}
//subjects query with id
function subjectName($id){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$subject_query_with_id = mysqli_query($con,"SELECT * FROM subjects where id = '".$id."' ");
	$subject_query_with_id_result = mysqli_fetch_all($subject_query_with_id,MYSQLI_ASSOC);
	
	return $subject_query_with_id_result[0]['name'];
}

function subjectDoctors($Subname){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$doctor_subject= mysqli_query($con,"SELECT * FROM subjects where name = '".$Subname."'");
	$doctor_subject_result = mysqli_fetch_all($doctor_subject,MYSQLI_ASSOC);
	foreach ($doctor_subject_result as $key ) {
		
		$doctor_name = mysqli_query($con,"SELECT * FROM professors where id ='".$key['doctor']."'");
		$doctor_name_result = mysqli_fetch_all($doctor_name,MYSQLI_ASSOC);

		return $doctor_name_result[0]['name'];
	}

}

function GetQuestionName($id){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$get_question_name_with_question_id =mysqli_query($con,"SELECT * FROM questions WHERE id ='".$id."'");
	$get_question_name_with_question_id_res =mysqli_fetch_all($get_question_name_with_question_id,MYSQLI_ASSOC);
	return $get_question_name_with_question_id_res[0]['name'];
}

function GetDifficultyName($id){
		$con = mysqli_connect('localhost','root','','e-examsproject');
		$get_difficlty_with_question = mysqli_query($con,"SELECT * FROM questions_difficulty where id='".$id."'");
		$get_difficlty_with_question_res =mysqli_fetch_all($get_difficlty_with_question,MYSQLI_ASSOC);
		return $get_difficlty_with_question_res[0]['name'];

}
function GetTrueAnswer($content){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$view_true_answer=mysqli_query($con,"SELECT * FROM question_answer where question_content ='".$content."'  ");
	$view_true_answer_res = mysqli_fetch_all($view_true_answer,MYSQLI_ASSOC);
	if(count($view_true_answer_res) >0){
		return $view_true_answer_res[0]['right_answer'];
	}
	
}


function GetAnyAnswer($question_id){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$view_each_question_results = mysqli_query($con,"SELECT * FROM wrong_answers where id='".$question_id."'");
	$view_each_question_results_res = mysqli_fetch_all($view_each_question_results,MYSQLI_ASSOC);
	return $view_each_question_results_res[0]['Answer'];
}



function GetAllAnswers($real_question_id){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$view_each_question_results = mysqli_query($con,"SELECT * FROM wrong_answers where real_question_id='".$real_question_id."' ORDER BY RAND()");
	$view_each_question_results_res = mysqli_fetch_all($view_each_question_results,MYSQLI_ASSOC);
	$i=1;
	if(if_answer_exist($real_question_id) == true){
			foreach($view_each_question_results_res as $res){
				if(GetTrueAnswer($real_question_id) == $res['Answer']){
					echo "<input style='background:green' type='button' value='".$i." '> " .$res['Answer']."<br>";
				}else{
					echo "<input type='button' value='".$i." '> " .$res['Answer']."<br>";
				}
				
				$i++;
			}
			echo "<br>";
	}else{
		echo "Your question has no answers";
	}
}




function if_answer_exist($question_id){

	$con = mysqli_connect('localhost','root','','e-examsproject');
	$if_there_were_answers=mysqli_query($con,"SELECT * FROM wrong_answers where real_question_id='".$question_id."'");
	$if_there_were_answers_res =mysqli_fetch_all($if_there_were_answers,MYSQLI_ASSOC);
	if($if_there_were_answers_res > 0){
		return true;
	}else{
		return false;
	}

}


function GetUniversityName($id_tb,$tableName,$field){
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$getUniName = mysqli_query($con,"SELECT * FROM ".$tableName." WHERE id ='".$id_tb."' ");
	$getUniName_res = mysqli_fetch_all($getUniName,MYSQLI_ASSOC);
	return $getUniName_res[0]["$field"];
	
}
