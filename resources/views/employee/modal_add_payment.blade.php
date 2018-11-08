 <div class="container">
   <div class="row">`
      <div class="col-md-12">

        <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Payment</h4>
          </div>
          <div class="modal-body">

                <form method="POST" action="{{url('/payment')}}">
                  {{csrf_field()}}
                  <input type="hidden" name="empid" value="{{$employee->id}}">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Date</label>
                      <input type="text" name="pdate" class="form-control datepicker" required autocomplete="off">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Type</label>
                      <select name="type" class="form-control" required>
                        <option value="Salary">Salary</option>
                        <option value="Payment" selected>Payment</option>
                        <option value="Others">Others</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Description</label>
                      <input type="text" name="description" class="form-control">
                    </div>
                    
                    </div>

                    <div class="row">
                    <div class="form-group col-md-3">
                      <label>Issue</label>
                      <input type="text" name="credit" class="form-control" value="0">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Payment</label>
                      <input type="text" name="debit" class="form-control" value="0">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <button type="submit" class="btn btn-success">Save</button>
                    </div>
                  </div>
                  
                </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>  
      </div>
    </div>

     
      </div>
   </div>
   
 </div>
 