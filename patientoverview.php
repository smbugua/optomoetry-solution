<?php
$idno=$_POST['idno'];
$phone=$_POST['tel'];
$p=mysql_fetch_array(mysql_query("SELECT * FROM patients where idno='$idno' or tel='$tel'"));
$exams=
?>

 <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Patient Details</a> </div>
    <h1>Patient Details</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Patient Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Town/City</th>
                  <th>Email</th>
                  <th>Tel</th>
                  <th>National ID</th>
                  <th>DOB</th>
                  <th>Dateadded</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $no=0;
              while($row=mysql_fetch_array($result)){?>
                <tr class="gradeX">
                <?php
                $no++;
                ?>
                  <td><?php echo $no?></td>
                  <td><?php echo $row['name']?></td>
                  <td><?php echo $row['town']?></td>
                  <td><?php echo $row['email']?></td>
                  <td><?php echo $row['tel']?></td>
                  <td><?php echo $row['idno']?></td>
                  <td><?php echo $row['dob']?></td>
                  <td><?php echo $row['datecreated']?></td>                  
                  <td><a href="editpatient.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-xs"><i class="icon icon-edit"></i> Edit</a> </td>
                  <td><a href="actionclass.php?action=delete_patient&&id=<?php echo $row['id']?>" class="btn btn-danger btn-xs"><i class="icon icon-trash"></i> Delete</a> </td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('footer.php');?>
</div>
<!--Footer-part-->
<!--end-Footer-part-->

</body>
</html>
