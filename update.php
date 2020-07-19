<?php
include('include/header.php');
include('config.php');
$id = $_GET['SL'];

$qry = "SELECT * FROM userinfo WHERE id=$id";
$sel = mysqli_query($con,$qry);
$data = mysqli_fetch_assoc($sel);

if(!empty($_POST)){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $zipcode=$_POST['zipcode'];


    if(!empty($fname)){
        $query="UPDATE userinfo SET First_Name='$fname',Last_Name='$lname',Email='$email', City='$city',Country='$country',Zipcode='$zipcode'WHERE id=$id";
        $sub=mysqli_query($con,$query);
    if($sub){
        echo "Data Update Successfully!";
    }else{
        echo "Data Update Error!";
    }
}
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update</title>
  </head>
  <body>
    <section class="contact_sec">
        <div class="container">
            <form action="" method="post">
                <div class="form-row">

                  <input type="hidden" name="SL" value="<?php echo $data['SL']; ?>" class="form-control is-valid" id="validationServer02" value="" required>
                  <div class="valid-feedback">
                      Looks good!
                  </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer01">First name</label>
                        <input type="text"name="fname" value="<?php echo $data['First_Name']; ?>" class="form-control is-valid" id="validationServer01" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer02">Last name</label>
                        <input type="text" name="lname" value="<?php echo $data['Last_Name']; ?>" class="form-control is-valid" id="validationServer02" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServerUsername">E-mail</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend3">@</span>
                            </div>
                            <input type="text" name="email" value="<?php echo $data['Email']; ?>" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3" required>
                            <div class="valid-feedback">
                                Enter your email.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer03">City</label>
                        <input type="text" name="city" value="<?php echo $data['City']; ?>" class="form-control is-invalid" id="validationServer03" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationServer04">Country</label>
                        <select name="country" value="<?php echo $data['Country']; ?>" class="custom-select is-invalid" id="validationServer04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>Bangladesh</option>
                            <option>India</option>
                            <option>USA</option>
                            <option>Canada</option>
                            <option>France</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Country.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationServer05">Zip</label>
                        <input type="number" name="zipcode" value="<?php echo $data['Zipcode']; ?>" class="form-control is-invalid" id="validationServer05" required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                        <label class="form-check-label" for="invalidCheck3">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>
                <form>
                  <button class="btn btn-primary" type="submit" value="Update">Update</button>
                </form>
            </form>
        </div>
    </section>

  </body>
</html>
<?php
include('include/footer.php')
?>
