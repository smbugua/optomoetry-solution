<?php
include('header.php');
//ADD CLAUSES
//PATINET
if ($_GET['action']=="aadpatient") {
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
}elseif ($_GET['action']=="adpatientmedical") {
	$patientid=$_REQUEST['patientid'];
	$conditionid=$_POST['conditionid'];
	$notes=$_POST['notes'];
	$year=$_POST['year'];
	mysql_query("INSERT INTO medical(patientid,conditionid,notes,year)values('$patientid','$conditionid','$notes','$year')");

	echo "<script>location.replace('patient_medical_conditions.php')</script>";
}elseif ($_GET['action']=="addpatientexam") {
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
}elseif ($_GET['action']=="additemtype") {
	$name=$_POST['name'];
	mysql_query("INSERT INTO itemtype(name)values('$name')");
	echo "<script>location.replace('itemtypes.php')</script>";
}elseif ($_GET['action']=="addproduct") {
	$name=$_POST['name'];
	$brand=$_POST['brand'];
	$item=$_POST['item'];
	mysql_query("INSERT INTO products(productname,brandid,itemtypeid)values('$name','$brand','$item')");
	echo "<script>location.replace('products.php')</script>";

}elseif ($_GET['action']=="addbrand") {	
	$name=$_POST['name'];
	mysql_query("INSERT INTO brand(name)values('$name')");
	echo "<script>location.replace('brands.php')</script>";
}elseif ($_GET['action']=="stockin") {
	//RECORD STOCK MOVE
	$id=$_REQUEST['productid'];
	$stock=$_POST['stock'];
	$cost=$_POST['cost'];
	$price=$_POST['price'];
	$date=$_POST['date'];
	mysql_query("INSERT INTO productstockmoves(productid,stockmove,type)values('$id','$stock','0')");
	//UPDATE CURRENT STOCK
	/*
	1.get current stock total
	2.add new stock
	3.update table records
	*/
	$query="SELECT ps.totalstock as tot,psm.id as id from productstockmoves psm inner join productstock ps on psm.productid=ps.productid where productid='$id' order by psm.daterecorded desc ";
	$row=mysql_fetch_array(mysql_query($query));
	$tot=$row['tot'];
	$psmid=$row['id'];
	$newstock=$stockk+$tot;
	//update new stock levels
	mysql_query("UPDATE productstock set totalstock ='$newstock' where productid='$id'");
	//record new prices in stock price
	mysql_query("INSERT INTO stockprice(productid,stockid,cost,price,dateadded)values('$id','$psmid','$cost','$price','$date')");

	echo "<script>location.replace('productstock.php')</script>";
}elseif ($_GET['action']=="stockout") {
	$id=$_REQUEST['productid'];
	$stock=$_POST['stock'];
	mysql_query("INSERT INTO productstockmoves(productid,stockmove,type)values('$id','$stock','1')");
	echo "<script>location.replace('productstock.php')</script>";
}




