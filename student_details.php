<?php
session_start();

// Check if the user is not authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect the user to the login page or display an access denied message
    header("Location: admin.php");
    exit();
}?>
<?php
include 'database_config.php';
if(isset($_POST['submit']))
{
$rfid=strtoupper($_POST['r1']);
$reg_num=strtoupper($_POST['r2']);
$name=strtoupper($_POST['r3']);
$branch=strtoupper($_POST['r4']);
$phone_no=($_POST['r5']);


$sql="INSERT INTO student(rfid,reg_num,student_name,branch,phone_no)
VALUES('$rfid','$reg_num','$name','$branch','$phone_no')";
$result =$conn->query($sql);

if($result===true)
{

$alert="<script>alert('SUCCESFULLY ADDED...!!');</script>";
echo $alert;
header("Location: register.html");

}
else
{
    $alert='<script type="text/javascript">alert(" REGISTRATION FAILED    \n        SORRY...Something went wrong..!      \n        Please Try Again...! ");</script>';
echo $alert;
header("Location: register.html");

}

}
else{
    $alert='<script type="text/javascript">alert("      SORRY...Something went wrong..!      \n        Please Try Again...! ");</script>';
echo $alert;
header("Location: register.html");
}


mysqli_close($conn);
?>