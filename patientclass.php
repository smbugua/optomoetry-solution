<?php
include('header.php');
//ADD CLAUSES
//PATINET
if ($_GET['action']=="addpatient") {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$addr=$_POST['addr'];
	$town=$_POST['town'];
	$idno=$_POST['idno'];
	$sex=$_POST['sex'];
	$notes=$_POST['notes'];
	$dob=$_POST['date'];
	$date=date('Y-m-d');
	mysql_query("INSERT INTO patients(name,address,town,email,tel,idno,sex,dob,notes,datecreated)VALUES('$name','$addr','$town','$email','$tel','$idno','$sex','$dob','$notes','$date')");
	echo "<script>location.replace('patients.php')</script>";
}elseif ($_GET['action']=="addcondition") {
	$name=$_POST['name'];
	mysql_query("INSERT INTO medical_conditions(name)values('$name')");

	echo "<script>location.replace('medical_conditions.php')</script>";
}elseif ($_GET['action']=="addpatientmedical") {
	$patientid=$_REQUEST['patientid'];
	$conditionid=$_POST['conditionid'];
	$notes=$_POST['notes'];
	$year=$_POST['year'];
	mysql_query("INSERT INTO medical(patientid,conditionid,notes,year)values('$patientid','$conditionid','$notes','$year')");

	echo "<script>location.replace('patient_medical_conditions.php')</script>";
}elseif ($_GET[]=="addpatientexam") {
	$date=$_POST['date'];
	$patientid=$_REQUEST['patientid'];
	$staffid=$_POST['staffid'];
	$subjectiverx=$_POST['subjectiverx'];
	$notes=$_POST['notes'];
	$query="INSERT INTO patient_exams(date,patientid,staffid,subjectiverx,notes)VALUES('$date','$patientid','$staffid','$subjectiverx','$notes')";
	mysql_query($query);

	echo "<script>location.replace('patient_examinitions.php')</script>";


}elseif ($_GET['action']=="addcontactlens"){
	$date=$_POST['date'];
	$patientid=$_REQUEST['patientid'];
	$staffid=$_POST['staffid'];
	$presciption=$_POST['prescription'];
	$notes=$_POST['notes'];
}
}