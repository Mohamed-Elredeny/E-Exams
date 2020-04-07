    <?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-quires.php'); ?>  
<?php include('C:\xampp1\htdocs\E Exams Project\php\admin\admin-functions.php'); ?> 

    <link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/admin/admin-main-page.css">
<form action="admin-Departments.php" method="POST">
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
       <h2>Departments</h2>
      <table border="2">
          <tr>
              <td>Department ID</td>
              <td>Department Name</td>
              <td> Level</td>
              <td>Level Facility</td>
              <td>Delete</td>
          </tr>
          <?php foreach($view_departments_res as $res){ ?>
          <tr>
              <td><?php echo $res['id']; ?></td>
              <td><?php echo $res['name']; ?></td>
              <td><?php echo GetUniversityName($res['level'],'levels','name'); ?></td>
              <td><?php echo GetUniversityName(GetUniversityName($res['level'],'levels','facility'),'faculties','name'); ?></td>
              <td><a href="http://localhost/E%20Exams%20Project/project/admin/
                admin-Departments.php?dep_id=<?php echo $res['id'] ?>">Delete</a></td>

          </tr>
          <?php } ?>
          <tr>
              <td>
                  <select name="mod-dep-id">
                    <option>Select Department</option>
                      <?php foreach($view_departments_res as $res){ ?>
                      <option value="<?php echo $res['id'] ?>"><?php echo GetUniversityName($res['id'],'departments','name'); ?></option>
                  <?php } ?>
                  </select>
              </td>
              <td>
                 <input type="text" name="mod-dep-name"> 
              </td>
              <td>
                  <select name="mod-dep-level">
                    <option>Select Level</option>
                      <?php foreach($view_levels_res as $res){ ?>
                      <option value="<?php echo $res['id'] ?>"><?php echo GetUniversityName($res['id'],'levels','name'); ?></option>
                      <?php } ?>
                  </select>
              </td>
              <td>
                  <input type="submit" name="mod-dep" value="Modify">
              </td>
          </tr>
          <tr>
              <td colspan="2">
                  <input type="text" name="add-dep-name">
              </td>
              <td>
                   <select name="add-dep-lvl">
                    <option>Select Level</option>
                      <?php foreach($view_levels_res as $res){ ?>
                      <option value="<?php echo $res['id'] ?>"><?php echo GetUniversityName($res['id'],'levels','name'); ?></option>
                      <?php } ?>
                  </select>
              </td>
              <td>
                  <input type="submit" name="add-to-dep" value="Add">
              </td>
          </tr>
      </table>  

    </div>
</form>


































<?php include ('../../php/header.php'); ?>

