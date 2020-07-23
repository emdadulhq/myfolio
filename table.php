<?php
include_once('include/header.php');
include_once('config.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap-table shadow">
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
                <a href="contact.php" class="btn btn-primary">Add Another Student</a>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Date of Birth</th>
							<th>Gender</th>
							<th>Location</th>
							<th>Username</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
                <?php
                $qry = "SELECT * FROM userinfo ";
                $res = $con -> query($qry);
                $i = 1;

                while ($data = $res -> fetch_assoc()):

                ?>
					<tbody>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $data['name'];?></td>
							<td><?php echo $data['email'];?></td>
							<td><?php echo $data['cell'];?></td>
							<td><?php echo $data['dob'];?></td>
							<td><?php echo $data['gender'];?></td>
							<td><?php echo $data['location'];?></td>
							<td><?php echo $data['uname'];?></td>
							<td><img src="usr_info/<?php echo $data['photo'];?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="#">View</a>
								<a class="btn btn-sm btn-warning" href="#">Edit</a>
								<a class="btn btn-sm btn-danger" href="#">Delete</a>
							</td>
						</tr>
                    <?php endwhile;?>

						

					</tbody>
				</table>
			</div>
		</div>
	</div>






    <?php
    include_once('include/footer.php')
    ?>

	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>