<?php include('C:\xampp1\htdocs\E Exams Project\php\student\register.php'); ?>
<?php include('C:\xampp1\htdocs\E Exams Project\php\student\student-main-page.php'); ?>
<?php include('C:\xampp1\htdocs\E Exams Project\php\dbcon.php'); ?>

<?php  signup('stdname','stdpassword','stdemail','stduniversity','stdfacility','stdlevel','stddepartment' ,'std-register'); ?>
<link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/student/register.css">

<div class="student-signup-form">
	<form action="register.php" method="POST">
		<h3>E-exams Sign up </h3>
		<h5>Already have account? <a href="http://localhost/E%20Exams%20Project/project/student/login.php">  Login</a></h5>

		

		<label class="txt1">Name</label>
		<input type="txt" name="stdname" class="inp1">

		<label class="txt1">Email</label>
		<input type="Email" name="stdemail" class="inp1">

		<label class="txt1">Password</label>
		<input type="Password" name="stdpassword" class="inp1">

		<label class="txt1">University</label>
		<select name="stduniversity" class="sel1" id="stduniversity">
			<option option="">Select University</option>
			<?php foreach($universities as $uni){ ?>
			<option value="<?php echo $uni['id'] ?>"><?php  echo GetUniversityName($uni['id'],'universities','name'); ?></option>
			<?php } ?>
		</select>

		<label class="txt1">Facility</label>
		<select name="stdfacility" class="sel1" id="stdfacility">
			
		</select>


		<label class="txt1">Level</label>
		<select name="stdlevel" class="sel1" id="stdlevel">
			
		</select>


		<label class="txt1">Department</label>
		<select name="stddepartment" class="sel1" id="stddepartment">
			
		</select>



  <button type="submit" class="btn btn-primary mb-2"  style="margin-top: 50px" name="std-register">Sign up</button>

	</form>
</div>

<?php include ('../../php/header.php'); ?>

<?php include('../../php/footer.php'); ?>
<script>
	//Ftech facility with university
	$(document).ready(function(){
		$('#stduniversity').change(function(){
			var stduni = $(this).val();
			$.ajax({
				url:"fetch/student-register-uni.php",
				method:"POST",
				data:{Stduni:stduni},
				dataType:"text",
				success:function(data){
					$('#stdfacility').html(data);
				}
			});
		});
	});


	//fetch level with facility
	$(document).ready(function(){
		$('#stdfacility').change(function(){
			var stdfac = $(this).val();
			$.ajax({
				url:"fetch/student-register-fac.php",
				method:"POST",
				data:{Stdfac:stdfac},
				dataType:"text",
				success:function(data){
					$('#stdlevel').html(data);
				}
			});
		});
	});

	//fetch department with level
	$(document).ready(function(){
		$('#stdlevel').change(function(){
			var stdlvl = $(this).val();
			$.ajax({
				url:"fetch/student-register-lvl.php",
				method:"POST",
				data:{Stdlvl:stdlvl},
				dataType:"text",
				success:function(data){
					$('#stddepartment').html(data);
				}
			});
		});
	});

</script>