<?php 
function ViewTablesNames(){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$q5 = mysqli_query($con,"SELECT TABLE_NAME 
	FROM INFORMATION_SCHEMA.TABLES
	WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='e-examsproject' ");
	$q5_res = mysqli_fetch_all($q5,MYSQLI_ASSOC);
	echo "<select>";
	foreach($q5_res as $q){
		echo "<option value='".$q['TABLE_NAME']."'> ". $q['TABLE_NAME']."<option>";
	}
	echo "</select>";
	return $q['TABLE_NAME'];
}

function SelectAllDataFromAnyTable($table_name){
		$con = mysqli_connect('localhost','root','','e-examsproject');
		$res ="q".$table_name ;
		$res =mysqli_query($con,"SELECT * FROM '$table_name' " );

		$res_q=$res."_res";
		$res_q = mysqli_fetch_all($res,MYSQLI_ASSOC);
	
}

