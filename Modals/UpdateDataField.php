<div class="modal fade" id="UpdateDataFields" tabindex="-1" role="dialog" aria-labelledby="UpdateDataFields" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Field</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">

<form id="UpdateDataFieldsFormID" onsubmit="return false">
        <div class="alert alert-success" id="UpdateDataFieldsetSuccess" role="alert" style="display: none;"></div>
        <div class="alert alert-danger" id="UpdateDataFieldsetError" role="alert" style="display: none;"></div>
<input type="hidden" value="<?php echo $_SESSION["UserID"];?>" name="UserID">
                            
                            <input type="hidden" id="Fieldid" name="Fieldid">
                          <div class="row text-center">
                            <div class="col-md-12">
                              <label>Enter Field Name : <input type="text" id="NewFieldName" name="NewFieldName" required></label>
                            </div>
                          </div>

                          <br>

                          <div class="row text-center">
                            <div class="col-md-12">
                                 <label>Select the Field Type : </label>
                                          <select id="NewFieldNameType" name="NewFieldNameType" style="border-radius: 15px;width: 185px; text-align-last:center;">
                                               <option selected="selected" disabled="disabled">Select FieldType</option>
                                                <option value="text" >Text</option>  
                                                <option value="number" >Decimal & Number</option>
                                                <option value="boolean">Bool</option>
                                          </select>
                              
                            </div>
                          </div>



      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="submit">
      </form>        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>