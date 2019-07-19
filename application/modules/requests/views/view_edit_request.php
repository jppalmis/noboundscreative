<?php foreach( $RequestDetails as $RD):?>
    <form id="edit_request_details<?php echo $RD['id']?>">
        <div class="box-body">
            <input type="hidden" name="requestID" id="requestID" value="<?php echo $RD['id'];?>">

            <div class="form-group">
                <label for="inputBusinessName">Business Name</label>
                <input type="text" class="form-control" name="inputBusinessName" id="inputBusinessName" value="<?php echo $RD['business_name'];?>">
            </div>
            <div class="form-group">
                <label for="inputBusinessEmail">Business Email</label>
                <input type="email" class="form-control" name="inputBusinessEmail" id="inputBusinessEmail" value="<?php echo $RD['business_email'];?>">
            </div>
            <div class="form-group">
                <label for="textareaWhatDoYouDo">What do you do?</label>
                <textarea class="form-control" rows="3" name="textareaWhatDoYouDo" id="textareaWhatDoYouDo"><?php echo $RD['what_do_they_do'];?></textarea>
            </div>
            <div class="form-group">
                <label for="inputTargetCustomers">Target Customers</label>
                <input type="text" class="form-control" name="inputTargetCustomers" id="inputTargetCustomers" value="<?php echo $RD['target_customers'];?>">
            </div>
            <div class="form-group">
                <label for="textareaProductServices">Why should they buy your product/service rather than from a competitor?</label>
                <textarea class="form-control" rows="3" name="textareaProductServices" id="textareaProductServices"><?php echo $RD['product_services_reason'];?></textarea>
            </div>
            <div class="form-group">
                <label for="inputPaymentMethod">How can they pay you?</label>
                <input type="text" class="form-control" name="inputPaymentMethod" id="inputPaymentMethod" value="<?php echo $RD['payment_method'];?>">
            </div>
            <div class="form-group">
                <label for="inputHelpNeeded">Help Needed?</label>
                <input type="text" class="form-control" name="inputHelpNeeded" id="inputHelpNeeded" value="<?php echo $RD['help_needed'];?>">
            </div>
        </div>

        <div id="form_edit_response" style="display: none;">
        </div>

        <div class="modal-footer">
            <button id="btn_edit_submit" type="submit" class="btn btn-warning pull-left">Save</button>
            <button id="btn_edit_close" type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>                                  
        </div>
       
    </form>

    <script>
        $(document).ready(function(){
            $('#edit_request_details<?php echo $RD['id']?>').submit(function(e){
                $('#form_edit_response').empty();
                e.preventDefault();
                var formEdit = new FormData($(this)[0]);
                $.ajax({
                    url: "<?=site_url('requests/EditRequest')?>",
                    data: formEdit,
                    dataType: "json",
                    type: "post",
                    async: false,
                    success: function(data)
                    {
                        if(data.response == 'false')
                        {
                            alert(data.message);
                        } else {
                            $('#form_edit_response').css('display', 'block').append('<h4><i class="icon fa fa-check"></i>'+data.message+'</h4>').addClass('alert alert-success').delay(3200).fadeOut(300);;
                            // location.reload();
                        }
                    },
                    processData: false,
                    contentType: false,
                })
                return false;
            });

            $('#btn_edit_close').on('click',function(e){
                location.reload();
            });
        })
    </script>

<?php endforeach;?>