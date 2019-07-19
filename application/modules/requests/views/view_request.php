<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Request Lists</h3>

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
                    <?php if($request_lists):?>
                        <tr>
                            <th>ID</th>
                            <th>Business Name</th>
                            <th>Business Email</th>
                            <th>Nature of Business</th>
                            <th>Target Customers</th>
                            <th>Actions</th>
                        </tr>

                        <?php foreach($request_lists as $rq):?>
                            <tr>
                                <td><?= $rq['id'];?></td>
                                <td><?= $rq['business_name'];?></td>
                                <td><?= $rq['business_email'];?></td>
                                <td><?= $rq['what_do_they_do'];?></td>
                                <td><?= $rq['target_customers'];?></td>
                                <td>
                                    <a href="" id="btn_read<?php echo $rq['id']?>"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_request_details"><i class="fa fa-eye"></i></button></a>
                                    <a href="" id="btn_update<?php echo $rq['id']?>"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_request_details_edit"><i class="fa fa-edit"></i></button></a>
                                    <button id="btn_delete_notif<?php echo $rq['id']?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="modal_request_details">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Request Details</h4>
                                        </div>
                                        <div class="modal-body" id="request_details">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal_request_details_edit">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Edit Request Details</h4>
                                            </div>
                                            
                                            <div class="modal-body" id="request_details_edit">
                                            </div>
                                            
                                            
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal_request_details_delete<?php echo $rq['id']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete Request</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete <?= $rq['business_name'];?> request ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">No</button>
                                            <button id="btn_delete<?php echo $rq['id']?>" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function(){
                                    $('#btn_read<?php echo $rq['id']?>').on('click', function(){
                                        $.ajax({
                                            url: "<?=site_url('requests/ReadRequest')?>",
                                            data:{ requestID : '<?=$rq['id'];?>' },
                                            type: "post",
                                            success: function(data)
                                            {
                                                $("#modal_request_details").modal('show');
                                                $("#request_details").html(data);
                                            }
                                        })
                                        return false;
                                    });
                                })

                                $(document).ready(function(){
                                    $('#btn_update<?php echo $rq['id']?>').on('click', function(){
                                        $.ajax({
                                            url: "<?=site_url('requests/ReadRequestForEditing')?>",
                                            data:{ requestID : '<?=$rq['id'];?>' },
                                            type: "post",
                                            success: function(data)
                                            {
                                                $("#modal_request_details_edit").modal('show');
                                                $("#request_details_edit").html(data);
                                            }
                                        })
                                        return false;
                                    });
                                })

                                $(document).ready(function(){
                                    $('#btn_delete_notif<?php echo $rq['id']?>').on('click', function(){
                                        $("#modal_request_details_delete<?php echo $rq['id']?>").modal('show');
                                    });
                                })

                                $(document).ready(function(){
                                    $('#btn_delete<?php echo $rq['id']?>').on('click', function(){
                                        $("#modal_request_details_delete<?php echo $rq['id']?>").modal('hide');
                                        $.ajax({
                                            url: "<?=site_url('requests/DeleteRequest')?>",
                                            data:{ requestID : '<?=$rq['id'];?>' },
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