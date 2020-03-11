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