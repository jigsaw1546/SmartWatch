<style>
.modaltest1{
    font-size: 16px;
    color:black;
    margin-bottom: 0px;
}
</style>
<div class="modal fade" id="mychangepassword">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center"><?php echo $changepassword ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form class="form" method="post" action="php/changepassword_process.php" id="changepassword">
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <label for="oldpassword" class="modaltest1"><?php echo $lpassword ?></label>
                            </div>
                            
                            </div>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                </div>
                                <input type="password" class="form-control sm-1" id="oldpassword" name="oldpassword" placeholder="<?php echo $lpassword ?>" required>
                            </div>
                            <label for="password" class="modaltest1"><?php echo $NewPassword ?></label>
                           <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                </div>
                                <input type="password" class="form-control" id="npassword" name="npassword" placeholder="<?php echo $NewPassword ?>"required> 
                            </div>
                           <label for="repassword" class="modaltest1"><?php echo $gconfpass2 ?></label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                </div>
                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="<?php echo $gconfpass2 ?>"required> 
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-block mb-2"><?php echo $changepassword ?></button>
                        </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $close ?></button>
        </div>
        
      </div>
    </div>
  </div>