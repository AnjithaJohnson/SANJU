<?php
$lid=$_GET["na"];
$conn=mysqli_connect("cvktne7b4wbj4ks1.chr7pe7iynqr.eu-west-1.rds.amazonaws.com", "ji76idbl7xrpwijd", "ktsq582xb1j7ssmu","jlrcv5u4hn6l67a6");
$sql="select phone_no from donor_register where l_id='$lid'";
$result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0)
      {
          while($data=mysqli_fetch_array($result))
          {
            $to=$data["phone_no"];
          }
      }
require('../textlocal.class.php');

$textlocal = new Textlocal(false,false, 'BIQUMilYdl4-cHeNgYIE03vFTPrTEqm1QPNFGTJMh5');

$numbers = array(353899689944);
$sender = 'LifeStream';
$message = 'HardCoded Msg';
try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    ?>
		<script>
			alert("You have successfully Accepted request.");
			window.location.href="notification.php";
		</script>
    <?php
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>
<script>
alert("");
window.location="admin_donor_info.php";
</script>
