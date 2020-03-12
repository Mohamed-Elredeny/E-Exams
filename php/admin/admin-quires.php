<?php 
$con = mysqli_connect('localhost','root','','e-examsproject');

$view_universities = mysqli_query($con,"SELECT * FROM universities");
$view_universities_res = mysqli_fetch_all($view_universities,MYSQLI_ASSOC);



$view_faculties = mysqli_query($con,"SELECT * FROM faculties");
$view_faculties_res = mysqli_fetch_all($view_faculties,MYSQLI_ASSOC);


$view_subjects = mysqli_query($con,"SELECT * FROM subjects");
$view_subjects_res = mysqli_fetch_all($view_subjects,MYSQLI_ASSOC);

$view_levels = mysqli_query($con,"SELECT * FROM levels ");
$view_levels_res = mysqli_fetch_all($view_levels,MYSQLI_ASSOC);

$view_proffessors =mysqli_query($con,"SELECT * FROM professors");
$view_proffessors_res = mysqli_fetch_all($view_proffessors,MYSQLI_ASSOC);

$view_departments = mysqli_query($con,"SELECT * FROM departments");
$view_departments_res = mysqli_fetch_all($view_departments,MYSQLI_ASSOC);

$view_chapters =mysqli_query($con,"SELECT * FROM chapters ");
$view_chapters_res = mysqli_fetch_all($view_chapters,MYSQLI_ASSOC);

$view_question_types = mysqli_query($con,"SELECT * FROM questions");
$view_question_types_res = mysqli_fetch_all($view_question_types,MYSQLI_ASSOC);

$view_question_types_diff = mysqli_query($con,"SELECT * FROM questions_difficulty");
$view_question_types_diff_res = mysqli_fetch_all($view_question_types_diff,MYSQLI_ASSOC);
