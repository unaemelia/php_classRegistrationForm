<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $percent = $_POST['percent'];
    if ($percent >= 70) {
        echo "Grade: distinction";
    } elseif ($percent >= 60) {
        echo "Grade: average";
    } elseif ($percent >= 50) {
        echo "Grade: pass";
    } else {
        echo "Grade: fail";
    }
    ?>
</body>

</html>