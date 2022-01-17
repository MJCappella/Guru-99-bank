<?php
//starting the session for logged in customer
session_start();
include_once 'connection.php';
if (isset($_SESSION['customer'])) {
$cid = $_SESSION['customer'];
}
?>
<html>
<!--comments: balance enquiry page-->
<head>
<!--comments: To link to a common cascading style sheets-->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<!--comments: To link to javascript files-->
<script language="JavaScript" src="../JavaScript/test.js"></script>
<div><h2 class="barone">Guru99 Bank</h2></div>
<title> Guru99 Bank Balance Enquiry Page </title>
</head>
<div><?php include_once('Customer_sidebar.html') ?></div>
<!--comments: balance enquiry body-->
<body onLoad="document.fbal.txtaccno.select();">
<br>
<table border="0" width="70%" align="center" class="layout1">
<form name="fbal" method="post" action="BalEnquiry.php" onsubmit="return validateone();">
<td>
<table align="center">
<tr>
<td colspan="2"><p class="heading3" align=center>Balance Enquiry Form</p></td>
</tr>
<!--comments: to display account number field-->

http://www.guru99.com/
<tr>
<td>Account No</td>
<td><select name="accountno" style="width:150px" onKeyUp="validateaccount();" onBlur="validateaccount();">
<option>Select Account</option>
<?php
$que = "select * from account where CUSTOMER_ID = $cid ";
$result = mysql_query($que);
while ($row = mysql_fetch_array($result)) {
?>
<option><?php echo $row['ACCOUNT_NO']; ?></option>
<?php } ?>
</select><label id="message25"></label></td>
</tr>
<!--comments: to display submit and reset buttons-->
<tr>
<td></td>
<td><input type="submit" name="AccSubmit" value="Submit">
<input type="reset" name="res" value="Reset"></td>
</tr>
</table>
</form>
<!--comments: to link to home page-->
<p align="right"><a href="Customerhomepage.php">Home</a></p>
</td>
</table>
</body>
</html>

