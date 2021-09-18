<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill Form</title>
    <style>
        body {
            text-align: center;
        }

        table {
            margin: auto;
        }

        h5 {
            color: red;
        }
        #cptno {
            text-align: center;
            border: none;
        }
    </style>
    <script>
        function countdown(element, minutes, seconds) {
            var time = minutes * 60 + seconds;
            var interval = setInterval(function() {
                var el = document.getElementById(element);
                if (time == 0) {
                    alert('Your have exceed the given time limit.');
                }
                var minutes = Math.floor(time / 60);
                if (minutes < 10) minutes = "0" + minutes;
                var seconds = time % 60;
                if (seconds < 10) seconds = "0" + seconds;
                var text = minutes + ':' + seconds;
                el.innerText = text;
                time--;
            }, 1000);
        }
        countdown('timer', 3, 0);
    </script>
</head>

<body>
    <h2>Fill the Form</h2>
    <p>
    <h5>Note you have to fill the form within 3 minutes.</h5>
    </p>
    <div>Time Left : <text id="timer"></text></div>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table cellpadding="10px">
            <tr>
                <th>Name : </th>
                <td><input type="text" required></td>
            </tr>
            <tr>
                <th>Email : </th>
                <td><input type="email" required></td>
            </tr>
            <tr>
                <th>Date of Birth : </th>
                <td><input type="date" required></td>
            </tr>
            <tr>
                <th>About Yourself : </th>
                <td><textarea required></textarea></td>
            </tr>
            <tr>
                <th colspan="2">Captcha is : <input type='text' id='cptno' name="cap1" value="<?php $c = rand(1000, 9999);
                                                                                                $n = $c;
                                                                                                echo $c; ?>" readonly></th>
            </tr>
            <tr>
                <th>Enter Captcha : </th>
                <td><input type="text" name="cap2" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Submit Form"></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($_POST['cap1'] != $_POST['cap2']) {
        echo "<script>alert('Captcha not match');</script>";
    } else {
        echo "<script>alert('Thanks For Submitting');
            window.location='page1.php';</script>";
    }
}
?>