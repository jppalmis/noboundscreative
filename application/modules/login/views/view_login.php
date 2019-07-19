<!DOCTYPE html>
<html>
    <head>
        <title><?= $title;?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
        <meta name="robots" content="nofollow">
        <meta name="googlebot" content="noindex">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
        <link rel="stylesheet" href="<?= base_url('/public/css/font-awesome.min.css');?>">
        <link rel="stylesheet" href="<?= base_url('/public/css/ionicons.min.css');?>">
        <link rel="stylesheet" href="<?= base_url('/public/css/AdminLTE.min.css');?>">
        <link rel="stylesheet" href="<?= base_url('/public/css/red.css');?>">
        <link href="<?= base_url('/public/css/font-awesome.min.css');?>" rel="stylesheet">
        <link href="<?= base_url('/public/fonts/fontawesome-webfont.svg')?>" rel="font-awesome">
        <link href="<?= base_url('/public/images/fav.ico')?>" rel="shortcut icon" type="image/ico">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition login-page" style="height: 500px;">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?= base_url();?>"><img src="<?=base_url('public/images/NO_Bounds_Logo_150.png');?>" alt=""></a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Sign in</p>
                <div id="login_failed" class="alert alert-danger alert-dismissible" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                </div>
                <form id="form_login">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Username" name="input_username" id="input_username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="input_password" id="input_password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                </form>

                <a href="#">I forgot my password</a><br>
                <a href="register.html" class="text-center">Register a new membership</a>

            </div>
        </div>


        <script src="<?= base_url('/public/js/jquery-3.4.0.js');?>"></script>
        <script src="<?= base_url('/public/js/bootstrap.min.js');?>"></script>
        <script src="<?= base_url('/public/js/icheck.min.js');?>"></script>

        <script>
        $(function () {
            $('input').iCheck({
            checkboxClass: 'icheckbox_square-red',
            radioClass: 'iradio_square-red',
            increaseArea: '20%' /* optional */
            });
        });
        </script>

        <script>
            $(function(){

                $("#form_login").submit(function(e){
                    e.preventDefault();
                    var formData = new FormData($(this)[0]);
                    $.ajax({
                        url: "<?=site_url('login/verify_credentials')?>",
                        data: formData,
                        dataType: "json",
                        type: "post",
                        async: false,
                        success: function(data){
                            if(data.response == "true") {
                                // $("#formSubmit").css('display','block');
                                // alert(data.message);
                                // $onSent.unbind('submit').submit();
                                setTimeout("window.location.href='<?=site_url('dashboard')?>'",1000);
                            } else {
                                $("#login_failed").css('display','block');
                                $("#login_failed").html(data.message);
                                // $("#formSubmit").css('display','block');
                            }
                        },
                        contentType: false,
                        cache: false,
                        processData: false,
                    });
                });
            })
            
        </script>
    </body>
</html>
