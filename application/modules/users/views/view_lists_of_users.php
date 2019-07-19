<div class="row">
    <div class="col-xs-12">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">User Lists</h3>

                <!--*********************************** SEARCH TABLE *********************************** -->
                <!-- <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div> -->

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <?php if($user_lists):?>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>

                        <?php foreach($user_lists as $ul):?>
                            <tr>
                                <td><?= $ul['user_id'];?></td>
                                <td><?= $ul['username'];?></td>
                                <td><?= $ul['email'];?></td>
                                <td><?= $ul['contact'];?></td>
                                <td><?= $ul['role_display_name'];?></td>
                                <td>
                                    <a href="" id="btn_read<?php echo $ul['user_id']?>"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_user_details"><i class="fa fa-eye"></i></button></a>
                                    <a href="" id="btn_update<?php echo $ul['user_id']?>"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_user_details_edit"><i class="fa fa-edit"></i></button></a>
                                    <button id="btn_delete_notif<?php echo $ul['user_id']?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="modal_user_details">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">User Details</h4>
                                        </div>
                                        <div class="modal-body" id="user_details" style="background: #fbfbfb;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal_user_details_edit">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Edit User Details</h4>
                                            </div>
                                            
                                            <div class="modal-body" id="user_details_edit">
                                            </div>
                                            
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal_user_details_delete<?php echo $ul['user_id']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete <?= $ul['business_name'];?> user ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">No</button>
                                            <button id="btn_delete<?php echo $ul['user_id']?>" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function(){
                                    $('#btn_read<?php echo $ul['user_id']?>').on('click', function(){
                                        $.ajax({
                                            url: "<?=site_url('users/ReadUser')?>",
                                            data:{ userID : '<?=$ul['user_id'];?>' },
                                            type: "post",
                                            success: function(data)
                                            {
                                                $("#modal_user_details").modal('show');
                                                $("#user_details").html(data);
                                            }
                                        })
                                        return false;
                                    });
                                })

                                $(document).ready(function(){
                                    $('#btn_update<?php echo $ul['user_id']?>').on('click', function(){
                                        $.ajax({
                                            url: "<?=site_url('users/ReadUserForEditing')?>",
                                            data:{ userID : '<?=$ul['user_id'];?>' },
                                            type: "post",
                                            success: function(data)
                                            {
                                                $("#modal_user_details_edit").modal('show');
                                                $("#user_details_edit").html(data);
                                            }
                                        })
                                        return false;
                                    });
                                })

                                $(document).ready(function(){
                                    $('#btn_delete_notif<?php echo $ul['user_id']?>').on('click', function(){
                                        $("#modal_user_details_delete<?php echo $ul['user_id']?>").modal('show');
                                    });
                                })

                                $(document).ready(function(){
                                    $('#btn_delete<?php echo $ul['user_id']?>').on('click', function(){
                                        $("#modal_user_details_delete<?php echo $ul['user_id']?>").modal('hide');
                                        $.ajax({
                                            url: "<?=site_url('users/DeleteUser')?>",
                                            data:{ userID : '<?=$ul['user_id'];?>' },
                                            type: "post",
                                            success: function(data)
                                            {
                                                location.reload();
                                            }
                                        })
                                        return false;
                                    });
                                })

                            </script>

                        <?php endforeach;?>
                    
                    <!-- If no request available or the table is empty. This avoid "Undefined index..." error -->
                    <?php else:?>
                        <div class="box-body">
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                No Request Available.
                            </div>
                        </div>
                    <?php endif;?>

                </table>
            </div>
            <!-- /.box-body -->

            <!--*********************************** PAGINATION *********************************** -->
            <div class="box-footer clearfix">
                <?= $links; ?>
            </div>

        </div>
        <!-- /.box -->
    </div>
</div>