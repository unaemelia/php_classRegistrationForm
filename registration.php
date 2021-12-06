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
    session_start();
    //first create the connection:
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "students";
    $conn = new mysqli($servername, $username, $password, $dbName);
    $student_name = "";
    $class_name = "";
    if($_POST){
        $student_name= $_POST['s_name'];
        $class_name= $_POST['c_name'];
        $sql= "INSERT student(s_name) VALUES('$student_name')";
        if($conn->query($sql)===TRUE){
            $last_id = $conn->insert_id;
            $sql2 ="INSERT std_class (s_id,c_id) VALUES('$last_id','$class_name')";
            if($conn->query($sql2)===TRUE){
                echo "Student Registration Successfully";
            }
        } else {
            echo "Error in inserting class" .$conn->error;
        }
    }

    ?>
    <h2>Student registration</h2>
    <form method="post">
        <input type="text" name="s_name">
        <select name="c_name">
        <?php 
        //select from classes - dropdown
        $sql2 = "SELECT * FROM classes";
        $result2 = $conn->query($sql2);
        $count2 = mysqli_num_rows($result2);
        if($count2 > 0){
            while($row = $result2->fetch_assoc()){
                echo "<option value=".$row['c_id'].">".$row['c_name']."</option>";
            }
        }
        ?>
        </select>
        <input type="submit" name="submit" value="Register student">
    </form>
</body>

</html>