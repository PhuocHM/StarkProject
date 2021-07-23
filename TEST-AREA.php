<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo '<pre>';
    // print_r($_POST["file2"]);
    // echo '</pre>';
    echo $_POST["file2"];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post">
        <input type="file" name="file2" id="file">
        <input type="submit" value="Submit">
    </form>

</body>

</html>