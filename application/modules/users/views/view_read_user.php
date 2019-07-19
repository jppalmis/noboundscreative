<?php foreach( $UserDetails as $UD):?>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="img-responsive" src="<?= base_url("/public/images/img/user8-128x128.jpg");?>" alt="User profile picture" style="margin: 0 auto;">
                    <h3 class="profile-username text-center" style="margin-top: 2vh;"><?php echo $UD['firstname'];?> <?php echo $UD['lastname'];?></h3>
                    <p class="text-muted text-center"><?php echo $UD['role_display_name'];?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Username</b> <a class="pull-right"><?php echo $UD['username'];?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?php echo $UD['email'];?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Contact</b> <a class="pull-right"><?php echo $UD['contact'];?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Status</b> <a class="pull-right"><?php echo $UD['status'];?></a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
                    <p class="text-muted">
                        <?php if(!empty($UD['street'])):?>
                            <?php echo $UD['street'];?><br>
                        <?php endif;?>
                        <?php if(!empty($UD['city'])):?>
                            <?php echo $UD['city'].', ';?>
                        <?php endif;?>
                        <?php if(!empty($UD['province'])):?>
                            <?php echo $UD['province'];?><br>
                        <?php endif;?>
                        <?php if(!empty($UD['state'])):?>
                            <?php echo $UD['state'].', '; ?>
                        <?php endif;?>
                        <?php if(!empty($UD['state_full'])):?>
                            <?php echo $UD['state_full'];?><br>
                        <?php endif;?>
                        <?php echo $UD['zipcode'];?>
                    </p>
                    <hr>

                    <strong><i class="fa fa-clock-o margin-r-5"></i> Created at</strong>
                    <p class="text-muted"><?php echo $UD['created_at'];?><br></p>
                    <hr>

                    <?php if(!empty($UD['updated_at'])):?>
                        <strong><i class="fa fa-clock margin-r-5"></i> Updated at</strong>
                        <p class="text-muted"><?php echo $UD['updated_at'];?><br></p>
                        <hr>
                    <?php endif;?>
                    
                </div>
            </div>
        </div>
    </div>
<?php endforeach;?>