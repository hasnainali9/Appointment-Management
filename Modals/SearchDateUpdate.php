<div class="modal fade" id="UpdateModalDateForSearchRescheduled" tabindex="-1" role="dialog" aria-labelledby="UpdateModalDateForSearchRescheduled" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Rescheduled Date</h5>
      </div>
      <div class="modal-body">
     

<form id="UpdateDateForSearchRescheduled" onsubmit="return false">
<br>
 <div class="alert alert-success text-center" id="UpdateDateForSearchRescheduledSuccess" role="alert" style="display: none;"></div>
<div class="alert alert-danger text-center" id="UpdateDateForSearchRescheduledError" role="alert" style="display: none;"></div>
<input type="hidden" name="recordId" id="RecordIDUpdateDateForSearchRescheduled">
<input type="hidden" name="status" value="Rescheduled">
                    <div class="row">
                      <div class="col-md-12 text-center">
                      <label>Enter the New Date : <input type="text" id="NewDateForSearchRescheduled" name="NewDateForSearchRescheduled" required></label>
                    </div>
                    </div>






      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Update" name="submit">
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
	$('#NewDateForSearchRescheduled').datetimepicker({minDate: 0});
});

</script>