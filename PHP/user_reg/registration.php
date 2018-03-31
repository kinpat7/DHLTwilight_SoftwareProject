<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css">
  <link rel="stylesheet" href="/CSS/CSS_Registration.css"> 
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="#"><b>DHL Twilight</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav"></ul>
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="DHLT_LoginPage.html"><i class="fa d-inline fa-lg fa-user-circle-o"></i>Register</a>
      </div>
    </div>
  </nav>
  <div class="py-5" style="background-image: url(&quot;/Images/DHL_CartoonVan.jpg&quot;);">
    <div class="container">
      <div class="row">
        <div class="col-md-6" id="book">
          <div class="card">
            <div class="card-body p-3">
              <h3 class="pb-3">Registration Form</h3>
              
                <form method="post" action="registration.php">
  	            <?php include('errors.php'); ?>
                
                <div class="form-group"> 
                <label>Name</label>
                  <input type = "text" name="name" class="form-control" placeholder="Your name" value="<?php echo $name; ?>"> 
                  </div>
                
                <div class="form-group"> <label>Address</label>
                  <input type="address" name="address" class="form-control" placeholder="Your home address" value="<?php echo $address; ?>"> 
                  </div>
                  
                <div class="form-group"> <label>City</label>
                  <input type="city" name="city" class="form-control" placeholder="Your City" value="<?php echo $city; ?>"> 
                  </div>
                  
                <div class="form-group"> <label>Phone Number</label>
                  <input type="phone" name="phone" class="form-control" maxlength="30" placeholder="Telephone Number" value="<?php echo $phone; ?>"> 
                  </div>
                  
                <div class="form-group"> <label>DHL Express Department</label>
                  <input type="dept" name="dept" class="form-control" placeholder="Operations, Sales, eCom" value="<?php echo $dept; ?>"> 
                  </div>
                  
                <div class="form-group"><label class="form-control-label">DHL Express Staff Number</label>
                  <input type="staffNo" name="staffNo" class="form-control" maxlength="4" placeholder="" value="<?php echo $staffNo; ?>"> 
                  </div>
                  
                <div class="form-group"><label class="form-control-label">DHL eMail Address</label>
                  <input type="email" name="email" class="form-control" placeholder="example@dhl.com" value="<?php echo $email; ?>"> 
                  </div>
                  
                <div class="form-group"><label class="form-control-label">DHL Twilight Username</label>
                  <input type="username" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>"> 
                  </div>
                  
                <div class="form-group"><label class="form-control-label">DHL Twilight Password</label>
                  <input type="password1" name="password_1" class="form-control" placeholder="Password"> 
                  </div>
                  
                <div class="form-group"><label class="form-control-label">DHL Twilight Confirm Password</label>
                  <input type="password2" name="password_2" class="form-control" placeholder="Confirm Password"> 
                  </div>  
                
  	           <div class="form-group">
  	              <button type="submit" class="btn" name="reg_user">Register</button>
            	</div>
                
              </form>
              
            </div>
            <div class="card-footer text-muted">* Registration will be confirmed and access to the site granted on supply of your DHL Express employee badge to the DHL Twilight Administrator</div>
          </div>
        </div>
        <div class="align-self-col-md-10 text-white">
          <h1 class="text-center text-md-left display-3 text-dark"><b class="text-center">Register for&nbsp;<br>DHL Twilight!<br></b></h1>
          <p class="lead text-dark"><b><b>For DHL Express Employess Only</b></b>
          </p>
        </div>
      </div>
      <div class="row"></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>