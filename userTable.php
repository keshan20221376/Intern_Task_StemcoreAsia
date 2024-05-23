<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Table</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/UserTable.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>

<body>
  <div class="container-fluid">
    <div class="navigation">
      <nav class="navbar navbar-expand-lg">
        <button class="btn btn-primary" type="button" id="getBackRegistration"> <a href="index.php" style="text-decoration: none; outline: none; color: #dfdfdf;">Register New User</a></button>
      </nav>
    </div>

    <div class="card" id="tablecard">
      <table class="table-responsive caption-top align-middle">
        <caption>
          List of Users
        </caption>
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody class="table-group-divider table-bordered">
          <?php
          $connection = mysqli_connect("localhost", "root", "");
          $db = mysqli_select_db($connection, "task");

          $sql = "SELECT * FROM user";
          $run = mysqli_query($connection, $sql);
          $id = 1;
          while ($row = mysqli_fetch_array($run)) {
            $uid = $row['id'];
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $UserEmail = $row['email'];
            $phonenumber = $row['contact_number'];
          ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $firstname ?></td>
              <td><?php echo $lastname ?></td>
              <td><?php echo $UserEmail ?></td>
              <td><?php echo $phonenumber ?></td>
              <td>
                <button class="btn btn-primary" type="button">
                  <div class="edit">
                    <a href="edit.php?edit=<?php echo $uid ?>">
                      <img src="svg/pencil-fill.svg" alt="edit" />
                    </a>
                  </div>
                </button> &nbsp;
                <button class="btn btn-danger" type="button">
                  <div class="delete">
                    <a href="delete.php?del=<?php echo $uid ?>">
                      <img src="svg/trash3-fill.svg" alt="edit" />
                  </div>
                  </a>
                </button>
              </td>
            </tr>
          <?php $id++;
          } ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="js/bootstrap.bundle.js"></script>
</body>

</html>