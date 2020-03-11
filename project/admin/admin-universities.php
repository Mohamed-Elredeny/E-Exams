<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-quires.php'); ?>  
<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-functions.php'); ?>    

    <link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/admin/admin-main-page.css">


<form action="admin-universities.php" method="POST">
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
       <center><h3>Universties</h3></center>
       <center>
        <form action="admin-universities.php" method="POST">
        <table border="2px" style="text-align: center;">
            <tr>
                <td>University ID</td>
                <td>University Name</td>
                <td>Delete</td>
            </tr>
            <?php  foreach($view_universities_res as $res){ ?>
            <tr>
                <td>
                    <?php echo $res['id']; ?>
                </td>
                <td>
                    <?php echo $res['name']; ?>
                </td>
                <td>
                   
                    <a href="admin-universities.php?id=<?php echo $res['id'] ?>">
                        delete
                    </a>
                </td>
            </tr>
             <?php } ?>
            <tr>
                <td>
                    <select name="UniId">
                        <option>Select ID</option>
                        <?php foreach($view_universities_res as $res){ ?>
                        <option value=" <?php echo $res['id']; ?>">
                             <?php echo $res['id']; ?>
                        </option>
                    <?php } ?>
                    </select>
                </td>
                <td colspan="2">
                    <input type="text" name="changeUniName">
                </td>
             
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="modifyUni" value="Modify">
                    <input type="submit" name="addUni" value="Add">

                </td>
              
            </tr>
          
           
        </table>
    </form>
    </center>

    </div>
</form>































<?php include ('../../php/header.php'); ?>

