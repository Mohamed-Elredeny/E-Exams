<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-quires.php'); ?>
<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-functions.php'); ?>



<link rel='stylesheet' type='text/css' href='http://localhost/E%20Exams%20Project/style/css/admin/admin-main-page.css'>

<link rel='stylesheet' type='text/css' href='../../STYLE/css/admin/admin-studnet.css'>


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
    <form action="admin-doctors.php" method="POST">
        <center>
            <!-- Select Information to know students uni , fac , levl and dep -->
            <?php if(!isset($_POST['SelcetDocs']) and !isset($_GET['Status'])){ ?>
                <table border="2">
                    <tr>
                        <th>
                            University Name
                        </th>
                        <th>
                            Facility Name
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

                    </tr>
                    <tr>
                        <td colspan="4">
                            <center>
                                <input type="submit" name="SelcetDocs" value="View Doctors Lists">

                            </center>
                        </td>
                    </tr>
                </table>
            <?php } ?>

            <!-- after knowing your target fetch each kind of students -->
            <?php  if(isset($_POST['SelcetDocs']) and !isset($_GET['Status']) ){ ?>
                <table border="2px">
                    <tr>


                        <th>Doctors</th>
                        <th>Pending Doctors</th>
                        <th>Rejected Doctors</th>
                    </tr>
                    <tr>
                        <td>

                            <a href="http://localhost/E%20Exams%20Project/project/admin/admin-doctors.php?Status=1"> View</a>

                        </td>
                        <td>

                            <a href="http://localhost/E%20Exams%20Project/project/admin/admin-doctors.php?Status=3">View</a>

                        </td>
                        <td>

                            <a href="http://localhost/E%20Exams%20Project/project/admin/admin-doctors.php?Status=2">View</a>

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


                        </tr>
                        <tr>
                            <?php
                            session_start();
                            GetDoctorDet($_SESSION["university"] ,$_SESSION["facility"] ,$_SESSION["level"] ,$_SESSION["department"] );
                            ?>


                        </tr>




                    </table>

                <?php } elseif($_GET['Status'] == '2'){ ?>
                    <?php
                    session_start();
                    $x = GetPendDocsData($_SESSION["university"] ,$_SESSION["facility"] ,'2');
                    foreach($x as $r){ ?>
                        <div class="pend-std">
                            <h3> <?php echo $r['name'] ?></h3>
                            <input type="submit" name="acceptDoc" value="Accept">
                            <input type="submit" name="del_doc" value="Delete">
                            <input type="hidden" name="pend" value="<?php echo $r['id'] ?>">
                            <br>
                            <a href="http://localhost/E%20Exams%20Project/project/admin/admin-students.php?Status=3?id=<?php echo $r['id'] ?>">Details</a>
                        </div>



                    <?php } ?>

                <?php } elseif($_GET['Status'] == '3'){ ?>
                    <?php
                    session_start();
                    $x = GetPendDocsData($_SESSION["university"] ,$_SESSION["facility"] ,'3');
                    foreach($x as $r){ ?>
                        <div class="pend-std">
                            <h3> <?php echo $r['name'] ?></h3>
                            <input type="submit" name="acceptDoc" value="Accept">
                            <input type="submit" name="rejectDoc" value="Reject">
                            <input type="hidden" name="pend" value="<?php echo $r['id'] ?>">
                            <br>
                            <a href="http://localhost/E%20Exams%20Project/project/admin/admin-students.php?Status=3?id=<?php echo $r['id'] ?>">Details</a>
                        </div>



                    <?php } ?>
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

