<!DOCTYPE html>
<html>

    <head>
        <title>
            Amar Blog &nbsp|&nbsp Admin
        </title>

        <?php echo link_tag('design/css/bootstrap.min.css'); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://getbootstrap.com/examples/dashboard/dashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="http://cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script href="<?php echo base_url('design/js/bootstrap.min.js'); ?>"></script>
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
            #preloader{position:fixed;top:0; left:0;right:0;bottom:0;background:#ECF0F1;z-index:9999;height:100%;width:100%;}
            #status{width:920px;height:532px;position:absolute;left:50%;top:50%;margin:-266px 0 0 -460px;background:url(<?php echo base_url('/image/loading.gif'); ?>) center no-repeat;}

        </style>

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function () {
                $('#nav').load('elements/nav.html');
            });
        </script>

        <script type="text/javascript">
            // makes sure the whole site is loaded
            jQuery(window).load(function () {
                // will first fade out the loading animation
                jQuery("#status").fadeOut();
                // will fade out the whole DIV that covers the website.
                jQuery("#preloader").delay(100).fadeOut("slow");
            })
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
                        <?php echo nbs(80) ?>
                        <a class="navbar-brand" href="#"><span style="color:black;font-family:Gigi; font-size: 20px"><b>Amar Blog</b></span></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">

                        <ul class="nav navbar-nav">
                            <?php echo nbs(5) ?>
                            <li class="active"><a href="<?php echo base_url('Navbarcontroller/Dashboard'); ?>"><b><span class="glyphicon glyphicon-home"></span> <span style="font-family: Buxton Sketch;"> <b>Dashboard</b> </span></b><span class="sr-only">(current)</span></a></li>        

                        </ul>

                        <ul class="nav navbar-nav">
                            <?php echo nbs(5) ?>
                            <li class="active"><a href="<?php echo base_url('Navbarcontroller/Allusers'); ?>"><b><span class="glyphicon glyphicon-user"></span> <span style="font-family: Buxton Sketch;"> <b>All Users</b> </span></b><span class="sr-only">(current)</span></a></li>        

                        </ul>

                        <ul class="nav navbar-nav">
                            <?php echo nbs(5) ?>
                            <li class="active"><a href="<?php echo base_url('Navbarcontroller/Allposts'); ?>"><b>   <?php echo nbs(3) ?><span class="glyphicon glyphicon-th-list"></span> <span style="font-family: Buxton Sketch;"> <b>All Post</b> </span></b><span class="sr-only">(current)</span></a></li>        

                        </ul>


                        <ul class="nav navbar-nav">
                            <?php echo nbs(5) ?>
                            <li class="active"><a href="<?php echo base_url('Navbarcontroller/Newpost'); ?>"><b>   <?php echo nbs(3) ?><span class="glyphicon glyphicon-check"></span> <span style="font-family: Buxton Sketch;"> <b>New Post</b> </span></b><span class="sr-only">(current)</span></a></li>        

                        </ul>

                        <ul class="nav navbar-nav navbar-right">

                            <li><a href="<?php echo base_url('Admincontroller/Logout'); ?>"><span class="glyphicon glyphicon-off"></span> <span style="font-family: Buxton Sketch;"><b>Logout</b></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>