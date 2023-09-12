<?php
include 'session.php';
include 'dbconn.php';

$sql = "SELECT COUNT(*) as count FROM staff";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$staffCount = $row['count'];

$sql = "SELECT COUNT(*) as count FROM useLog";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalClients = $row['count'];
$sql = "SELECT * FROM staff";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="admin.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src = './chart.min.js'></script>
  <title>Admin Dashboard</title>
  
</head>

<body>
  <div class="container">
  <nav class="top-nav">
        <div class="logo">
            <h1> <img class="dash" src="icon/speedometer.png">Admin Dashboard</h1>
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
        <a href="newStaff.php"><img class="icon" src="icon/add-friend.png">Add New Staff</a><hr>
        <a href="client.php"><img class="icon" src="icon/customers.png">Clients View</a><hr>
        <a href="help.php"><img class="icon" src="icon/help.png">Help?</a><hr>
        <a href="logout.php"><img class="icon" src="icon/logout.png">Logout</a><hr>

        <div class="staff-count">
           <h2> <span class="total"><?php echo $staffCount; ?></span>Staff</h2>
           
        </div>
    </div>
      <div class="content">
         <p id="currentDateTime"></p>

        <table class="staffTable">
          <thead>
            <tr>
              <th>Staff Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <!-- <th>Password</th> -->
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
          <?php while ($list = $result->fetch_assoc()) { ?>

              <tr>
                <form action="func.php" method="post">
                  <td>
                    <input type="hidden" name="staffId" value="<?php echo $list['staffId']; ?>">
                    <?php echo $list['staffId']; ?>
                  </td>
                  <td>
                    <?php echo $list['firstName']; ?>
                  </td>
                  <td>
                    <?php echo $list['LastName']; ?>
                  </td>
                  <td>
                    <?php echo $list['username']; ?>
                  </td>
                  <!-- <td>
                    <?php echo $list['password']; ?>
                  </td> -->
                  <td style="text-align: center; vertical-align: middle;">
                      <button class="edit" type="submit" name="edit">
                        Edit
                         <img src="icon/user-pen.png" width="20px">
                      </button>
                 </td>
                 <td style="text-align: center; vertical-align: middle;">
                     <button  class="delete" type="submit" name="delete">
                       Delete
                        <img src="icon/delete-user.png" width="20px">
                      </button>
                  </td>

                </form>
                </a>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <canvas id="graphCanvas" style="width: 10%;"></canvas>
   

    <div class="val">
            <div class="card">
                <table class="sta">
                <tr>
                    <td>
                      <div class="pic" >
                       <img src="icon/diagram.png" width="100px">
                      </div>
                    </td>
                    <td>
                       <div class="number">
                       <h1><?php echo $totalClients; ?> Clients </h1>

                       </div>
                    </td>
                </tr>
                </table>
              

            </div>

            <div class="card2">
                <table class="sta">
                <tr>
                    <td>
                      <div class="pic" >
                       <img src="icon/employee.png" width="100px">
                      </div>
                    </td>
                    <td>
                       <div class="number">
                       <h1 class="bl"><?php echo $staffCount; ?> Staff Employee</h1>

                       </div>
                    </td>
                </tr>
                </table>  

            </div>
          </div>
</div>
</div>

</div>

  <script>
    // Get the current date and time
var currentDate = new Date();

// Format the date and time as desired
var options = {
  year: 'numeric',
  month: 'long',
  day: 'numeric',
  hour: 'numeric',
  minute: 'numeric',
  second: 'numeric',
  hour12: false
};
var formattedDateTime = currentDate.toLocaleString('en-US', options);

// Insert the formatted date and time into the HTML element
var currentDateTimeElement = document.getElementById('currentDateTime');
currentDateTimeElement.textContent = formattedDateTime;



  </script>


</body>

</html>
