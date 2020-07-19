
<?php 

include_once('include/header.php');
include_once('config.php');
include_once "apps/function.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD | Project</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	
</head>
<body>
	
	
	
	<?php
	/*
	*This app are made for student data
	*/
	if (isset($_POST['send'])){
		//get value from the from
		$name = $_POST['name'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];
		$dob = $_POST['dob'];
        $gender = $_POST['gender'];
		$location = $_POST['location'];
		$uname = $_POST['uname'];
		$password = $_POST['password'];
		$photo = $_FILES['photo'];


		//file system

		$file_name = $_FILES['photo']['name'];
		$file_tmp = $_FILES['photo']['tmp_name'];
		$file_size = $_FILES['photo']['size']/(1024*1024);
		
		//file extension
		$fileArray = explode('.' , $file_name);
		$fileExt = strtolower(end($fileArray));	


		//unique name
		//$uniqueName = md5(time(). rand()).'.'.$fileExt;
		$uniqueName = date('d-m-y g:i:s').'.'.$fileExt;




				
		//empty field check for form
		if(empty($name) || empty($email) || empty($cell) || empty($dob) || empty($photo)){
			$mess = "<p class=\"alert alert-danger\"> সবগুলো ঘর অবশ্যই পূরণীয় (অত্যাবশ্যক)! <button class=\"close\" data-dismiss=\"alert\">&times;</button> </p>";
		}elseif(cellVal($cell) == false){
			$mess = "<p class=\"alert alert-warning\"> আপনার প্রদানকৃত মোবাইল নম্বরটি সঠিক নয়! <button class=\"close\" data-dismiss=\"alert\">&times;</button> </p>";
		}elseif(mailValidate($email) == false){
			$mess = "<p class=\"alert alert-warning\"> সাইন আপ করার জন্য gmail এবং ctbd মেইল হতে হবে! <button class=\"close\" data-dismiss=\"alert\">&times;</button> </p>";
		}elseif(filter_var($email, FILTER_VALIDATE_EMAIL)==false){
			$mess = "<p class=\"alert alert-danger\"> আপনার প্রদানকৃত ইমেইল এড্রেসটি সঠিক নয়!! <button class=\"close\" data-dismiss=\"alert\">&times;</button> </p>";
		}elseif(ageValidate($dob, 1990-01-01, 2020-01-01 ) == false){
			$mess = "<p class=\"alert alert-warning\"> জন্মতারিখ ০১-০১-১৯৯০ থেকে ০১-০১-২০০০ এর মধ্যে নেই!! <button class=\"close\" data-dismiss=\"alert\">&times;</button> </p>";
		}elseif(in_array($fileExt, ['jpg','png','gif','jpeg'])==false){
			$mess = "<p class=\"alert alert-warning\"> Your Photo Format is not valid!! <button class=\"close\" data-dismiss=\"alert\">&times;</button> </p>";
		}elseif($file_size > .5){
			$mess = "<p class=\"alert alert-warning\"> Your Photo size is too large!! <button class=\"close\" data-dismiss=\"alert\">&times;</button> </p>";
		}else{

		    move_uploaded_file($file_tmp,  'usr_info/'. $uniqueName);
            $query="INSERT INTO userinfo (name, email, cell, dob) VALUES ('$name','$email','$cell','$dob')";
            $query=mysqli_query($con,$query);
			header('location:congrats.php');
		}
	}
	
	?>
	

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Student Sign Up Form</h2>
				<h3 class="bg bg-danger text-light"> Role for student registration:</h3>
				<ul class="border border-danger">
					<li> অবশ্যই সম্পুর্ন নাম লিখতে হবে। </li>
					<li> অবশ্যই ১১ ডিজিটের মোবাইল নম্বর থাকতে হবে। </li>
					<li> অবশ্যই কোডার্স ট্রাস্ট এর ইমেইল এড্রেস থাকতে হবে। </li>
					<li> জন্মতারিখ অবশ্যই ০১-০১-১৯৯০ থেকে ০১-০১-২০০০ এর মধ্যে হতে হবে। </li>
				</ul>
				
				
				
				<?php
				//for shown error & success massage
				if(isset($mess)){
					echo $mess;
				}
				
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Student Name</label>
						<input name="name" value="<?php old('name')?>" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" value="<?php old('email')?>" class="form-control" type="email">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" value="<?php old('cell')?>" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Date of Birth</label>
						<input name="dob" value="<?php old('dob')?>" class="form-control" type="date">
					</div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <br>
                        <input name="gender" type="radio" value="Male" id="mmm"> <label for="mmm">Male</label>
                        <input name="gender" type="radio" value="Female" id="fff"> <label for="fff">Female</label>
                    </div>
					<div class="form-group">
                        <label for="">Location</label>
                        <select name="location" class="form-control" id="" ">
                            <option value="">-select-</option>
                            <option value="Mirpur">Mirpur</option>
                            <option value="Banani">Banani</option>
                            <option value="Uttara">Uttara</option>
                            <option value="Dhanmondi">Dhanmondi</option>
                            <option value="Badda">Badda</option>
                            <option value="Others">Others</option>
                        </select>
					</div>
                    <div class="form-group">
						<label for="">User Name</label>
						<input name="uname" value="<?php old('uname')?>" class="form-control" type="text">
					</div>
                    <div class="form-group">
						<label for="">Password</label>
						<input name="password" value="<?php old('password')?>" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
                        <p class="text-info">Please select your passport size photograph</p>
                        <input name="photo" id="file" class="form-control" type="file" accept="image/*" onchange="loadFile(event)" style="cursor: pointer;"
                        <p><img id="output" class="" width="200" height="220"></p>


					</div>
					<div class="form-group">
						<input name="send" class="btn btn-primary" type="submit" value="Sign Up">
						
					</div>
				</form>

                <a href="table.php" class="btn btn-primary">All Students Data</a>
			</div>
		</div>
	</div>






	
<?php
include('include/footer.php')
?>

	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

    </script>

    <!-- <script>
	window.addEventListener('load', function() {
 	document.querySelector('input[type="file"]').addEventListener('change', function() {
      if (this.files && this.files[0]) {
          var img = document.querySelector('img');  // $('img')[0]
          img.src = URL.createObjectURL(this.files[0]); // set src to blob url
          img.onload = imageIsLoaded;
      }
  });
});

function imageIsLoaded() { 
  alert(this.src);  // blob url
  // update width and height ...
}
	</script> -->
	
</body>
</html>