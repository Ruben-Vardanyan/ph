<?php
$conn = mysqli_connect("localhost", "root", "", "tekrar");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])){
    $sql = "select * from student where id = {$_GET['id']}";
    if($result = $conn->query($sql)){
        $student = $result->fetch_assoc();
    } 
}
else{
    header("Location: index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $bday = $_POST['bday'];
    $stipend = $_POST['stipend'];

    $sql = "UPDATE `student` SET `name`='$name',`surname`='$surname',`stipend`=$stipend,`bday`='$bday' WHERE id = $id";

    $conn->query($sql);

    header("Location: index.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th, td, tr, table{
            border: 1px solid #000;
            border-collapse: collapse;
        }
        th, td{
            padding: 15px
        }
        table{
            margin-bottom: 50px;
        }
    </style>
</head>
<body>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$student['id'] ?>">
        <input type="text" name="name" placeholder="name" value="<?=$student['name'] ?>" required><br>
        <input type="text" name="surname" placeholder="surname" value="<?=$student['surname'] ?>" required><br>
        <input type="date" name="bday" value="<?=$student['bday'] ?>" required ><br>
        <input type="text" name="stipend" placeholder="stipend" value="<?=$student['stipend'] ?>" required><br>
        <input type="submit" value="update">
    </form>
</body>
</html>
