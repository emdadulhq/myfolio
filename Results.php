<?php
include('include/header.php');
include('config.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<div class="container">
<table border="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>SL</th>
    <th>First_Name</th>
    <th>Last_Name</th>
    <th>Email</th>
    <th>City</th>
    <th>Country</th>
    <th>Zipcode</th>
    <th colspan="3">Action</th>
  </tr>
  <?php

      $view="SELECT * FROM userinfo";
      $results=mysqli_query($con,$view);
      while ($data=mysqli_fetch_assoc($results)) { ?>
  <tr>
    <td><?php echo $data['SL']; ?></td>
    <td><?php echo $data['First_Name']; ?></td>
    <td><?php echo $data['Last_Name']; ?></td>
    <td><?php echo $data['Email']; ?></td>
    <td><?php echo $data['City']; ?></td>
    <td><?php echo $data['Country']; ?></td>
    <td><?php echo $data['Zipcode']; ?></td>
    <td><a href="single.php?id=<?php echo $data['SL']; ?>"> View</a></td>
    <td><a href="Edit.php?id=<?php echo $data['SL']; ?>"> Edit</a></td>
    <td><a href="update.php?id=<?php echo $data['SL']; ?>"> Delete</a></td>
  </tr>
  <?php } ?>
</table>


</div>
  </body>
</html>


<?php
include('include/footer.php')
?>
