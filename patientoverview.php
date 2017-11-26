<?php
include('header.php');
$idno=$_POST['idno'];
$phone=$_POST['tel'];
$p=mysql_fetch_array(mysql_query("SELECT * FROM patients where idno='$idno' or tel='$phone'"));
$id=$p['id'];
$exams=mysql_query("SELECT * FROM patient_exams where patientid='$id'");
$lens=mysql_query("SELECT * FROM contactlens where patientid='$id'");
?>

 <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Patient Overview </a> <a href="#" class="current"><?php echo $p['name']?></a> </div>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

<div class="widget-box">
           <h4>	Examinitions</h4>
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Patient Examinitions</h5>

            <a href="addexam.php" class="btn btn-success btn-xs"><i class="icon icon-book ">Add Examinition Record</i></a>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Eye</th>
                  <th>Subjective RX</th>
                  <th>Prescription</th>
                  <th>Notes</th>
                  <th>Dateadded</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $no=0;
              while($row=mysql_fetch_array($exams)){?>
                <tr class="gradeX">
                <?php
                $no++;
                ?>
                  <td><?php echo $no?></td>
                  <td><?php echo $row['aye']?></td>
                  <td><?php echo $row['subjectiverx']?></td>
                  <td><?php echo $row['prescription']?></td>
                  <td><?php echo $row['notes']?></td>
                  <td><?php echo $row['datecreated']?></td>                  
                  <td><a href="editexam.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-mini"><i class="icon icon-edit"></i> Edit</a> </td>
                  <td><a href="actionclass.php?action=delete_exam&&id=<?php echo $row['id']?>" class="btn btn-danger btn-mini"><i class="icon icon-trash"></i> Delete</a> </td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>


      <div class="widget-box">
           <h4>Contact Lens</h4>
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Patient Conact Lens</h5>

            <a href="addcotactlens.php" class="btn btn-success btn-xs"><i class="icon icon-book ">Add Contact Lens Record</i></a>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Eye</th>
                  <th>Subjective RX</th>
                  <th>Prescription</th>
                  <th>Notes</th>
                  <th>Dateadded</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $no=0;
              while($row=mysql_fetch_array($lens)){?>
                <tr class="gradeX">
                <?php
                $no++;
                ?>
                  <td><?php echo $no?></td>
                  <td><?php echo $row['aye']?></td>
                  <td><?php echo $row['subjectiverx']?></td>
                  <td><?php echo $row['prescription']?></td>
                  <td><?php echo $row['notes']?></td>
                  <td><?php echo $row['datecreated']?></td>                  
                  <td><a href="editexam.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-mini"><i class="icon icon-edit"></i> Edit</a> </td>
                  <td><a href="actionclass.php?action=delete_exam&&id=<?php echo $row['id']?>" class="btn btn-danger btn-mini"><i class="icon icon-trash"></i> Delete</a> </td>
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
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script>