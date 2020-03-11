<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-quires.php'); ?>  
<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-functions.php'); ?> 

<link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/admin/admin-main-page.css">

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
        <h2>Subjects</h2>
           <table border="2">
               <tr>
                   <td>
                       Subject Id
                   </td>
                   <td>
                       Subject Name
                   </td>
                     <td>
                       Level
                   </td>
                   <td>
                       Department
                   </td>
                   <td>
                       Doctor
                   </td>
                    <td>
                       Hours
                   </td>
                   <td>
                       Chapters
                   </td>
                
                   <td>
                       DELETE
                   </td>
               </tr>
               <?php foreach($view_subjects_res as $res){ ?>
               <tr>
                   <td>
                       <?php echo $res['id']; ?>
                   </td>
                   <td>
                       <?php echo $res['name']; ?>
                   </td>
                   <td>
                       <?php echo GetUniversityName($res['level'],'levels','name'); ?>
                   </td>
                   <td>
                       <?php echo GetUniversityName($res['department'],'departments','name'); ?>
                   </td>
                   <td>
                       <?php echo GetUniversityName($res['doctor'],'professors','name'); ?>
                   </td>
                   <td>
                       <?php echo $res['hours']; ?>
                   </td>
                   <td>
                       <?php echo ChaptersSumInEachSub($res['id']) ?>
                   </td>
                   
                   <td>
                      <a href="http://localhost/E%20Exams%20Project/project/admin/admin-Subjects.php?Subid=<?php echo $res['id'] ?>"> Delete </a>
                   </td>
               </tr>
           <?php } ?>
           <form action="admin-Subjects.php" method="POST">
            <tr>
                <td>
                    <input type="submit" name="AddNewSubject" value="ADD">
                </td>
            
                <td> 
                    <input type="text" name="AddNewSubjectName">
                </td>
                <td>

                    <select name="AddNewSubjectLevel" id="AddNewSubjectLevel">
                         <option value="">Select Subject</option>
                        <?php foreach($view_levels_res as $res){ ?>
                        <option value="<?php echo $res['id']; ?>"> <?php echo GetUniversityName($res['id'],'levels','name'); ?></option>
                         <?php } ?>
                    </select>
                </td>
                <td>
                    <select name="AddNewSubjectDepartment" id="AddNewSubjectDepartment">
                        
                    </select>
                </td>
                <td>
                    <select name="AddNewSubjectDoctor">
                      <option>Select Doctor</option>
                        <?php foreach($view_proffessors_res as $res){ ?>
                        <option value="<?php echo $res['id'] ?>"><?php echo $res['name']; ?></option>
                         <?php } ?>
                    </select>
                </td>
                <td>
                    <input type="" name="AddNewSubjectHours">
                </td>
                
            </tr>
        <form action="admin-Subjects.php" method="POST"> 
            <tr>

                <td>
                   <select name="EditSubId">
                      <option>Select Subject</option>
                      <?php foreach($view_subjects_res as $res){  ?>
                         <option value="<?php echo $res['id'] ?>"><?php echo GetUniversityName($res['id'],'subjects','name'); ?></option>
                     <?php } ?>
                   </select> 
                   
                </td>

                <td>
                    <input type="text" name="EditSubName">
                </td>
                <td>
                  <select name="EditSubLevel" id="ModNewSubjectLevel">
                     <option>Select Subject</option>
                        <?php foreach($view_levels_res as $res){ ?>
                        <option value="<?php echo $res['id']; ?>"> <?php echo GetUniversityName($res['id'],'levels','name'); ?></option>
                         <?php } ?>
                  </select>
                </td>
                <td>
                  <select name="EditSubDep" id="ModNewSubjectDepartment">
                        <option></option>
                    </select>
                </td>
                <td>
                  <select name="EditSubDoc">
                    <option>Select Doctor</option>
                        <?php foreach($view_proffessors_res as $res){ ?>
                        <option value="<?php echo $res['id'] ?>"><?php echo $res['name']; ?></option>
                         <?php } ?>
                    </select>
                </td>

                <td>
                  <input type="text" name="EditSubHours">
                </td>
                <td>
                    <input type="submit" name="EditSubDet" value="Modify">
                </td>
            </tr>
        </form>
           </table>
        </center>



    </div>

<?php include ('../../php/header.php'); ?>

<script>
    $(document).ready(function(){
        $('#AddNewSubjectLevel').change(function(){
            var AddNewSubjectLevel = $(this).val();
            $.ajax({
                url:"fetch/admin-lvl-fetch-dep.php",
                method:"POST",
                data:{AddNew:AddNewSubjectLevel},
                dataType:"text",
                success:function(data){
                    $('#AddNewSubjectDepartment').html(data);
                }
            });
        });
    });

     $(document).ready(function(){
        $('#ModNewSubjectLevel').change(function(){
            var ModNewSubjectLevel = $(this).val();
            $.ajax({
                url:"fetch/admin-lvl-fetch-dep1.php",
                method:"POST",
                data:{ModNew:ModNewSubjectLevel},
                dataType:"text",
                success:function(data){
                    $('#ModNewSubjectDepartment').html(data);
                }
            });
        });
    });


</script>