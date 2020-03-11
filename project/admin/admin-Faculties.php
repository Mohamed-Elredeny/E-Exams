<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-quires.php'); ?>  
<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-functions.php'); ?> 

    <link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/admin/admin-main-page.css">
<form action="admin-Faculties.php" method="POST">
    <div class="main-admin-div-left">
        <div class="deps"><a href>Exams</a></div>
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
        <!--
       <h2 style="display: inline-block;">Select The University  </h2>
       <select>
           <option>fci</option>
       </select>
        <br>
        <input type="button" name="" value="Students">
        <input type="button" name="" value="Doctors">
        <input type="button" name="" value="Floors">
        <input type="button" name="" value="Offices">
        <input type="button" name="" value="View Faculties">
    -->

    <center>
        <h2>Faculities</h2>
    <table border="2px">
        <tr>
            <td>
                Faculty ID
            </td>
            <td>
                Faculty Name
            </td>
            <td>
                University
            </td>
            <td>
                Delete
            </td>
        </tr>
        <?php foreach($view_faculties_res as $vss){ ?>
        <tr>
            <td>
               <?php echo $vss['id']; ?> 
            </td>
            <td>
                <?php echo $vss['name']; ?>
            </td>
            <td>
                <?php echo  GetUniversityName($vss['university'],'universities','name');  ?>
            </td>
            <td>
                <a href="http://localhost/E%20Exams%20Project/project/admin/admin-Faculties.php?facid=<?php echo $vss['id'] ?>">Delete</a>
            </td>

        </tr>
    <?php } ?>
    <tr>

        <td colspan="2">
           <input type="text" name="AddFacName"> 
        </td>
        <td>
            <select name="AddFacUni">
                <?php foreach($view_universities_res as $vres){ ?>
                <option value="<?php  echo $vres['id'] ?>"> <?php  echo GetUniversityName($vres['id'],'universities','name'); ?></option>
            <?php } ?>
            </select>
        </td>
        <td>
            <input type="submit" name="AddFac" value="ADD">
        </td>
    </tr>
    <tr>
            <td>
                <select name="IdFacForEdit">
                        <option>Faculty ID</option>
                         <?php foreach($view_faculties_res as $vres){ ?>
                            <option value="<?php echo $vres['id'] ?>"><?php echo $vres['id'] ?></option>
                        <?php } ?>
                </select>
                
            </td>
            <td>
               <input type="" name="NameFacForEdit"> 
            </td>
            <td>
                <select name="UniFacForEdit">
                    <?php foreach($view_universities_res as $vres){ ?>
                    <option value="<?php  echo $vres['id'] ?>"> <?php echo GetUniversityName($vres['id'],'universities','name'); ?></option>
                <?php } ?>
                </select>
            </td>
            <td>
                <input type="submit" name="EditFac" value="Modify">
            </td>
    </tr>

    </table>
    </center>
    

    </div>
</form>


































<?php include ('../../php/header.php'); ?>

