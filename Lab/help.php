<?php
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="help.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <title>Help Page</title>
</head>

<body>
    <nav class="top-nav">
        <div class="logo">
            <h1> <img src="icon/customer-service.png" width="50px">Help Page</h1>
        </div>
        <ul class="menu">
            <li><a href="index.php">Staff Dashboard</a></li>
            <li><a href="logs.php">Help</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <main class="content">
            <h2 class="page-heading"> <img class="icon" src="icon/help.png"> Help</h2>
            <div class="help-section">
                <h3 class="section-heading">Frequently Asked Questions</h3>
                <ul class="faq-list">
                    <li>
                        <h4 class="faq-question">How do I sign up as a new user?</h4>
                        <p class="faq-answer">To sign up as a new user, please contact the system administrator or
                            the laboratory staff. They will provide you with the necessary information and
                            registration process.</p>
                    </li>
                    <li>
                        <h4 class="faq-question">How can I view my Clients?</h4>
                        <p class="faq-answer">You can view your Clients by navigating to the "Client" section in the
                            staff dashboard. It will display a list of all your Clients records.</p>
                    </li>
                    <li>
                        <h4 class="faq-question">What should I do if I encounter a problem with the system?</h4>
                        <p class="faq-answer">If you encounter any issues or problems with the system, please contact
                            the system administrator or the laboratory staff immediately. They will assist you in
                            resolving the problem.</p>
                    </li>
                </ul>
            </div>
            <div class="help-section">
                <h3 class="section-heading">Contact Information</h3>
                <p class="contact-info">If you need further assistance or have any other questions, please feel free
                    to contact us:</p>
                <ul class="contact-list">
                    <li>Email: clabadmin@gmail.com</li>
                    <li>Phone: +256 723-456-789</li>
                    <li>Address: Makerere, Kampala, Uganda</li>
                </ul>
            </div>


            <div class="slideshow">
            <div><img src="slide1.jpg" alt="Slide 1"></div>
            <div><img src="slide2.jpg" alt="Slide 2"></div>
            <div><img src="slide3.jpg" alt="Slide 3"></div>
        </div>
        </main>
    </div>

             <!--copyright footer  -->
            </div>
    <div class="footer-legal" style="
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-direction: column;
        ">
        <p class="copyright">
          Copyright &copy; <script>
          var today = new Date();
          document.write(today.getFullYear());
          </script>
          <strong><span>C_LAB </span></strong>. All Rights Reserved 
          
       </p>
          <p id="copy"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Designed by C_LAB &trade;</p>
        
    </div>
   

    </body>
</html>

