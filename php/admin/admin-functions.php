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

if(isset($_POST['SelcetStds'])){
	session_start();
	$_SESSION["university"] = $_POST["SelStdUni"];
	$_SESSION["facility"] = $_POST["SelStdFc"];
	$_SESSION['level'] = $_POST["SelStdLevel"];
	$_SESSION['department'] = $_POST["SelStdDep"];	
}

if(isset($_POST['mod-lvl'])){
	$mod_lvl_id =$_POST['mod-lev-id'];
	$mod_lvl_name = $_POST['mod-lev-name'];
	$mod_lev_facility =$_POST['mod-lev-facility'];
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$mod_lvl_data = mysqli_query($con,"UPDATE levels SET name ='".$mod_lvl_name."', facility='".$mod_lev_facility."' WHERE id='".$mod_lvl_id."' ");
	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Levels.php');

}
if(isset($_POST['add-lvl'])){
	$add_lvl_name =$_POST['add-lvl-name'];
	$add_lev_facility = $_POST['add-lev-facility'];
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$AddFacility = mysqli_query($con,"INSERT INTO levels (name,facility) VALUES('".$add_lvl_name."','".$add_lev_facility."') ");
	if($AddFacility){
		header('location:http://localhost/E%20Exams%20Project/');
	}
	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Levels.php');

}

//Delete lvl record
if(isset($_GET['lvl_id'])){
	DeleteAnyRecord('levels',$_GET['lvl_id']);
	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Levels.php');
}

//Add New Dep
if(isset($_POST['add-to-dep'])){
	$add_dep_name =$_POST['add-dep-name'];
	$add_dep_lvl=$_POST['add-dep-lvl'];
	$con =mysqli_connect("localhost","root","","e-examsproject");
	$add_to_dep = mysqli_query($con,"INSERT INTO departments (name,level) VALUES ('".$add_dep_name."','".$add_dep_lvl."') ");
	if($add_to_dep){
		header('location:http://localhost/E%20Exams%20Project/');
	}
	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Departments.php');
}

//Delete Dep
if(isset($_GET['dep_id'])){
	DeleteAnyRecord('departments',$_GET['dep_id']);
	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Departments.php');
}
//Modify Department UsiNG iD
if(isset($_POST['mod-dep'])){
	$mod_dep_id =$_POST['mod-dep-id'];
	$mod_dep_name=$_POST['mod-dep-name'];
	$mod_dep_level=$_POST['mod-dep-level'];
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$mod_dep =mysqli_query($con,"UPDATE departments SET name='".$mod_dep_name."',level='".$mod_dep_level."' WHERE id='".$mod_dep_id."' ");
	if($mod_dep){
		header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Departments.php');
	}
}

//Modify Chapter
if(isset($_POST['mod-ch'])){
	$mod_ch_id = $_POST['mod-ch-id'];
	$mod_ch_name = $_POST['mod-ch-name'];
	$mod_ch_sub = $_POST['mod-ch-sub'];
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$mod_any_ch = mysqli_query($con,"UPDATE chapters SET name='".$mod_ch_name."' , subject_id='".$mod_ch_sub."' where id='".$mod_ch_id."' ");
	if($mod_any_ch){
		header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Chapters.php');
	}
}

//Add New Chapter
if(isset($_POST['add-ch'])){
	$add_ch_name = $_POST['add-ch-name'];
	$add_ch_sub = $_POST['add-ch-sub'];
	$con = mysqli_connect("localhost","root","","e-examsproject");
	$add_new_ch = mysqli_query($con,"INSERT INTO chapters (name,subject_id) VALUES ('".$add_ch_name."','".$add_ch_sub."') ");
	if($add_new_ch){
		header('location:http://localhost/E%20Exams%20Project/');
	}
	header('location:http://localhost/E%20Exams%20Project/project/admin/admin-Chapters.php');
	
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



function GetStudentDet($uni_id,$fac_id,$lvl_id,$dep_id){

	$con = mysqli_connect("localhost","root","","e-examsproject");
	$Get_Std_Det =mysqli_query($con,"SELECT * FROM students where university='".$uni_id."'and facility='".$fac_id."'and level='".$lvl_id."'and department='".$dep_id."' ");
	$row = mysqli_fetch_all($Get_Std_Det,MYSQLI_ASSOC);
	foreach($row as $r){
		echo "<tr>";
				echo "<td>";
					echo $r['id'];
				echo "</td>";
				echo "<td>";
					echo $r['name'];
				echo "</td>";
				echo "<td>";
					echo $r['email'];
				echo "</td>";
				echo "<td>";
					echo $r['password'];
				echo "</td>";
				echo "<td>";
					echo GetUniversityName($r['university'],'universities','name');
				echo "</td>";
				echo "<td>";
					echo GetUniversityName($r['facility'],'faculties','name');
				echo "</td>";
				echo "<td>";
					echo GetUniversityName($r['level'],'levels','name');
				echo "</td>";
				echo "<td>";
					echo GetUniversityName($r['department'],'departments','name');
				echo "</td>";
		echo "</tr>";
	}	
}

function GetUniversityNameUsingFacId($fac_id){	
	$con= mysqli_connect("localhost","root","","e-examsproject");
	$Get_UniName =mysqli_query($con,"SELECT * FROM faculties where id='".$fac_id."' ");
	$Get_UniName_res = mysqli_fetch_all($Get_UniName,MYSQLI_ASSOC);


	return $Get_UniName_res[0]['university'];
}

function Aajx_fun($post_id,$db_table_name,$select_with){
	if(isset($_POST["$post_id"])){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$output='';
	$select=mysqli_query($con,"SELECT * FROM ".$db_table_name." WHERE ".$select_with." ='".$_POST[$post_id]."' ");
	$select_res = mysqli_fetch_all($select,MYSQLI_ASSOC);
	$output ='<option value="">Select '.$db_table_name.'</option>';

	foreach ($select_res as $se) {
		$output .='<option value='.$se['id'].'>'.$se['name'].'</option>';
	}
	echo $output;
	}else{
		header('location:http://localhost/E%20Exams%20Project');
	}
}



