<div class="modal fade" id="EditDataSetName" tabindex="-1" role="dialog" aria-labelledby="EditDataSetName" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
<form id="EditDataSetNameFormID" onsubmit="return false">
<br>

 <div class="alert alert-success text-center" id="EditDatasetNameSuccess" role="alert" style="display: none;"></div>
<div class="alert alert-danger text-center" id="EditDatasetNameError" role="alert" style="display: none;"></div>
                    <div class="row">
                          <div class="col-md-12 text-center">
                            <input type="hidden" value="<?php echo $_SESSION["UserID"];?>" name="UserID">
                                <label>Select the Project : </label>
                                <select id="EditDataSetNameSelectOptions" name="EditDataSetNameSelectOptions" style="border-radius: 15px;width: 203px; text-align-last:center;"></select>
                          </div>
                    </div>

<br>
                    <div class="row">
                      <div class="col-md-12 text-center">
                      <label>Enter the New Project Name : <input type="text" id="NewProjectNameID" name="NewProjectNameID"></label>
                    </div>
                    </div>






      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Update" name="submit">
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>