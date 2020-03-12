        <?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-quires.php'); ?>  
<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-functions.php'); ?> 

    <link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/admin/admin-main-page.css">
<form action="admin-Chapters.php" method="POST">
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
       <h2>Cahpters</h2>
       <table border="2">
           <tr>
               <td>Chapter ID</td>
                <td>Chapter Name</td>
                <td>Subject</td>
                <td>Department</td>
                <td>Level</td>
                <td>Facility</td>
                <td>University</td>

           </tr>
            <?php foreach($view_chapters_res as $re){ ?>
           <tr>
               <td>
                <?php echo $re['id'] ?>
               </td>
               <td><?php echo $re['name'] ?></td>
               <td><?php echo GetUniversityName($re['subject_id'],'subjects','name'); ?></td>
               <td><?php echo GetUniversityName(GetUniversityName($re['subject_id'],'subjects','department'),'departments','name'); ?></td>
               <td><?php echo GetUniversityName(GetUniversityName(GetUniversityName($re['subject_id'],'subjects','department'),'departments','level'),'levels','name');  ?></td>
               <td>
                   <?php echo GetUniversityName(GetUniversityName(GetUniversityName(GetUniversityName($re['subject_id'],'subjects','department'),'departments','level'),'levels','facility'),'faculties','name');  ?>
               </td>
                <td>
                   <?php echo GetUniversityName(GetUniversityName(GetUniversityName(GetUniversityName(GetUniversityName($re['subject_id'],'subjects','department'),'departments','level'),'levels','facility'),'faculties','university'),'universities','name');  ?>
               </td>
           </tr>
            <?php } ?>
            <tr>
                <td>
                    <select name="mod-ch-id">
                        <option>Select ID</option>
                    <?php foreach($view_chapters_res as $re){ ?>
                        <option value="<?php echo $re['id']; ?>"> <?php echo GetUniversityName($re['id'],'chapters','name'); ?></option>
                    <?php } ?>
                    </select>
                </td>
                <td>
                    <input type="text" name="mod-ch-name">
                </td>
                <td>
                   <select name="mod-ch-sub">
                    <option>Select Subject</option>
                    <?php foreach($view_subjects_res as $res){ ?>
                       <option value="<?php echo $res['id'] ?>"><?php echo GetUniversityName($res['id'],'subjects','name') ?></option>
                   <?php } ?>
                   </select>
                </td>
                
                <td colspan="4">
                    <input type="submit" name="mod-ch" value="Mod">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" name="add-ch-name">
                </td>
                <td>
                   <select name="add-ch-sub">
                    <option>Select Subject</option>
                    <?php foreach($view_subjects_res as $res){ ?>
                       <option value="<?php echo $res['id'] ?>"><?php echo GetUniversityName($res['id'],'subjects','name') ?></option>
                   <?php } ?>
                   </select>
                </td>
                <td colspan="4">
                    <input type="submit" name="add-ch" value="Add">
                </td>
            </tr>
       </table>
        

    </div>
</form>


































<?php include ('../../php/header.php'); ?>

