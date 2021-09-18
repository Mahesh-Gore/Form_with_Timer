
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
    form{
        margin:auto;
        text-align:center;
    }
    </style>
</head>
<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="submit" value="Click Here to fill form">
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
session_start();
$_SESSION['start']=time();
$_SESSION['expire']=$_SESSION['start']+(60*3);
echo "<script>
window.location='timer_form.php';</script>";
}
?>