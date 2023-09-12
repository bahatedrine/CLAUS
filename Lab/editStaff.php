<?php 
include 'session.php';
include "dbconn.php";
$staffId = $_GET['staffId'];

function result()
{
    global $staffId;
    global $conn;

    echo $staffId;   
    $sql = "SELECT * FROM staff WHERE staffId=?";
    $result = $conn->prepare($sql);
    $result->bind_param("s", $staffId);
    $result->execute();
    $list = $result->get_result()->fetch_assoc();
?>

<h3 id="editStaff">Edit Staff Information</h3>
<label>Staff Id</label>
<input type="text" class="text" name="staffId" value="<?php echo $list['staffId'] ?>"><br><br>
<br>
<label>First Name</label>
<input type="text" class="text" name="firstName" value="<?php echo $list['firstName'] ?>"><br><br>
<br>
<label>Last Name</label>
<input type="text" class="text" name="lastName" value="<?php echo $list['LastName'] ?>"><br><br>
<br>
<label>Username</label>
<input type="text" class="text" name="username" value="<?php echo $list['username'] ?>"><br><br><br>
<label>Password</label>
<input type="text" class="text" name="password" value="<?php echo $list['password'] ?>"><br><br><br>
<input type="submit" value="Update" class="submit" name="updateDetails">

<?php 
}

// Update Data
if (isset($_POST['updateDetails'])) {
    $staffId = $_POST['staffId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE staff SET firstName=?, lastName=?, username=?, password=? WHERE staffId=?";
    $update = $conn->prepare($sql);
    $update->bind_param("sssss", $firstName, $lastName, $username, $password, $staffId);
    $update->execute();

    if ($update) {
        echo "
        <script>
        alert('Staff Detail Updated');
        window.location = 'adminPage.php';
        </script>
        ";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Update Staff</title>
</head>

<body>
    <nav class="top-nav">
        <div class="logo">
            <h1> <img class="dash" src="icon/speedometer.png">Update staff</h1>
        </div>
        <ul class="menu">
            <li><a href="newStaff.php">Add Staff</a></li>
            <li><a href="index.php">Staff Dashboard</a></li>
            <li><a href="help.php">Help</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="main">
        <div class="sidebar">
            <a href="adminPage.php"> <img class="icon" src="icon/home.png">Home</a><hr>
            <a href="newStaff.php"><img class="icon" src="icon/add-friend.png">Add New User</a><hr>
            <a href="client.php"><img class="icon" src="icon/customers.png">Clients View</a><hr>
            <a href="help.php"><img class="icon" src="icon/help.png">Help?</a><hr>
            <a href="logout.php"><img class="icon" src="icon/logout.png">Logout</a><hr>
        </div>
        
        <div class="container">
            <header>
                <h2 class="heading"> <img src="icon/edit.png" width="50px">Edit Staff</h2>
            </header>
            <main>
                <form class="staffForm" action="func.php" method="post">
                    <?php result(); ?>
                </form>
            </main>
        </div>
    </div>
</body>

</html>

