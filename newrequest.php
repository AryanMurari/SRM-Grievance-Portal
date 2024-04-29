<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["username"];
    $studentname = $_POST["studentname"];
    $studentid = $_POST["studentid"];
    $batchname = $_POST["batchname"];
    $emailid = $_POST["emailid"];
    $grievancetype = $_POST["grievancetype"];
    $grievancedetails = $_POST["grievancedetails"];
   // $exists=false;
        $sql = "INSERT INTO `grievancestatus` (`username`, `studentname`, `studentid`, `batchname`, `emailid`, `grievancetype`, `grievancedetails`,  `dt`, `Status`) VALUES ('$username', '$studentname', '$studentid', '$batchname','$emailid','$grievancetype','$grievancedetails', current_timestamp(), 'Pending')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
        else{
         $showError = "Passwords do not match";
     }
}
    
?>
<!DOCTYPE html>
<html lang="en" ng-app="loginApp">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Login</title>
      <link rel="icon" type="image/x-icon" href="/images/titlelogo.png">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
      <style>
          .error {
              color: red;
          }
      </style>
   </head>
   <!-- body -->
   <body class="main-layout inner_page">
   <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Grievance has been succesfully submitted!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <div class="header">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class=" col-md-2 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-8 col-sm-12">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item">
                              <a class="nav-link" href="index.html">Home</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="about.html">Policy</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="requesttab.php">Requests</a>
                           </li> <li class="nav-item">
                              <a class="nav-link" href="solutionstab.html">Solutions</a>
                           </li>
                           <li class="nav-item active">
                              <a class="nav-link" href="login.php">Login</a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               </div>
               <div class="col-md-2">
                  <ul class="email text_align_right">
                     <li class="d_none"><a href="Javascript:void(0)"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                     <li class="d_none"> <a href="Javascript:void(0)"><i class="fa fa-search" style="cursor: pointer;" aria-hidden="true"></i></a> </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- end header inner -->
      <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Grievance Form</title>
</head>
<body class="main-layout inner_page">
   <div class="container my-4">
      <div class="titlepage text_align_center">
  <h2>Student Grievance Form</h2>
  </div>
  <form action="/SRM-Grievance-Portal/newrequest.php" method="post" name="loginForm" id="request" class="main_form" onsubmit="redirect()" novalidate>
  
      <legend><b>Enter Details</b></legend>
      <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div>
        <label for="studentname">Student Name:</label>
        <input type="text" id="studentname" name="studentname" required>
      </div>
      <div>
        <label for="studentid">Student ID:</label>
        <input type="text" id="studentid" name="studentid" required>
      </div>
      <div>
        <label for="batchname">Batch:</label>
        <input type="text" id="batchname" name="batchname" required>
      </div>
      <div>
        <label for="emailid">Email Address:</label>
        <input type="emailid" id="email" name="emailid" required>
      </div>
   
      <div>
        <label for="grievancetype">Grievance Type:</label>
        <select id="grievancetype" name="grievancetype">
          <option value="">Select a type</option>
          <option value="academic">Academic Issue</option>
          <option value="non-academic">Non-Academic Issue</option>
          <option value="discrimination">Discrimination or Harassment</option>
          <!--<option value="other">Other (Please Specify)</option>-->
        </select>
      </div>
     <!-- <div id="grievance-type-other" style="display: none;">
        <label for="grievance-type-other-text">Please specify the type of grievance:</label>
        <textarea id="grievance-type-other-text" name="grievance_type_other" rows="2"></textarea>
      </div>-->
      <div>
        <label for="grievancedetails">Grievance Description:</label>
        <textarea id="grievancedetails" name="grievancedetails" rows="10" required></textarea>
      </div>
    <button type="submit" class="send_btn">Submit Grievance</button>
  </form>
  </div>
 
</body>
</html>
<!--  footer -->
<footer>
   <div class="footer">
     
      <div class="copyright">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p>© 2024 All Rights Reserved SRMIST. Design by Aryan Murari, Satya Kamisetty and Rushik Parikh.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
 </footer>
 <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/custom.js"></script>
      <script>
         AOS.init();
      </script>
      <script>
         var app = angular.module('loginApp', []);
         app.controller('loginCtrl', function($scope) {
             $scope.submitForm = function() {
                 if ($scope.loginForm.$valid) {
                     window.location.href="requesttab.html";
                 } else {
                     alert('Please correct errors in the form.');
                 }
             };
         });
     </script>
   </body>
</html>
