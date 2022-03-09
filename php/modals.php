<!-- delete address modals -->

<div tabindex="-1" class="modal bs-<?php echo $address['Id'] ?>-modal-sm" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header"><h4>Delete Address <i class="fa fa-trash"></i></h4></div>
        <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to Delete this Address?</div>
        <div class="modal-footer ">
            <form action="./php/delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $address['Id'] ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="del_address" class="btn btn-danger"  value="Delete">
            </form>
        </div>
        </div>
    </div>
</div>


