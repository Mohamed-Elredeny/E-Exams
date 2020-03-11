<?php 
//ADD New Records For Universities
if(isset($_POST['addUni'])){ 
    $id = $_POST['UniId'];  
 	InsertToAnyTable('universities','name','test');
 	 header('location:http://localhost/E%20Exams%20Project/project/admin/admin-universities.php'); 
}

//ADD New Records For Facilties
if(isset($_POST['AddFac'])){
	$con = mysqli_connect("localhost","root","","e-examsproject"); 
   	$Fac_new_name = $_POST['AddFacName'];
   	$Fac_new_uin = $_POST['AddFacUni'];

   	$AddNewFac = mysqli_query($con,"INSERT INTO faculties (name,university) VALUES ('".$Fac_new_name."','".$Fac_new_uin."') ");
   	if($AddNewFac){
   		header('location:http://localhost/E%20Exams%20Project');
   	}


   	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Faculties.php');
}


//Delete Specific Record For Universities
if(isset($_GET['id'])){
	if(isset($_POST['addUni'])){ 
	  header('location:http://localhost/E%20Exams%20Project/project/admin/admin-universities.php'); 
	}
	 $id_delete=$_GET['id'];
	 DeleteAnyRecord('universities',"$id_delete");
	 header('location:http://localhost/E%20Exams%20Project/project/admin/admin-universities.php'); 
}

//Modify Specific Record For Universities
if(isset($_POST['modifyUni'])){

	$Modid = $_POST['UniId'];
	$field = $_POST['changeUniName'];  
 	ModifyAnyTable("$Modid",'name',"$field",'universities');
 	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-universities.php'); 
}

//Delete Specific Fac

if(isset($_GET['facid'])){
	$fac_id = $_GET['facid'];
	DeleteAnyRecord('faculties',"$fac_id");
	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Faculties.php');
}

//Modify Specific Faculity
if(isset($_POST['EditFac'])){
	$IdFacForEdit =$_POST['IdFacForEdit'];
	$NameFacForEdit=$_POST['NameFacForEdit'];
	$UniFacForEdit=$_POST['UniFacForEdit'];
	echo "<br><br><br><br>". $UniFacForEdit;
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$up = mysqli_query($con,"UPDATE faculties SET name='".$NameFacForEdit."',university='".$UniFacForEdit."' WHERE id='".$IdFacForEdit."'  ");
	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Faculties.php');

}

//Add New Subject
if(isset($_POST['AddNewSubject'])){
	$AddNewSubjectName = $_POST['AddNewSubjectName'];
	$AddNewSubjectLevel = $_POST['AddNewSubjectLevel'];
	$AddNewSubjectDepartment =$_POST['AddNewSubjectDepartment'];
	$AddNewSubjectDoctor = $_POST['AddNewSubjectDoctor'];
	$AddNewSubjectHours = $_POST['AddNewSubjectHours'];

	$Add_New_Subject = mysqli_query($con,"INSERT INTO subjects( name, department, doctor,level,hours) VALUES ('$AddNewSubjectName','$AddNewSubjectDepartment','$AddNewSubjectDoctor','$AddNewSubjectLevel','$AddNewSubjectHours') ");
	if($Add_New_Subject){
			header('location:http://localhost/E%20Exams%20Project');
	}
	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Subjects.php');

}
//Delete Any Subject
if(isset($_GET['Subid'])){
	$fac_id = $_GET['Subid'];
	DeleteAnyRecord('subjects',"$fac_id");
	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Subjects.php');
}

//Modify Specific Subject
if(isset($_POST['EditSubDet'])){
	$EditSubId=$_POST['EditSubId'];
	$EditSubName =$_POST['EditSubName'];
	$EditSubLevel = $_POST['EditSubLevel'];
	$EditSubDep = $_POST['EditSubDep'];
	$EditSubDoc = $_POST['EditSubDoc'];
	$EditSubHours = $_POST['EditSubHours'];
	$modSubDet = mysqli_query($con,"UPDATE subjects SET name='".$EditSubName."',department='".$EditSubDep."',doctor='".$EditSubDoc."',level='".$EditSubLevel."',hours='".$EditSubHours."' WHERE id='".$EditSubId."' ");
		header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Subjects.php');

	

}

//MODIFY unievrsities records
function ModifyAnyTable($id,$tablename,$field,$table){

	$con = mysqli_connect("localhost","root","","e-examsproject");
	$up = mysqli_query($con,"UPDATE ".$table." SET ".$tablename." ='".$field."' WHERE id='".$id."' ");
	if($up){
		echo "Done";
	}
}


//Insert into University 
function InsertToAnyTable($table_name,$fields,$values){
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$add = mysqli_query($con,"INSERT INTO ".$table_name." (".$fields.") VALUES ('".$values."'); ");
}


//Insert into Faculity 
function InsertToAnyTableForFac($table_name,$fields,$values){
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$add = mysqli_query($con,"INSERT INTO ".$table_name." (".$fields.",'university') VALUES ('".$values."','6'); ");
}

function DeleteAnyRecord($tablename,$id){
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$del =mysqli_query($con,"DELETE FROM ".$tablename." WHERE id=".$id." ");
}

//Get University Name With Id
//Get Subject  Name With Id
function GetUniversityName($id_tb,$tableName,$field){
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$getUniName = mysqli_query($con,"SELECT * FROM ".$tableName." WHERE id ='".$id_tb."' ");
	$getUniName_res = mysqli_fetch_all($getUniName,MYSQLI_ASSOC);
	return $getUniName_res[0]["$field"];
	
}
//Get Chapters in each subject
function ChaptersSumInEachSub($id){
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$get_chapters=mysqli_query($con,"SELECT * FROM chapters WHERE subject_id = '".$id."'");
	$get_chapters_res = mysqli_fetch_all($get_chapters,MYSQLI_ASSOC);
	return count($get_chapters_res);

}

