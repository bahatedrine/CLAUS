<?php
include 'session.php';
include 'dbconn.php';

$sql = "SELECT COUNT(*) as count FROM useLog";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalClients = $row['count'];

$sql = "SELECT COUNT(*) as count FROM staff";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$staffCount = $row['count'];

$sql = "SELECT * FROM staff";
$result = $conn->query($sql);



?>
<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <script src="./chart.min.js"></script>
    <title>Manager Dashboard</title>
    <style>
        .chart{
            width: 700px;
            height: 400px;
            margin-left: 1%;
        }
    </style>
</head>

<body>
    <div class="container">
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
                <a href="client.php"><img class="icon" src="icon/customers.png">Clients View</a>
                <hr>
                <a href="help.php"><img class="icon" src="icon/help.png">Help?</a>
                <hr>
                <a href="logout.php"><img class="icon" src="icon/logout.png">Logout</a>
                <hr>
            </div>
            <div class="content">
                <h2 class="input-heading">Search Client Data By Purpose</h2>
                <form class="search-form" action="searchResults.php" method="post">
                    <input class="input-box" name="search" placeholder="Enter purpose of use" required>
                    <button type="submit" class="search-button">Search <img src="icon/search.png" width="15px"></button>
                </form>

                <div class="val">
                    <div class="card">
                        <table class="sta">
                            <tr>
                                <td>
                                    <div class="pic">
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
                                    <div class="pic">
                                        <img src="icon/team.png" width="100px">
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
                <div class="chart">
                        <canvas id="chart">
                            
                        </canvas>
                    </div>
                <table class="staffTable">
                    <thead>
                        <caption>STAFF LIST</caption>
                        <tr>
                            <th>Staff Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($list = $result->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <form action="func.php" method="post">
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
                                <td>
                                    <?php echo $list['password']; ?>
                                </td>
                                </form>
                                </a>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
    </div>

<script>

</script>
<script>
    let text = []
    let figures = []
  function drawChart(){
    fetch('mydata.php')
    .then((res)=> res.json())
    .then((data)=>{
        let myfigures = []
      data['figures'].forEach(element => {
        myfigures.push(+element)
      });
        const chart = document.getElementById('chart').getContext('2d')
    let myChart = new Chart(chart, {
        type: 'bar',
        data: {
            labels: data['text'],
            datasets:[{
                label: 'Lab Usage',
                data:myfigures,
                color: '#006700',
                backgroundColor:'#006700'
            },
        ],
            options:{
               maintainAspectRatio: true
            }
        }
        
    })

  
    })
  /*   setTimeout(drawChart, 1) */
  }
window.addEventListener("DOMContentLoaded", ()=>{
    drawChart()
})
</script>
</body>

</html>
