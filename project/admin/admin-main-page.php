    <link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/admin/admin-main-page.css">
    <?php 
include ('C:\xampp1\htdocs\E Exams Project\project\admin\main\admin-functions.php');    
 ?>
<form>
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
      <table border="2px">
        <tr>
          <td>
              Number Of
          </td>
          <td>
              Number
          </td>
          <td>
              Details
          </td>
        </tr>
        
        <tr>
          <td>
            <?php ViewTablesNames(); ?>
          </td>
          <td>
            <?php SelectAllDataFromAnyTable('amins'); ?>
          </td>
          <td>
            moka
          </td>  
        </tr>
      </table>
    </div>
</form>


































<?php include ('../../php/header.php'); ?>

