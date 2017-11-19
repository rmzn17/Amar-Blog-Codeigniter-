
<?php include('uheader.php'); ?>
<div class="container">
 
    <?php echo form_open_multipart('Usercontroller/Updateprofile', ['class'=>'form-horizontal']) ?>
    
    <span style=" font-family: Buxton Sketch;font-size: 16px">
        <h1>Edit Profile</h1>
        
        <hr>
        <div class="row">

            <!-- left column -->
            <div class="col-md-3">
                <div class="text-center">
                   <img class="img-rounded avatar avatar-original" style="-webkit-user-select:none;" src="<?php echo $Photo;?>" width="250px" height="250px">
                    <h4>Upload a different photo...</h4>

                    <input class="form-control" name="image" type="file">

                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a> 
                    <i class="fa fa-coffee"></i>
                    <span style="color:red"><b>Please do not select High resolution picture(DSLR) :P </b> </span>
                </div>
                
               
                <h3>Personal info</h3>

                <!--<form class="form-horizontal" role="form" action="">-->
                     
                    <div class="form-group">
                        <label class="col-lg-3 control-label" name="FirstName" for="focusedInput">Full name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" for="focusedInput" name="fname" value="<?php echo $Fname; ?>" type="text" required="">
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Username:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="uname" value="<?php echo $uname; ?>" type="text" disabled="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label" name="Email" for="focusedInput">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" for="focusedInput" name="email" value="<?php echo $email; ?>" type="text" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" name="Phone" for="focusedInput">Phone:</label>
                        <div class="col-lg-8">
                            <input class="form-control" for="focusedInput"name="phone" value="<?php echo $phone; ?>" type="text" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" name="Password" for="focusedInput">Password:</label>
                        <div class="col-md-8">
                            <input class="form-control" for="focusedInput"name="password" value="<?php echo $password; ?>" type="password" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" name="ConfirmPassword" for="focusedInput">Confirm password:</label>
                        <div class="col-md-8">
                            <input class="form-control" name="conpassword" value="<?php echo $password; ?>" type="password" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                               <?php echo form_submit(['name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Submit']); ?>
                         <!--<input class="btn btn-primary" value="Save Changes" type="button">-->
                            <span></span>

                            <?= anchor('Usercontroller/Profile', 'Cancel', array('class' => 'btn btn-warning', 'style' => 'font-family: Buxton Sketch;')) ?>
                           <!--<input class="btn btn-default" value="Cancel" type="reset">-->
                        </div>
                    </div>
                <!--</form>-->
            </div>
        </div>
    </span>
</div>
<hr>

<?php include('ufooter.php'); ?>