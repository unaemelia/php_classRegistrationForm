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
    //first create the connection:
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "web_education";
    $conn = new mysqli($servername, $username, $password, $dbName);

    //Insert data with the code
    $sql = "INSERT student*(s_name) VALUE('Zia')";
    $result = $conn->query($sql);
    $last_id = $conn->$insert_id;
    $sql = "INSERT address (a_name, s_id) VALUE('UK', '$last_id')";

    //then you have to join the 2 tables
    $sql = "SELECT student.s_name, address.a_name FROM student JOIN address ON student.s_name = address.s_id";
    


    $name = "";
    $email = "";
    $checkForm = true;
    $nameErr = "";
    $emailErr = "";
    if ($_POST) {
        $name = $_POST["name"];
        $email = $_POST["email"];
    }
    if ($checkForm) {
        if ($_POST["name"] == "") {
            $checkForm = false;
            $nameErr = "Name is required";
        } else {
            $checkForm = true;
            $name = $_POST["name"];
        }
        if ($_POST["email"] == "") {
            $checkForm = false;
            $emailErr = "Email is required";
        } else {
            $checkForm = true;
            $email = $_POST["email"];
        }
        if ($checkForm == true) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbName = "web_education";
            $conn = new mysqli($servername, $username, $password, $dbName);
            $sql = "INSERT INTO web_users(user_name,user_email) VALUES ('$email','$email')";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id; //to see the last id add this code
                echo "Data Inserted Successfully!<h3> The last insertion id is = <h3>" . $last_id;
            } else {
                echo "Something went wrong!" . $conn->error;
            }
        }
    }
    ?>

    <form method="post">
        <input type="text" name="name">
        <p><?php echo $nameErr ?></p>
        <input type="email" name="email">
        <p><?php echo $emailErr ?></p>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>