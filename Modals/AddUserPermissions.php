<div class="modal fade" id="AddUserPermissions" tabindex="-1" role="dialog" aria-labelledby="AddUserPermissions" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Project Permissions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">

<form id="AddUserPermissionsFormID" onsubmit="return false">
        <div class="alert alert-success" id="AddUserPermissionsSuccess" role="alert" style="display: none;"></div>
        <div class="alert alert-danger" id="AddUserPermissionsError" role="alert" style="display: none;"></div>
<input type="hidden" value="<?php echo $_SESSION["UserID"];?>" name="UserID">
                    <div class="row">
                          <div class="col-md-12 text-center">
                            
                                <label>Select the Project : </label>
                                <select id="AddPermissionsDataSetProjectSelectOptions" name="AddPermissionsDataSetProjectSelectOptions" style="border-radius: 15px;width: 203px; text-align-last:center;" required></select>
                          </div>
                    </div>
<br>
                    <div class="row">
                          <div class="col-md-12 text-center">
                            
                                <label>Select the Users : </label>
                                <select id="AddPermissionsDataSetUserSelectOptions" name="AddPermissionsDataSetUserSelectOptions" style="border-radius: 15px;width: 203px; text-align-last:center;"></select>
                          </div>
                    </div>


                    



      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Save" name="submit">
      </form>        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>