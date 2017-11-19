<!DOCTYPE html>
<html>

    <head>
        <title>

            Amar Blog|&nbsp; <?php echo $this->session->userdata('uname'); ?>


        </title>


        <?php echo link_tag('design/css/bootstrap.min.css'); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://getbootstrap.com/examples/dashboard/dashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="http://cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
          <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
        <script href="<?php echo base_url('design/js/bootstrap.min.js'); ?>"></script>
        <script href="<?php echo base_url('design/css/user_profile.css'); ?>"></script>
        <script href="<?php echo base_url('design/css/chat.css'); ?>"></script>
        <script href="<?php echo base_url('design/ckeditor/ckeditor.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('design/css/chat.css'); ?>">
        <style>
            .navbar-success {
                background-color: #DC143C;

            }
            .fixed{
                background-color: #DC143C;
                position:fixed;
                top:0;
                right:0px;
                left:0px;
                z-index:2000;


            }
            li a{
                color:#F8F8FF;
            }

            .error{
                color: red;
            }


            #preloader{position:fixed;top:0; left:0;right:0;bottom:0;background:#ECF0F1;z-index:9999;height:100%;width:100%;}
            #status{width:920px;height:532px;position:absolute;left:50%;top:50%;margin:-266px 0 0 -460px;background:url(<?php echo base_url('/image/loading.gif'); ?>) center no-repeat;}




            a.morelink {
                text-decoration:none;
                outline: none;
            }
            .morecontent span {
                display: none;

            }

            
            
            

        </style>


        <script type="text/javascript">
            // makes sure the whole site is loaded
            jQuery(window).load(function () {
                // will first fade out the loading animation
                jQuery("#status").fadeOut();
                // will fade out the whole DIV that covers the website.
                jQuery("#preloader").delay(10).fadeOut("slow");
            })
            $('[data-toggle=tooltip]').tooltip();

        </script>
    </head>

    <body>


        <div id="preloader">
            <div id="status"></div>
        </div>


        <nav class="navbar navbar-success">
            <div class="container-fluid">
                <div class="fixed">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><span style="color:black;font-family:Gigi; font-size: 20px"><b>Amar Blog</b></span></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                        <ul class="nav navbar-nav">
                            <?php echo nbs(5) ?>
                            <li class="active"><a href="<?php echo base_url('Usercontroller/Dashboard'); ?>"><b>   <?php echo nbs(3) ?><span class="glyphicon glyphicon-home"></span> <span style="font-family: Buxton Sketch;"> <b>Home</b> </span></b><span class="sr-only">(current)</span></a></li>        

                        </ul>

                       
                        <?= form_open('Usercontroller/Search',['class'=>'navbar-form navbar-left','role'=>'serach']) ?>
                        <!-- <form class="navbar-form navbar-left" role="search"> -->
                         <div class="form-group">
                            <input style="width:280px;" type="text" name="query" class="form-control" placeholder="Search blog"  id="navBarSearchForm" required="">
                        </div>
                       
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>

                        <?= form_close(); ?>






                        <ul class="nav navbar-nav navbar-right">

                            <li class="active"><a href="<?php echo base_url('Navbarcontroller/Addpost'); ?>"><b>   <?php echo nbs(3) ?><span class="glyphicon glyphicon-check"></span> <span style="font-family: Buxton Sketch;"> <b>New Post</b> </span></b><span class="sr-only">(current)</span></a></li>        

                            <li class="active"><a href="<?php echo base_url('Navbarcontroller/My_Notifications'); ?>"><b>   <?php echo nbs(3) ?><span class="badge badge-notify">13</span></span> <span style="font-family: Buxton Sketch;"> <b>Notifications</b> </span></b><span class="sr-only">(current)</span></a></li>        

                            <li class="active"><a href="<?php echo base_url('Navbarcontroller/My_Message'); ?>"><b>   <?php echo nbs(3) ?><span class="badge badge-notify">7</span><span style="font-family: Buxton Sketch;"> <b>Message</b> </span></b><span class="sr-only">(current)</span></a></li>        

                            <li class="active"><a href="<?php echo base_url('Navbarcontroller/My_Followers'); ?>"><b>   <?php echo nbs(3) ?><i class="fa fa-users" aria-hidden="true"></i>
                                        <span style="font-family: Buxton Sketch;"> <b>Followers</b> </span></b><span class="sr-only">(current)</span></a></li>        


                            <li><a href="<?php echo base_url('Navbarcontroller/Profile'); ?>"><?php echo nbs(3) ?><i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <span style="font-family: Buxton Sketch;"><b>Profile</b></span></a></li>

                            <li><a href="<?php echo base_url('Usercontroller/Logout'); ?>"><?php echo nbs(3) ?><span class="glyphicon glyphicon-off"></span> <span style="font-family: Buxton Sketch;"><b>Logout</b></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
