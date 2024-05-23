<?php
$connection = mysqli_connect("localhost", "root", "", "task");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$edit = $_GET['edit'];

$sql = "SELECT * FROM user WHERE id = '$edit'";
$run = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($run);
$uid = $row['id'];
$firstname = $row['first_name'];
$lastname = $row['last_name'];
$UserEmail = $row['email'];
$phonenumber = $row['contact_number'];

if (isset($_POST['submit'])) {
  $edit = $_GET['edit'];
  $first_name = mysqli_real_escape_string($connection, $_POST['firstname']);
  $last_name = mysqli_real_escape_string($connection, $_POST['lastname']);
  $email = mysqli_real_escape_string($connection, $_POST['UserEmail']);
  $contact_number = mysqli_real_escape_string($connection, $_POST['phonenumber']);

  $sql = "UPDATE user SET first_name = '$first_name', last_name = '$last_name', email = '$email', contact_number = '$contact_number'  WHERE id = '$edit'";
  if (mysqli_query($connection, $sql)) {
    echo '<script>location.replace("userTable.php")</script>';
  } else {
    echo 'Error: ' . mysqli_error($connection);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Registration</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/UserRegistration.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>

<body>
  <div class="container-fluid">
    <form id="UserRegistration" action="" method="post">
      <div class="card-group">
        <div class="card" id="general-card">
          <div class="card-body">
            <h2 class="card-title">General Information</h2>
            <div class="row g-3 needs-validation" novalidate>
              <div class="col-md-6">
                <!--First Name-->
                <label for="firstname"> First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>" pattern="[A-Za-z]+" />
              </div>
              <div class="col-md-6">
                <!--Last Name-->
                <label for="lastname"> Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>" pattern="[A-Za-z]+" />
              </div>
              <div class="col-md-8">
                <!--Email-->
                <label for="email"> Email</label>
                <input type="email" class="form-control" id="UserEmail" name="UserEmail" value="<?php echo $UserEmail ?>" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" />
              </div>
              <div class="col-md-4">
                <!--Phone Number-->
                <label for="phonenumber"> Phone Number</label>
                <input type="tel" class="form-control" id="phonenumber" name="phonenumber" pattern="[1-9]{1}[0-9]{8}" value="<?php echo $phonenumber ?>" />
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary" name="submit">Done</button>
                <a href="userTable.php" class="btn btn-danger">Close</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/UserRegistration.js"></script>
  <script src="js/countryValidation.js"></script>
</body>

</html>
