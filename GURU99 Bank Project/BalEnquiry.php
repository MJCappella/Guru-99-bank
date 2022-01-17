<?php
//starting the session for logged in customer
session_start();
include_once 'connection.php';
if (isset($_SESSION['customer'])) {
$customer = $_SESSION['customer'];
}
//get the entered account no. @ $acc_no
$acc_no = $_POST['accountno'];
// retrieve the respective Customer ID who has account no = $acc_no from //‘account’ table
$qc = "select CUSTOMER_ID from account where ACCOUNT_NO='$acc_no'";
$rc = mysql_query($qc);
if (mysql_num_rows($rc)) {
$cid = mysql_result($rc, 0);
if ($customer == $cid) {
$sql = "select * from account where ACCOUNT_NO=$acc_no";
$r = mysql_query($sql);
if (mysql_num_rows($r) == 1) {
while ($row = mysql_fetch_array($r)) {
?>
<html>
<head>
<!--comments: To link to a common cascading style sheets-->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<!--comments: To link to javascript files-->
<script language="JavaScript" src="../scripts/test.js"></script>
<div><h2 class="barone">Guru99 Bank</h2></div>
<title> Guru99 Bank Balance Enquiry Page </title>
</head>
<div><?php include_once('Customer_sidebar.html') ?></div>
<body>
<br><br>
<table border="0" width="70%" align="center" class="layout1">
10
http://www.guru99.com/
<td>
<table align="center" border="1" cellspacing="0" cellpadding="0">
<tr>
<td colspan="2"><p class="heading3" align=center>Balance Details for Account <?php echo $acc_no; ?></p></td>
</tr>
<!--comments: to display account no-->
<tr>
<td>Account No</td>
<td><?php echo $row['ACCOUNT_NO']; ?></td>
</tr>
<!--comments: to display type of account field-->
<tr>
<td>Type of Account</td>
<td><?php echo $row['ACCOUNT_TYPE']; ?></td>
</tr>
<!--comments: to display current balance field-->
<tr>
<td>Balance</td>
<td><?php echo $row['CURRENT_AMOUNT']; ?></td>
</tr>
<tr><td colspan="2"><a href="Customerhomepage.php">Continue</a></td></tr>
</table>
<?php
}
}
} else {
echo "<script type='text/javascript'>alert('You are not authorize to get Balance details of this account!!');
.location.href='BalEnqInput.php'</script>";
}
} else {
echo '<script type="text/javascript">alert("Account does not exist");
.location.href="BalEnqInput.php";</script>';
}
?>
<!--comments: to link to home page-->
<p align="right"><a href="Customerhomepage.php">Home</a></p>
11
http://www.guru99.com/
</td>
</table>
</body>
</html>