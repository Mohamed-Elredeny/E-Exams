<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-quires.php'); ?> 
<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-functions.php'); ?> 
    
    <link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/admin/admin-main-page.css">
<form action="admin-Questions.php" method="POST">
    <div class="main-admin-div-left">
        <div class="deps"><a href="admin-exams.php">Exams</a></div>
        <div class="deps"><a href="admin-students.php">Students</a></div>
        <div class="deps"><a href="admin-doctors.php">Doctors</a></div>
        <div class="deps"><a href="admin-universities.php"> Universities</a></div>
        <div class="deps"><a href="admin-Faculties.php">Faculties</a></div>
        <div class="deps"><a href="admin-Levels.php">Levels</a></div>
        <div class="deps"><a href="admin-Departments.php">Departments</a></div>
        <div class="deps"><a href="admin-Subjects.php">Subjects</a></div>
        <div class="deps"><a href="admin-Chapters.php">Chapters</a></div>
     <div class="deps"><a href="admin-Questions.php">Questions</a></div>

    
    </div>
     <div class="main-admin-div-right">
        <center>
           <h2>Questions Page</h2>
               <table border="2">
                   <tr>
                       <th>University</th>
                       <th>Facility</th>
                       <th>level</th>
                       <th>Department</th>
                       <th>Subject</th>
                       <th>Chapter</th>
                       <th>Question Type</th>
                       <th>Question Difficulty</th>
                   </tr>
                   <tr>
                       <td>
                            <select name="sel_q_nui" id="sel_q_nui">
                                <option>Select University</option>
                                <?php foreach($view_universities_res as $res){ ?>
                                  <option value="<?php echo $res['id'] ?>"><?php echo GetUniversityName($res['id'],'Universities','name'); ?></option>
                                 <?php } ?>
                            </select>
                        </td>

                       <td>
                            <select name="sel_q_fac" id="sel_q_fac">
                                <option></option>
                            </select>
                        </td>
                       <td>
                            <select name="sel_q_lvl" id="sel_q_lvl">
                                <option></option>
                            </select>
                        </td>
                       <td>
                            <select name="sel_q_dep" id="sel_q_dep">
                                <option></option>
                            </select>
                        </td>
                       <td>
                            <select name="sel_q_sub" id="sel_q_sub">
                                <option></option> 
                            </select>
                        </td>
                       <td>
                            <select name="sel_q_chapter" id="sel_q_chapter">
                                <option></option>
                            </select>
                        </td>
                       <td>
                            <select name="sel_q_type" id="sel_q_type">
                              <?php foreach($view_question_types_res as $res){ ?>
                                <option <?php echo $res['id']; ?>><?php echo $res['name'] ?></option>
                              <?php } ?>
                            </select>
                        </td>
                       <td>
                            <select name="sel_q_diff" id="sel_q_diff"> 
                              <?php foreach($view_question_types_diff_res as $res){ ?>
                                <option <?php echo $res['id'] ?>><?php echo $res['name'] ?></option>
                              <?php } ?>
                            </select>
                        </td>
                   </tr>
                   <tr>
                       <td colspan="8">
                        <center>
                            <input type="submit" name="sel_question" value="Select">
                        </center>                           
                       </td>
                   </tr>
                </table>

        </center>
               <h1>questions</h1>
               <br><br>
                 <input type="" name=""><br>
                  answers 
                  <select>
                    <option> </option>
                  </select>
                  <br>
                  <input type="" name="">
    </div>
</form>





<?php include ('../../php/header.php'); ?>

<script>
    //Select Facility with university
    $(document).ready(function(){
        $('#sel_q_nui').change(function(){
            var unievrsity = $(this).val();
            $.ajax({
                url:"fetch/questions/sel_uni.php",
                method:"POST",
                data:{Unievrsity:unievrsity},
                dataType:"text",
                success:function(data){
                    $('#sel_q_fac').html(data);
                }
            });
        });
    });
    //Select Level with facility
    $(document).ready(function(){
         $('#sel_q_fac').change(function(){
            var lvl = $(this).val();
            $.ajax({
                url:"fetch/questions/sel_fac.php",
                method:"POST",
                data:{Lvl:lvl},
                dataType:"text",
                success:function(data){
                    $('#sel_q_lvl').html(data);
                }
            });
            });
    });
    //Select dep with level
      $(document).ready(function(){
         $('#sel_q_lvl').change(function(){
            var dep = $(this).val();
            $.ajax({
                url:"fetch/questions/sel_lvl.php",
                method:"POST",
                data:{Dep:dep},
                dataType:"text",
                success:function(data){
                    $('#sel_q_dep').html(data);
                }
            });
            });
    });
      // Select subject with dep
      $(document).ready(function(){
         $('#sel_q_dep').change(function(){
            var sub = $(this).val();
            $.ajax({
                url:"fetch/questions/sel_dep.php",
                method:"POST",
                data:{Sub:sub},
                dataType:"text",
                success:function(data){
                    $('#sel_q_sub').html(data);
                }
            });
            });
    });
    //Select chapter with subject
       $(document).ready(function(){
         $('#sel_q_sub').change(function(){
            var ch = $(this).val();
            $.ajax({
                url:"fetch/questions/sel_sub.php",
                method:"POST",
                data:{Ch:ch},
                dataType:"text",
                success:function(data){
                    $('#sel_q_chapter').html(data);
                }
            });
            });
    });
 

</script>