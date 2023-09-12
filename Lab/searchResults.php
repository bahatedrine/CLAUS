<?php
include 'session.php';
include 'dbconn.php';

$sql = "SELECT * FROM useLog WHERE purpose LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $search);
$search = '%' . $_POST['search'] . '%';
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" type="text/css" href="edit.css">
    <title>Manager Search</title>
</head>

<body>
<nav class="top-nav">
            <div class="logo">
                <h1> <img class="dash" src="icon/speedometer.png">Manager Dashboard</h1>
            </div>
            <ul class="menu">
                <li><a href="index.php">Staff Dashboard</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="main">
            <div class="sidebar">
                <a href="managerPage.php"> <img class="icon" src="icon/home.png">Home</a>
                <hr>
                <a href="client.php"><img class="icon" src="icon/customers.png">Clients</a>
                <hr>
                <a href="help.php"><img class="icon" src="icon/help.png">Help?</a>
                <hr>
                <a href="logout.php"><img class="icon" src="icon/logout.png">Logout</a>
                <hr>
            </div>
    

    <table class="staffTable">
        <caption>
          <h2 class="input-heading">Search Client Data By Purpose</h2>
                <form class="search-form" action="searchResults.php" method="post">
                    <input class="input-box" name="search" placeholder="Enter purpose of use" required>
                    <button type="submit" class="search-button">Search <img src="icon/search.png" width="15px"></button>
                </form>
        </caption>
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
            <?php while ($list = $result->fetch_assoc()) { ?>
                <tr>
                    <td>
                        <?php echo $list['clientId']; ?>
                    </td>
                    <td>
                        <?php echo $list['clientName']; ?>
                    </td>
                    <td>
                        <?php echo $list['time']; ?>
                    </td>
                    <td>
                        <?php echo $list['purpose']; ?>
                    </td>
                    <td>
                        <?php echo $list['duration']; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
