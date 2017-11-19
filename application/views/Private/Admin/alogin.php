
<html>

    <head>

        <?php echo link_tag('design/css/bootstrap.min.css'); ?>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script href="<?php echo base_url('design/js/bootstrap.min.js'); ?>"></script>
        <style>
            body {
                background-color: white;

            }

            #loginbox {
                margin-top: 30px;
            }

            #loginbox > div:first-child {        
                padding-bottom: 10px;    
            }

            .iconmelon {
                display: block;
                margin: auto;
            }

            #form > div {
                margin-bottom: 25px;
            }

            #form > div:last-child {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .panel {    
                background-color: transparent;
            }

            .panel-body {
                padding-top: 30px;
                background-color: rgba(2555,255,255,.3);
            }

            #particles {
                width: 100%;
                height: 100%;
                overflow: hidden;
                top: 0;                        
                bottom: 0;
                left: 0;
                right: 0;
                position: absolute;
                z-index: -2;
            }

            .iconmelon,
            .im {
                position: relative;
                width: 150px;
                height: 150px;
                display: block;
                fill: #525151;
            }

            .iconmelon:after,
            .im:after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        </style>



    </head>

    <body>
  <br>  <br>
      <span style=" font-family: Buxton Sketch; text-align: center">
          <h1>
             Private Admin Login                                             
          </h1>
    </span>
        <br>
    
        <div class="container">    

            <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 


                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title text-center"><span style="font-family: Forte;"> Login to Amar Blog as Admin</span></div>
                    </div>     

                    <div class="panel-body" >

                        <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">

                            <?php echo form_open('Admincontroller/iamramzanlogin'); ?>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <span style="font-family: Buxton Sketch;">
                                    <input id="user" type="text" class="form-control" name="aname" value="" placeholder="Username" required="">                                        
                                </span>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <span style="font-family: Buxton Sketch;">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="">
                                </span>
                            </div>                                                                  

                            <div class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> <span style="font-family: Buxton Sketch;">Log in</span></button>                          
                                </div>
                            </div>

                        </form>     

                    </div>                     
                </div>  
            </div>
        </div>

        <?php include('afooter.php'); ?><?php
        /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

