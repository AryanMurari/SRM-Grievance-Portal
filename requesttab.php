<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>Request Tab</title>
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
  <style>
    /* Basic styling for search bar and results table */
    #search-container {
      display: flex;
      margin-bottom: 10px;
    }
    #search-input {
      padding: 5px;
      border: 1px solid #ccc;
      flex-grow: 1;
    }
    #search-button {
      padding: 5px 10px;
      cursor: pointer;
      background-color: #ddd;
      border: 1px solid #ccc;
    }
    #results-table {
      border-collapse: collapse;
      width: 100%;
    }
    #results-table th, #results-table td {
      padding: 5px;
      border: 1px solid #ddd;
    }
    #results-table th {
      text-align: left;
    }
  </style>
</head>
<body class="main-layout inner_page">
  <!-- loader --> 
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
                        <a class="nav-link" href="solutionstab.html">Solutions</a>
                     </li>
                      <li class="nav-item active">
                         <a class="nav-link" href="login.html">Login</a>
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
 <div class="titlepage text_align_center">
  <h2> Welcome  <?php echo $_SESSION['username']?><h2>
</div>
 <h1 style="margin: 20px;"><b>Request Tab</b></h1>
  
  <div id="search-container">
    <input type="text" id="search-input" maxlength="100px" placeholder="Search requests">
    <button id="search-button">Search</button>
  </div>

  <table id="results-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Subject</th>
        <th>Requster name</th>
        <th>Assigned to</th>
        <th>Due By</th>
        <th>Status</th>
        <th>Created On</th>
      </tr>
    </thead>
    <tbody>
      </tbody>
  </table>

  <script>
    // Add JavaScript to handle search functionality (optional)
    const searchInput = document.getElementById('search-input');
    const searchButton = document.getElementById('search-button');
    const resultsTable = document.getElementById('results-table');

    searchButton.addEventListener('click', () => {
      const searchTerm = searchInput.value;
      // Simulate search logic (replace with logic to fetch data from server)
      const solutions = [
        { id: 1, title: "Solution for missing grades", views: 50, createdOn: "2023-10-25", createdBy: "John Doe" },
        { id: 2, title: "How to request a leave of absence", views: 120, createdOn: "2023-11-01", createdBy: "Jane Smith" },
        // Add more solution objects as needed
      ];

      // Clear existing results
      resultsTable.getElementsByTagName('tbody')[0].innerHTML = "";

      // Filter and display solutions based on search term
      const filteredSolutions = solutions.filter(solution => solution.title.toLowerCase().includes(searchTerm.toLowerCase()));
      if (filteredSolutions.length > 0) {
        filteredSolutions.forEach(solution => {
          const tableRow = resultsTable.insertRow();
          tableRow.innerHTML = `
            <td>${solution.id}</td>
            <td>${solution.title}</td>
            <td>${solution.views}</td>
            <td>${solution.createdOn}</td>
            <td>${solution.createdBy}</td>
          `;
        });
      } else {
        const tableRow = resultsTable.insertRow();
        tableRow.innerHTML = <td colspan="5">No solutions found matching your search.</td>;
      }
    });
  </script>
  <br><br><br><br><br><br><br><br><br>
<!--  footer -->
<footer>
  <div class="footer">
    
     <div class="copyright">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <p>© 2020 All Rights Reserved SRMIST. Design by Aryan Murari, Satya Kamisetty and Rushik Parikh.</p>
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

</body>
</html>