<?php
include('header.php');
if ($_GET['action']=="addinvoice") {
$patientid=$_POST['patientid'];
$dateadded=$_POST['dateadded'];
$invoicenumber=$_POST['invoiceno'];
mysql_query("INSERT INTO invoices(patientid,dateadded,invoicenumber)VALUES('$patientid','$dateadded','$invoicenumber')");
$last_id = mysql_insert_id();
echo "<script>location.replace('billing.php?id=$last_id')</script>";
}elseif ($_GET['action']=="addinvoiceitem") {
$id=$_REQUEST['invoiceid'];
$productid=$_POST['product'];
$quantity=$_POST['quantity'];
$prices=mysql_fetch_array(mysql_query("SELECT sp.price as price from stockprice sp inner join products p on p.id=sp.productid order by sp.dateadded desc limit 1 "));
//get pricing
$price=$prices['price'];
$total=$price*$quantity;
//get current invoice total
$invoice=mysql_fetch_array(mysql_query("SELECT i.totalcost as total from invoices i where i.id='$id' "));
//new total
$currentinvoicetotal=$invoice['total'];
$newtotl=$currentinvoicetotal+$total;
//insert iinvoice items
mysql_query("INSERT INTO invoiceitems(invoiceid,productid,unitprice,quantity,total)VALUES('$id','$productid','$price','$quantity','$total')");
//update invoice total
mysql_query("UPDATE invoices SET totalcost='$newtotl' where id='$id'");
echo "<script>alert('Product Added!')</script>";
echo "<script>location.replace('billing.php?id=$id')</script>";
}
?>