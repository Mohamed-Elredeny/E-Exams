<?php 
	function signup($stdname,$stdpassword,$stdemail,$stduniversity,$stdfacility,$stdlevel,$stddepartment ,$submit){
		$con = mysqli_connect('localhost','root','','e-examsproject');

		if(isset($_POST["$submit"])){


	
		$stdname =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$stdname"]));	
		$stdemail =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$stdemail"]));
		$stdpassword =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$stdpassword"]));
		$stduniversity =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$stduniversity"]));	
		$stdfacility =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$stdfacility"]));
		$stdlevel =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$stdlevel"]));
		$stddepartment =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$stddepartment"]));

		$sql = "INSERT INTO `students`( `name`, `email`, `password`, `university`, `facility`, `level`, `department`,`status`) VALUES ('".$stdname."','".$stdemail."','".$stdpassword."','".$stduniversity."','".$stdfacility."','".$stdlevel."','".$stddepartment."','3')";

		$result = mysqli_query($con,$sql);
		if($result){
			header('location:http://localhost/E%20Exams%20Project');
			
		}
		header('location:http://localhost/E%20Exams%20Project/project/student/register.php');
	
	}

}
