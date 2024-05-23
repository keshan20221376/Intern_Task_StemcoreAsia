<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "task");

$success_message = '';

if (isset($_POST['submit'])) {
  $first_name = mysqli_real_escape_string($connection, $_POST['firstname']);
  $last_name = mysqli_real_escape_string($connection, $_POST['lastname']);
  $email = mysqli_real_escape_string($connection, $_POST['UserEmail']);
  $contact_number = mysqli_real_escape_string($connection, $_POST['phonenumber']);

  $sql = "INSERT INTO user (first_name, last_name, email, contact_number) VALUES ('$first_name', '$last_name', '$email', '$contact_number')";

  if (mysqli_query($connection, $sql)) {
    $success_message = 'User registered successfully!';
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
  <script>
    setTimeout(function() {
      document.getElementById('success-message').style.display = 'none';
    }, 3000);
  </script>

</head>

<body>
  <div class="container-fluid">
    <?php if ($success_message) : ?>
      <div id="success-message" class="alert alert-success" role="alert">
        <?php echo $success_message; ?>
      </div>
    <?php endif; ?>
    <form id="UserRegistration" action="index.php" method="post">
      <div class="card-group">
        <div class="card" id="general-card">
          <div class="card-body">
            <h2 class="card-title">General Information</h2>
            <div class="row g-3 needs-validation" novalidate>
              <div class="col-md-12">
                <!--Title-->
                <select class="form-select" aria-label="Title Selection" id="title" name="title">
                  <option selected disabled value="" class="titleoption">
                    Title
                  </option>
                  <option value="1">Mr</option>
                  <option value="2">Mrs</option>
                  <option value="3">Miss</option>
                  <option value="4">Ms</option>
                  <option value="5">Dr</option>
                </select>
              </div>
              <div class="col-md-6">
                <!--First Name-->
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" pattern="[A-Za-z]+" />
              </div>
              <div class="col-md-6">
                <!--Last Name-->
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" pattern="[A-Za-z]+" />
              </div>
              <div class="col-md-6">
                <span class="input-group-text">Birthday</span>
                <input type="date" class="form-control" id="birthday" name="birthday" />
              </div>
              <div class="col-md-6">
                <!--Gender-->
                <span class="input-group-text">Gender</span>
                <select class="form-select" aria-label="Title Selection" id="gender" name="gender">
                  <option selected disabled value=""></option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                  <option value="3">Other</option>
                </select>
              </div>
              <div class="col-12">
                <!--Description-->
                <div class="form-floating">
                  <textarea class="form-control" placeholder="Description" id="input-description" style="height: 100px"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card" id="contact-card">
          <div class="card-body">
            <h2 class="card-title">Contact Details</h2>
            <div class="row g-3">
              <div class="col-md-12">
                <!--Address-->
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" pattern="[^'\x22]+" />
              </div>
              <div class="col-md-12">
                <!--Additional Information-->
                <input type="text" class="form-control" id="input-additional-information" placeholder="Additional Information" pattern="[^'\x22]+" title="Can not contain the quotation mark" />
              </div>
              <div class="col-md-12">
                <!--Country-->
                <select class="form-select" aria-label="Country Selection" id="country" name="country">
                  <option selected disabled value="">Country</option>
                </select>
              </div>
              <div class="col-md-4">
                <!--Zip Code-->
                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip Code" pattern="[0-9]{5}" required />
              </div>
              <div class="col-md-8">
                <!--Place-->
                <select class="form-select" aria-label="Place Selection" id="place" name="place">
                  <option selected disabled value="">Place</option>
                </select>
              </div>
              <div class="col-md-4">
                <!--Code-->
                <input type="text" class="form-control" id="code" name="code" placeholder="+ Code" pattern="\+[1-9]{1}[0-9]{0,5}" />
              </div>
              <div class="col-md-8">
                <!--Phone Number-->
                <input type="tel" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone Number" pattern="[1-9]{1}[0-9]{8}" />
              </div>
              <div class="col-md-12">
                <!--Email-->
                <input type="email" class="form-control" id="UserEmail" name="UserEmail" placeholder="Your Email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" />
              </div>
              <div class="col-12">
                <div class="form-check">
                  <!--Terms and Conditions-->
                  <label class="form-check-label" for="check-terms-conditions">
                    I do accept the <a href="#">Terms and Conditions</a> of
                    your site
                  </label>
                  <input class="form-check-input" type="checkbox" id="check" name="check" />
                </div>
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </div>
              <div class="col-6">
                <button type="button" class="btn btn-primary"> <a href="userTable.php" style="text-decoration: none; outline: none; color: black;">User List</a></button>
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