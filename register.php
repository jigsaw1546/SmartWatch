 <!-- The Modal -->
 <div class="modal fade" id="mySignup">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><?php echo $signup?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            
        <form class="form col-12" id="formRegister" method="post" action="php/register_process.php">
              <div class="input-group mb-2 mr-sm-2  ">
                  <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                  </div>
                  <input type="text" class="form-control " id="mem_fname" name="mem_fname" placeholder="<?php echo $gname?>">
                  <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                  </div>
                  <input type="text" class="form-control" id="mem_lname" name="mem_lname" placeholder="<?php echo $glname?>">
              </div>

              <div class="input-group mb-2 mr-sm-2">
                  <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-at"></i></div>
                  </div>
                  <input type="email" class="form-control" id="mem_email" name="mem_email" placeholder="<?php echo $gemail?>">
                  <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-phone"></i></div>
                  </div>
                  <input type="text" class="form-control" id="mem_tel" name="mem_tel" placeholder="<?php echo $gtel?>">
              </div>

              <div class="input-group mb-2 mr-sm-2">
                  <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                  </div>
                  <input type="text" class="form-control" id="mem_username" name="mem_username" placeholder="<?php echo $lusername?>">
              </div>

              <div class="input-group mb-2 mr-sm-2">
                  <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-key"></i></div>
                  </div>
                  <input type="password" class="form-control" id="mem_password" name="mem_password" placeholder="<?php echo $lpassword?>">
              </div>

              <div class="input-group mb-2 mr-sm-2">
                  <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-key"></i></div>
                  </div>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="<?php echo $gconfpass?>">
              </div>


              <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-text"><i class="fas fa-address-card size-7"></i></i></div>
                <textarea name="mem_address" rows="3" class="form-control"></textarea>
              </div>


              <div class="form-group mb-2 mr-sm-2">
                  <center>  
                    <!-- localhost-》6LeaDNoUAAAAAED1fOQQkl9VrcwT2ZxB_sKgs7X4 -->
                    <!-- worawin。tk -》6LezDdoUAAAAAKzer766-7kq-7rCZ1A2V18TkPRC -->
                      <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LezDdoUAAAAAKzer766-7kq-7rCZ1A2V18TkPRC"></div>
                  </center>
              </div>

              <button type="submit" name="submit" disabled id="submit" class="btn btn-success btn-block mb-2"><?php echo $signup?></button>
              <span class="float-right"><?php echo $signin?><a href="login.php" data-toggle="modal" data-target="#mySignin" data-dismiss="modal"><?php echo $click?></span></a>
              </form>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $close?></button>
        </div>
        
      </div>
    </div>
  </div>

   