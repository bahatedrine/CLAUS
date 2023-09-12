<?php
include 'session.php';
include 'dbconn.php';

$sql = "SELECT COUNT(*) as count FROM useLog";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalClients = $row['count'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="staff.css">
    <title>Staff Page</title>
</head>

<body>
    <nav class="top-nav">
        <div class="logo">
            <h1> <img class="dash" src="icon/speedometer.png">Staff Dashboard</h1>
        </div>
        <ul class="menu">
            <li><a href="#">Dashboard</a></li>
            <li><a href="client.php">Clients</a></li>
            <li><a href="help.php">Help</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="index.php"><img class="icon" src="icon/home.png">Home</a></li><hr>
                <li><a href="client.php"><img class="icon" src="icon/customers.png">Clients</a></li><hr>
                <li><a href="help.php"><img class="icon" src="icon/help.png">Help</a></li> <hr>
                <li><a href="logout.php"><img class="icon" src="icon/logout.png">Logout</a></li>
            </ul>
            <hr>

            <h1 class="active"> <span class="total"><?php echo $totalClients; ?> </span> Active Clients</h1>
        </aside>
        <main class="content">
            <h2 class="input-heading"> <img src="icon/edit (1).png " width="50px">Client Record</h2><br>
            <form class="staff-form form-transition" action="func.php" method="post">
                <h3 class="form-heading">Enter Laboratory Usage Information</h3>
                <div class="form-group">
                    <label for="clientId">Client Id</label>
                    <input type="text" name="clientId" id="clientId" class="text-input" placeholder=" eg..user_001" required="">
                </div>
                <div class="form-group">
                    <label for="clientName">Client Name</label>
                    <input type="text" name="clientName" id="clientName" class="text-input" required>
                </div>
                <div class="form-group">
                    <label for="time">Time of Entry</label>
                    <input type="text" name="time" id="time" class="text-input" required>
                </div>
                <div class="form-group">
                    <label for="purpose">Purpose of Usage</label>
                    <input type="text" name="purpose" id="purpose" class="text-input" required>
                </div>
                <div class="form-group">
                    <label for="duration">Duration of Usage</label>
                    <input type="text" name="duration" id="duration" class="text-input" required>
                </div>
                <div class="form-actions">
                    <input type="submit" name="addLog" value="Enter" class="submit-button">
                    <input id="button2" onclick="window.location.replace('index.php')" type="button" value="Cancel" name="addLog" class="cancel-button">
                </div>
            </form>
        </main>
    </div>

    <script>
        // Javascript to transition
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('.staff-form');
            form.classList.add('show');
        });

    </script>


</body>

</html>
