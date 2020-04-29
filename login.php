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
    <title>Login</title>
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="container col-sm-3"></div>

        <div class="container col-sm-6">
          <div class="display-4 form-group">Login</div>
          <form action="signin.php" method = "post">
            <?php
                  if(@$_GET['Empty']==true){
                ?>
                  <div class = "alert-light text-danger py-3"><?php echo $_GET['Empty']?></div>
                <?php
              }
            ?>
            <?php
                  if(@$_GET['Invalid']==true){
                ?>
                  <div class = "alert-light text-danger py-3"><?php echo $_GET['Invalid']?></div>
                <?php
              }
            ?>
            <?php

                  if(@$_GET['successful']==true){
                ?>
                  <div class = "alert-light text-success py-3"><?php echo $_GET['successful']?></div>
                <?php
              }
            ?>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="usr"
                name="username"
                placeholder="Username"
              />
            </div>
            <div class="form-group">
              <input
                type="password"
                class="form-control"
                id="pwd"
                name="password"
                placeholder="Password"
              />
              <div class="form-group">
                <br />
                <button  class="btn btn-primary form-control" name="signin">
                  <i class="fa fa-sign-in" aria-hidden="true" ></i>
                  Sign In
                </button>
              </div>
              <div class="form-group">
                <label for=""></label>

                <small id="helpId" class="text-muted"
                  >New User?
                  <a href="signup.html">
                    Sign Up
                  </a></small
                >
              </div>
            </div>
          </form>
        </div>
        <div class="container col-sm-3"></div>
      </div>
    </div>
  </body>
</html>
