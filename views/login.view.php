<?php $title = "Login"; ?>
<?php require('views/includes/head.php');  ?>
<?php require('views/includes/top_header.php'); ?>

<style>
      body {
          background: #f0f2f5;
      }

      input::placeholder {
    font-style: italic;
}
</style>
   <div class="container">
    <div class="row mt-5">
        <div class="col-md-8 offset-2">
            <div class="form-group">
               <h1>Login</h1><br>
                <form action="login.php" method="POST">
                  <label for="">Email</label>
                    <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open"></i></span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Please enter your email . . ." aria-label="#" aria-describedby="basic-addon1" value="<?php if(isset($email)) echo $email; ?>">
                </div>
                   <?php if(isset($email_error)): ?>
                  <p><?php echo $email_error; ?></p>
                  <?php endif; ?>
                   <label for="">Password</label>
                    <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="input"><i class="fas fa-key"></i></span>
                  </div>
                  <input type="password" id="myInput" name="password" class="form-control" placeholder="Please enter your password . . ." aria-label="#" aria-describedby="basic-addon1">
                    <div class="input-group-append">
                    <div class="input-group-text">
                      <input type="checkbox"  onclick="myFunction()">
                    </div>
                  </div> 
                </div>
                     <?php if(isset($password_error)): ?>
                   <p><?php echo $password_error; ?></p>
                   <?php endif; ?>
                   <?php if(isset($wrong_password_or_email)): ?>
                   <p><?php echo $wrong_password_or_email; ?></p>
                   <?php endif; ?>
                <div class="button-group">
                    <button type="submit" class="btn btn-outline-success w-75 mt-3">Login</button>
                <button type="reset" class="btn btn-outline-danger reset mt-3">Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php require('views/includes/bottom.php');  ?>