<?php $title = "Register"; ?>
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
               <h1>Register</h1><br>
                <form action="register.php" method="POST">
                    <label for="">Person</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-restroom"></i></span>
                  </div>
                    <select name="title" class="form-control">
                        <option value="mr">Mr</option>
                        <option value="ms">Ms</option>
                    </select>
                </div>
                    <label for="">First name</label>
                    <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="first_name" class="form-control" placeholder="Please enter your first name . . ." aria-label="First name" aria-describedby="basic-addon1" value="<?php if(isset($first_name)) echo $first_name;  ?>">
                </div>
                   <?php if(isset($first_name_error)): ?>
                  <p><?php echo $first_name_error; ?></p>
                  <?php endif; ?>
                   <label for="">Last name</label>
                    <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="last_name" class="form-control" placeholder="Please enter your last name . . ." aria-label="Last name..." aria-describedby="basic-addon1" value="<?php if(isset($last_name)) echo $last_name;  ?>">
                </div>
                    <?php if(isset($last_name_error)): ?>
                  <p><?php echo $last_name_error; ?></p>
                  <?php endif; ?>
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
                  <label for="">Password repeat</label>
                    <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="key"><i class="fas fa-key"></i></span>
                  </div>
                  <input type="password" id="myInput1" name="password_repeat" class="form-control" placeholder="Please repeat your password . . ." aria-label="#" aria-describedby="basic-addon1">
                    <div class="input-group-append">
                    <div class="input-group-text">
                      <input type="checkbox"  onclick="myFunction1()">
                    </div>
                  </div>  
                </div>
                <?php if(isset($password_repeat_error)): ?>
                   <p><?php echo $password_repeat_error; ?></p>
                   <?php endif; ?>
                <div class="button-group">
                    <button type="submit" class="btn btn-outline-primary w-75 mt-3">Register</button>
                <button type="reset" class="btn btn-outline-danger reset mt-3">Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php require('views/includes/bottom.php');?>