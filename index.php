<?php
    $conn = mysqli_connect("localhost", "root", "", "tekrar");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $bday = $_POST['bday'];
        $stipend = $_POST['stipend'];

        $sql = "INSERT INTO `student`(`name`, `surname`, `stipend`, `bday`) VALUES ('$name','$surname','$stipend','$bday')";

        $conn->query($sql);

        header("Location: index.php");
        exit();
    }

    $sql = "Select * from student";
    $result = $conn->query($sql);
    $students = array();
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $students[] = $row;
        }
    }
    $students = array_reverse($students);

    $conn->close();
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
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Birthday</th>
            <th>Stipend</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php 
            foreach($students as $student): ?>
            <tr>
                <td><?=$student['id'] ?></td>
                <td><?=$student['name'] ?></td>
                <td><?=$student['surname'] ?></td>
                <td><?=Date("d/m/Y",strtotime($student['bday'])) ?></td>
                <td><?=$student['stipend'] ?></td>
                <td>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?=$student['id'] ?>">
                        <input type="submit" value="delete">
                    </form>
                </td>
                <td>
                    <a href="update.php?id=<?=$student['id'] ?>">update</a>
                </td>
            </tr>
        <?php endforeach
        ?>
    </table>


    <form action="" method="post">
        <input type="text" name="name" placeholder="name" required><br>
        <input type="text" name="surname" placeholder="surname" required><br>
        <input type="date" name="bday" required><br>
        <input type="text" name="stipend" placeholder="stipend" required><br>
        <input type="submit" value="add data">
    </form>
</body>
</html>