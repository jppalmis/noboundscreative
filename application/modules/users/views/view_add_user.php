<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Add User</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div id="form_add_user_response" style="display: none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i></h4>
                            </div>
                        </div>

                        <form id="form_add_user" role="form">
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputFirstname">First Name</label>
                                        <input type="text" class="form-control input-sm" name="inputFirstname" id="inputFirstname">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputLastname">Last Name</label>
                                        <input type="text" class="form-control input-sm" name="inputLastname" id="inputLastname">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Email Address</label>
                                        <input type="email" class="form-control input-sm" name="inputEmail" id="inputEmail">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputContactNumber">Contact Number</label>
                                        <input type="text" class="form-control input-sm" name="inputContactNumber" id="inputContactNumber">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputRole">Role</label>
                                        <select class="form-control input-sm" name="inputRole" id="inputRole">
                                            <option selected disabled></option>
                                            <option value="1">Super Admininstrator</option>
                                            <option value="2">Administrator</option>
                                            <option value="3">Normal User</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUsername">Username</label>
                                        <input type="text" class="form-control input-sm" name="inputUsername" id="inputUsername">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" class="form-control input-sm" name="inputPassword" id="inputPassword">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                        <input type="password" class="form-control input-sm" name="inputPasswordConfirm" id="inputPasswordConfirm">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer pull-right">
                                <button type="reset" class="btn btn-warning"><i class="fa  fa-eraser"></i> Clear</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Create User</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


<script>
$(function(){
	$("#form_add_user").submit(function(e){
	e.preventDefault();
	//alert(e);
	var formAddUser = new FormData($(this)[0]);
	$("#form_add_user_response").css('display','none');
		$.ajax({
			url: "<?=site_url('users/CreateUser')?>",
			data: formAddUser,
			dataType: "json",
			type: "post",
			async: false,
			success: function(data){

				if(data.response == "false") {
					$("#form_add_user_response").removeClass('alert alert-success').addClass('alert alert-danger').html(data.message).slideDown('fast');
				} else {
                    $("#form_add_user_response").removeClass('alert alert-danger').addClass('alert alert-success').html(data.message).slideDown('fast');
					$("#inputFirstname").val('');
                    $("#inputLastname").val('');
                    $("#inputEmail").val('');
                    $("#inputContactNumber").val('');
                    $("#inputUsername").val('');
                    $("#inputPassword").val('');
                    $("#inputPasswordConfirm").val('');
                }
			},
			contentType: false,
			cache: false,
			processData: false,
		});
	});

})
</script>