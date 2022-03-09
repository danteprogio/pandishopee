<!-- change password modals -->
<div tabindex="-1" class="modal bs3-changepass-modal-sm" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form action="./php/update_info.php" method="post">
            <div class="modal-content">
            <div class="modal-header"><h4>Change Password <i class="fa fa-key"></i></h4></div>
            <div class="modal-body">
                <div class="col">
                    <div id="old_pass_checker"></div>
                    <label for="old_pass" class="form-label">Enter your password</label>
                    <input type="password" class="form-control" name="old_pass" id="old_pass" value="" onkeyup="oldpassword_checker();" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" require >   
                </div>
                <hr>
                <div class="col">
                    <label for="n_pass" class="form-label">Enter New Password</label>
                    <input type="password" class="form-control" name="n_pass" id="n_pass" value="" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" disabled require > 
                </div>
                <div class="col">
                    <label for="cn_pass" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="cn_pass" id="cn_pass" value="" onkeyup="confirm_pass();" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" disabled require > 
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="save_new_pass" id="save_new_pass" class="btn btn-danger"  value="Save" disabled>
            </div>
            </div>
        </form> 
    </div>
</div>