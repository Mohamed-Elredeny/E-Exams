<?php include('C:\xampp1\htdocs\E Exams Project\php\student\student-study.php'); ?>
<?php include('C:\xampp1\htdocs\E Exams Project\php\student\student-main-page.php'); ?>
<link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/student/student-main-page.css">
<!-- Start of the page -->
<?php foreach($studentData as $stddata){ ?>
<div class="student-content" style="margin-bottom: 300px">

	<h3>welcome <?php echo $stddata['name']; ?></h3>
	<h5><a href="http://localhost/E%20Exams%20Project/project/student/student-main-page.php">Check your info</a></h5>
	<br><br>

	<div class="student-check-info">
<!-- Select Questions to study -->
<?php if(!isset($_POST['send'])){ ?>
<form action="student-study.php" method="POST">	
	<table border="2px">
			<tr>
				<td>Select Subject</td>
				<td>
					<select name="subject" id="subject">
						<option value="">Select Subject</option>
						<?php for($i=0;$i<count($one_student_subjects_res);$i++){ 	 ?>

						<option value="<?php echo  $one_student_subjects_res[$i]['subject_id']  ?>"	><?php 	 echo subjectName($one_student_subjects_res[$i]['subject_id']) ?>
							
						</option>
					<?php 	} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Select Chapter</td>
				<td>

					<select name="chapter" id="chapter">
						
					</select>
				</td>
			</tr>
			<tr>
				<td>Select Question</td>
				<td>
					<select name="question" id="question">
					
					</select>
				</td>
			</tr>
			<tr>
				<td>Select Diffculty</td>
				<td>
					<select id="diffculty" name="diffculty">
						
					</select>
				</td>
			</tr>
	</table>
	<input type="submit" name="send">
</form>
<?php }else{ ?>

	<?php for($i=0;$i<count($view_questions_for_studing_res);$i++ ){ ?>
		<?php if(GetQuestionName($view_questions_for_studing_res[$i]['question_type']) == "mcq" ){ ?>
			<!-- view question-->
			<?php echo "<input type='button' value='".($i+1)."'>".$view_questions_for_studing_res[$i]['content'] ."<br>"?>
			<!-- view answers -->
				
				<?php GetAllAnswers($view_questions_for_studing_res[$i]['id']); ?>
		
			<!-- end of view answers -->

		<?php }elseif (GetQuestionName($$view_questions_for_studing_res[$i]['question_type']) == "t&f" ) {
			# code...
		}elseif (GetQuestionName($$view_questions_for_studing_res[$i]['question_type']) == "openQuestion" ) {
			# code...
		}elseif (GetQuestionName($$view_questions_for_studing_res[$i]['question_type']) == "audio" ) {
			# code...
		}elseif (GetQuestionName($$view_questions_for_studing_res[$i]['question_type']) == "vedio" ) {
			# code...
		} ?>

	<?php } ?>
<?php } ?>
</div>
<!-- end of student data loop -- first loop -->
<?php } ?>
	


</div>
</div>




<div class="student-slider" style="margin-top: 50px;">
	<ul>
		<li>
			<label><a href="http://localhost/E%20Exams%20Project/project/student/student-study.php" >Study</a></label>
		</li>
		<li>
			<label><a href="http://localhost/E%20Exams%20Project/project/student/student-register.php"> Register</a></label>
		</li>
		<li>
			<label><a href="http://localhost/E%20Exams%20Project/project/student/student-contact-doctor.php"> Contact Doctor</a></label>
		</li>
		<li>
			<label><a href="http://localhost/E%20Exams%20Project/project/student/student-check-grads.php"> Check grades</a></label>
		</li>
	</ul>
</div>


<!-- Header and footer -->
<?php include ('../../php/header.php'); ?>

<?php include('../../php/footer.php'); ?>

<script type="text/javascript" src="http://localhost/E%20Exams%20Project/style/js/jquery-3.4.1.min.js"></script>
<script>
	$(document).ready(function(){
		$('#subject').change(function(){
				var subject_id_for_chapter =$(this).val();
				$.ajax({
						url:"ajax/fetch_chapter.php",
						method:"POST",
						data:{Subject:subject_id_for_chapter},
						dataType:"text",
						success:function(data){
							$('#chapter').html(data);
						}
				});
		});
	});

	$(document).ready(function(){
		$('#chapter').change(function(){
			var question = $(this).val();
			$.ajax({
				url:"ajax/fetch_question.php",
				method:"POST",
				data:{Question:question},
				dataType:"text",
				success:function(data){
					$('#question').html(data);
				}
			});
		});
	});

	$(document).ready(function(){
		$('#question').change(function(){
			var diffculty = $(this).val();
			$.ajax({
				url:"ajax/fetch_difficulty.php",
				method:"POST",
				data:{Diffculty:diffculty},
				dataType:"text",
				success:function(data){
					$('#diffculty').html(data);
				}
			});
		});
	});

</script>

