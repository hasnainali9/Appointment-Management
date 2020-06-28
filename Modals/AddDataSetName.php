<div class="modal fade" id="AddDataSetName" tabindex="-1" role="dialog" aria-labelledby="AddDataSetName" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div class="alert alert-success" id="DatasetNameSuccess" role="alert" style="display: none;"></div>
        <div class="alert alert-danger" id="DatasetNameError" role="alert" style="display: none;"></div>
       <form id="AddDataSetNameForm" onsubmit="return false">

            <div class="row text-center">
              <div class="col-md-12">
                <input type="hidden" value="<?php echo $_SESSION["UserID"];?>" name="UserID">
              <label>Enter Project Name : <input type="text" name="DatasetName" id="DatasetName" name=""></label></div>
            </div>
           
              
         



      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="insertINTOdataset">
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>