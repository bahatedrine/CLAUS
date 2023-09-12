<?php 
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Add New user</title>
</head>

<body>

    <nav class="top-nav">
        <div class="logo">
            <h1><img class="dash" src="icon/speedometer.png">Add New User</h1>
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
        
        <main>
            <h3 class="subheading"> <img src="icon/add-friend.png" width="50px"> New Staff Information</h3>
            <form class="staffForm" action="func.php" method="post">
                <div class="form-group">
                    <label for="staffId">Staff Id</label>
                    <input type="text" name="staffId" id="staffId" class="text-input">
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="text-input">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="text-input">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="text-input">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="text-input">
                </div>
                <div class="form-actions">
                    <input type="submit" value="Add" class="submit-button" name="addStaff">
                    
                </div>
            </form>
        </main>
    </div>
</body>

</html>
