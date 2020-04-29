<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Laundry SignUp</title>
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="container col-sm-3"></div>

        <div class="container col-sm-6">
          <div class="display-4 form-group">Laundry SignUp</div>
          <form action="signUpL.php" method = "post"> 
          <?php
                  if(@$_GET['Empty']==true){
                ?>
                  <div class = "alert-light text-danger py-3"><?php echo $_GET['Empty']?></div>
                <?php
              }
            ?>
            <?php
            // var_dump($_GET['noMatch']);
                  if(@$_GET['noMatch']==true){
                ?>
                  <div class = "alert-light text-danger py-3"><?php echo $_GET['noMatch']?></div>
                <?php
              }
            ?>
            <?php
                  if(@$_GET['exist']==true){
                ?>
                  <div class = "alert-light text-danger py-3"><?php echo $_GET['exist']?></div>
                <?php
              }
            ?>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="usr"
                name="name"
                placeholder="Name"
              />
            </div>
            <div class="form-group">
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="E-mail"
              /></div>
              <div class="form-group">
                <input type="text" class="form-control" id ="username" name="username" placeholder="Username">
              </div>
              <div class="form-group">
              <textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
              </div>
              <div class="form-group">
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number"/>
              </div>
              <div class="form-group">
              <input type="password" class="form-control" id="pwd" name="password" placeholder="Password"/>
              </div>
              <div class="form-group">
              <input type="password" class="form-control" id="repwd" name="repassword" placeholder="Retype Password"/>
              </div>
              <div class="form-group">
                <br />
                <button  class="btn btn-primary form-control" name="signup1">
                  <i class="fa fa-sign-in" aria-hidden="true" ></i>
                  Sign Up
                </button>
              </div>
              <div class="form-group">
                
                <small id="helpId" class="text-muted"
                  >Already have an account?
                  <a href="login.php">
                    Sign In
                  </a></small
                >
              </div>
            </div>
          </form>
        <div class="container col-sm-3"></div>
      </div>
    </div>
  </body>
</html>
