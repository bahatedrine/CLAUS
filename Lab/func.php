
<?php
session_start();
include 'dbconn.php';

// Login
if (isset($_POST['login'])) {
    if ($_POST['username'] != "" || $_POST['password'] != "") {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `staff` WHERE `username`=? AND `password`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->num_rows;
        $fetch = $result->fetch_assoc();

        if ($row > 0) {
            // Store data in session variables
            $_SESSION['user'] = $fetch[''];
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;

            header("location: index.php");
            exit();
        } else {
            echo "
            <script>alert('Invalid username or password')</script>
            <script>window.location = 'user.php'</script>
            ";
            exit();
        }
    } else {
        echo "
        <script>alert('Please complete the required field!')</script>
        <script>window.location = 'user.php'</script>
        ";
        exit();
    }
}

// Admin Login
if (isset($_POST['adminLog'])) {
    if ($_POST['username'] != "" || $_POST['password'] != "") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `admin` WHERE `username`=? AND `password`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->num_rows;
        $fetch = $result->fetch_assoc();

        if ($row > 0) {
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header("location: adminPage.php");
        } else {
            echo "
            <script>alert('Invalid username or password')</script>
            <script>window.location = 'admin.php'</script>
            ";
        }
    } else {
        echo "
        <script>alert('Please complete the required field!')</script>
        <script>window.location = 'admin.php'</script>
        ";
    }
}

// Manager login
if (isset($_POST['managerLog'])) {
    if ($_POST['username'] != "" || $_POST['password'] != "") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `manager` WHERE `username`=? AND `password`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->num_rows;
        $fetch = $result->fetch_assoc();

        if ($row > 0) {
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header("location: managerPage.php");
        } else {
            echo "
            <script>alert('Invalid username or password')</script>
            <script>window.location = 'manager.php'</script>
            ";
        }
    } else {
        echo "
        <script>alert('Please complete the required field!')</script>
        <script>window.location = 'manager.php'</script>
        ";
    }
}

// Register staff
if (isset($_POST['addStaff'])) {
    $sql = "INSERT INTO staff VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $_POST['staffId'], $_POST['firstName'], $_POST['lastName'], $_POST['username'], $_POST['password']);
    $stmt->execute();

    if ($stmt) {
        echo "
        <script>
        alert('Staff Added');
        window.location = 'adminPage.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Error adding staff');
        window.location = 'adminPage.php';
        </script>
        ";
    }
}


// Remove user
if (isset($_POST['delete'])) {
    $staffId = $_POST['staffId'];

    // JavaScript confirmation prompt
    echo "
        <script>
        var result = confirm('Are you sure you want to remove this staff?');
        if (result) {
            // If the user confirms, proceed with the delete operation
            window.location = 'deleteStaff.php?staffId=$staffId';
        } else {
            // If the user cancels, do nothing or redirect back to admin page
            // Here, we redirect back to the admin page.
            window.location = 'adminPage.php';
        }
        </script>
    ";
}


if (isset($_POST['edit'])) {
    header("Location: editStaff.php?staffId=" . $_POST['staffId']);
}

// Add clients
if (isset($_POST['addLog'])) {
    $clientId = $_POST['clientId'];
    $clientName = $_POST['clientName'];
    $time = $_POST['time'];
    $purpose = $_POST['purpose'];
    $duration = $_POST['duration'];

    // Prepare the SQL statement
    $sql = "INSERT INTO useLog (clientId, clientName, time, purpose, duration) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die('Error in preparing the statement: ' . $conn->error);
    }
	
    // Bind the parameters
    $stmt->bind_param("sssss", $clientId, $clientName, $time, $purpose, $duration);
    if ($stmt->execute()) {
        echo "
        <script>
        alert('Client details have been recorded successfully.');
        window.location = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Error adding client details: " . $stmt->error . "');
        window.location = 'index.php';
        </script>
        ";
    }
}







// Edit User
if (isset($_POST['updateDetails'])) {
    $sql = "UPDATE staff SET firstName = ?, LastName = ?, username = ?, password = ? WHERE staffId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $_POST['firstName'], $_POST['lastName'], $_POST['username'], $_POST['password'], $_POST['staffId']);
    $stmt->execute();

    if ($stmt) {
        echo "
        <script>
        alert('Staff Detail Updated');
        window.location = 'adminPage.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Error updating staff details.');
        window.location = 'adminPage.php';
        </script>
        ";
    }
}
?>
