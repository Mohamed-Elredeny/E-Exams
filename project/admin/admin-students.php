<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-quires.php'); ?>  
<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-functions.php'); ?> 




    <link rel='stylesheet' type='text/css' href='http://localhost/E%20Exams%20Project/style/css/admin/admin-main-page.css'>

    <link rel='stylesheet' type='text/css' href='http://localhost/E%20Exams%20Project/style/css/admin/admin-studnet.css'>


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
       <form action="admin-students.php" method="POST">
        <center>
<!-- Select Information to know students uni , fac , levl and dep -->
<?php if(!isset($_POST['SelcetStds']) and !isset($_GET['Status'])){ ?>
        <table border="2">
            <tr>
                <th>
                    University Name
                </th>
                <th>
                    Facility Name
                </th>
                <th>
                    Select Level
                </th>
                <th>
                    Select Department
                </th>

            </tr>
            <tr>
                <td>
                    <select name="SelStdUni" id="SelStdUni">
                       <option>Select University</option>
                       <?php foreach($view_universities_res as $res){ ?>
                        <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?>
                        </option>
                       <?php } ?>
                     </select>
                </td>
                <td>
                  
                    <select name="SelStdFc" id="SelStdFac">
                       
                     </select>  
                </td>
                <td>
                   <select name="SelStdLevel" id="SelStdLevel">
               
                    </select> 
                </td>
                <td>
                    <select name="SelStdDep" id="SelStdDep">
              
                     </select>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <center>
                      <input type="submit" name="SelcetStds" value="View Students Lists">
                    </center>
                </td>
            </tr>
        </table>
<?php } ?>
         
<!-- after knowing your target fetch each kind of students -->
<?php if(isset($_POST['SelcetStds']) and !isset($_GET['Status']) ){ ?>
        <table border="2px">
            <tr>
                
               
                <th>Students</th>
                <th>Pending Students</th>
                <th>Rejected Students</th>
            </tr>
            <tr>
                <td>
                    
                        <a href="http://localhost/E%20Exams%20Project/project/admin/admin-students.php?Status=1">View</a>
                    
                </td>
                <td>
                   
                        <a href="http://localhost/E%20Exams%20Project/project/admin/admin-students.php?Status=3">View</a>        
                    
                </td>
                <td>
                   
                        <a href="http://localhost/E%20Exams%20Project/project/admin/admin-students.php?Status=2">View</a>
                   
                </td>
            </tr>
        </table>
<?php } ?>

<?php if(isset($_GET['Status'])) { ?>
    <?php if($_GET['Status'] == '1'){ ?>
        <table border="2px">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>University</th>
                <th>Facility</th>
                <th>Level</th>
                <th>Department</th>
             
            </tr>
            <?php foreach($view_real_students_res as $res){  ?>
            <tr>
                <td><?php echo $res['id'] ?></td>
                <td><?php echo $res['name'] ?></td>
                <td><?php echo $res['email'] ?></td>
                <td><?php echo $res['password'] ?></td>
                <td><?php echo GetUniversityName( $res['university'],'universities','name' ) ?></td>
                <td><?php echo GetUniversityName( $res['facility'],'faculties','name' )  ?></td>
                <td><?php echo GetUniversityName( $res['level'],'levels','name' )  ?></td>
                <td><?php echo GetUniversityName( $res['department'],'departments','name' )  ?></td>
            </tr>
            <?php } ?>
        </table>
    <?php } elseif($_GET['Status'] == '2'){ ?>
      <h1>2</h1> 
    <?php } elseif($_GET['Status'] == '3'){ ?>
       <h1>3</h1>

    <?php }  ?>
    <?php } ?>


           
        </center>
       </form>
        

    </div>








<?php include ('../../php/header.php'); ?>
<script>
    $(document).ready(function(){
        $('#SelStdUni').change(function(){
            var uniId = $(this).val();
            $.ajax({
                url:"fetch/admin-select-uni-for-std.php",
                method:"POST",
                data:{UniId:uniId},
                dataType:"text",
                success:function(data){
                    $('#SelStdFac').html(data);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#SelStdFac').change(function(){
            var facId = $(this).val();
            $.ajax({
                url:"fetch/admin-select-fac-for-std.php",
                method:"POST",
                data:{FacId:facId},
                dataType:"text",
                success:function(data){
                    $('#SelStdLevel').html(data);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#SelStdLevel').change(function(){
            var lvlId = $(this).val();
            $.ajax({
                url:"fetch/admin-select-lvl-for-std.php",
                method:"POST",
                data:{LvlId:lvlId},
                dataType:"text",
                success:function(data){
                    $('#SelStdDep').html(data);
                }
            });
        });
    });

    
</script>

