<!Doctype html>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i%7cMontserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Style -->
    <link href="css/style.css" rel="stylesheet">
<style >
  .container-fluid {
      padding: 60px 30px;
  }
  .bg-grey {
      background-color: darkgrey;
  }
  .bg1{
  background-color:#fe6666;
  color:blue;
  }
  input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #f44336;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #f14133;
}

.container {
    border-radius: 5px;
    background-color: #ffffff;
    padding: 0px;
}
.add2{
padding-left:30px;
padding-right:30px;
}

.card {
    box-shadow: 0 4px 8px 0 rgba(1,1,0,0.2);
    transition: 0.3s;
    width: 75%;
  height: 50%;
  font-size: 15px;
  padding:10px 10px 10px 10px;
}

.card:hover {
    box-shadow: 0 16px 16px 0 rgba(0,0,0,0.2);
}

.container1 {
    padding:10px 20px 10px 20px;
}
 .container-fluid {
      padding: 60px 50px;
  }
  .cards-row{padding-top:70px; padding-bottom:50px; background:#eee}
</style>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet'>
<link href="css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <img src="images/logo_name.png" class="img-responsive" alt="LifeShare logo" />
                </div>
                <div class="col-lg-10 col-md-4 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                <li class="active"><a href="index.html" title="Home">Home</a></li>
                                <li class=""><a href="about_us.html" title="About">About</a></li>
                                <li class="has-sub"><a href="" title="Register ">Register</a>
                                    <ul>
                                        <li><a href="donor.html" title="Donor">As Donor</a></li>
                                        <li><a href="Hospital.html" title="Hospital">As Hospital</a></li>
                                    </ul>
                                </li>
                                <li><a href="patient_request.html" title="Log In">Blood Request</a>
                                </li>
                                <li><a href="donor_search.html" title="Log In">Search Donor</a>
                                </li>
                                <li><a href="login.html" title="Log In">Log in</a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="container-fluid cards-row" style="background:grey;">
  
  <div class="row">
  <?php
    include_once 'connection.php';
    $sql = "SELECT * FROM branch;";
    $res = $conn->query($sql);
    while ($row = $res->fetch_assoc()) {
      $name = $row['b_name'];
      $addr = $row['address'];
      $area = $row['area'];
      $phone = $row['phone'];
      $email = $row['email'];
      echo '<div class="col-md-4 col-lg-4">
      <div class="card" style="border:solid;background-color:white;">

        <div class="container1">';
         
         echo '<p>Branch..:'.$name.'</p>';
         echo '<p>Address.:'.$addr.'</p>';
         echo '<p>Phone...:'.$phone.'</p>';
         echo '<p>Email...:'.$email.'</p>';
        echo '
        </div>
      </div>
    </div>';
    }
      if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) &&isset($_POST["subject"]))
  {
  $f_name=$_POST["firstname"];
  $l_name=$_POST["lastname"];
  $email=$_POST["email"];
  $comments=$_POST["subject"];
  if($conn->query("insert into feedback (first_name,last_name,email,comments) values ('$f_name','$l_name','$email','$comments')"));
}
  ?>
        
    </div>
    </div>
    
    <div class="container-fluid">
     <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
   
    <label for="email">Email</label>
    <input type="text"  name="email" placeholder="Your email.">

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
