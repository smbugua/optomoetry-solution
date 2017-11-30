<?php
include('header.php');
if ($_GET['action']=="addinvoice") {
$patientid=$_POST['patientid'];
$dateadded=$_POST['dateadded'];
$invoicenumber=$_POST['invoiceno'];
mysql_query("INSERT INTO invoices(patientid,dateadded,invoicenumber)VALUES('$patientid','$dateadded','$invoicenumber')");
$last_id = mysql_insert_id();
echo "<script>location.replace('billing.php?id=$last_id')</script>";
}
?>