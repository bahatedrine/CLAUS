<?php
include 'session.php';
include 'dbconn.php';

$sql = "SELECT * FROM useLog";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="client.css">
    <link rel="stylesheet" type="text/css" href="edit.css">
    <title>Clients Details</title>
</head>

<body>

    <nav class="top-nav">
        <div class="logo">
            <h1>All Clients Details</h1>
        </div>
        <ul class="menu">
            <li><a href="client.php">Clients</a></li>
            <li><a href="index.php">Staff Page</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <h3>  <img src="icon/users-alt.png" width="70px">All Client Details</h3>

    <table class="staffTable">
        <thead>
            <tr>
                <th>Client Id</th>
                <th>Client Name</th>
                <th>Time of Entry</th>
                <th>Purpose of Usage</th>
                <th>Duration of Use</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['clientId']; ?></td>
                <td><?php echo $row['clientName']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['duration']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>


    <script>
        // code to slide up
        document.addEventListener('DOMContentLoaded', function() {
            var table = document.querySelector('.staffTable');
            table.classList.add('slide-up');
        });
    </script>

</body>

</html>
