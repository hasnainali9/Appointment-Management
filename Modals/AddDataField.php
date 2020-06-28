<div class="modal fade" id="AddDataFields" tabindex="-1" role="dialog" aria-labelledby="AddDataFields" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">

<form id="AddDataFieldsFormID" onsubmit="return false">
        <div class="alert alert-success" id="AddDataFieldsetSuccess" role="alert" style="display: none;"></div>
        <div class="alert alert-danger" id="AddDataFieldsetError" role="alert" style="display: none;"></div>
<input type="hidden" value="<?php echo $_SESSION["UserID"];?>" name="UserID">
                          <div class="row text-center">
                            <div class="col-md-12">
                                 <label>Select the Project : </label>
                                          <select  id="AddDataFieldsSelectOptions" name="AddDataFieldsSelectOptions" style="border-radius: 15px;width: 203px; text-align-last:center;"></select>
                              
                            </div>
                          </div>
                          <br>

                          <div class="row text-center">
                            <div class="col-md-12">
                              <label>Enter Field Name : <input type="text" id="FieldName" name="FieldName"></label>
                            </div>
                          </div>

                          <br>

                          <div class="row text-center">
                            <div class="col-md-12">
                                 <label>Select the Field Type : </label>
                                          <select id="FieldNameType" name="FieldNameType" style="border-radius: 15px;width: 185px; text-align-last:center;">
                                               <option selected="selected" disabled="disabled">Select FieldType</option>
                                                <option value="text" >Text</option>  
                                                <option value="number" >Decimal & Number</option>
                                          </select>
                              
                            </div>
                          </div>
<br>
                             <div class="row text-center">
                            <div class="col-md-12">

                                  <hr><h5>Current Fields</h5><hr>

                                    <table class="table">
                              <thead class="thead-light">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Field Name</th>
                                  <th scope="col">Field type</th>
                                </tr>
                              </thead>
                              <tbody id="TableData"></tbody>
</table>
                            </div></div>




      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="submit">
      </form>        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>