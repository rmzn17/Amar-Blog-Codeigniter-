<html>

    <head>

        <?php echo link_tag('design/css/bootstrap.min.css'); ?>

        <script href="<?php echo base_url('design/js/bootstrap.min.js'); ?>"></script>
        <style>
            .error{
                color: red;
            }
        </style>
    </head>

    <?php include 'header.php'; ?>


    <div class="container">
        <?php echo form_open('Maincontroller/registration'); ?>
        <div style="margin:1% 0% 0% 2%;">
            <fieldset>
                <span style="font-family: Buxton Sketch; font-size: 17px">
                <legend><span style="color:DodgerBlue;margin:0% 0% 0% 0%;">Register to 'Amarblog'</span></legend>
                <div style="margin:0% 0% 0% 15%;">
                    <div class="row">
                        <div class=" form-group  col-lg-12">
                            <label class="control-label col-lg-2 " for="focusedInput"><span style="color:green">Full Name &nbsp </span> <span class="glyphicon glyphicon-hand-right"></span></label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="focusedInput" name="fname" placeholder="Your Full Name" value="<?php echo set_value('fname'); ?>"   >
                            </div>
                            <div class="col-lg-5">

                                <?php echo form_error('fname', '<p class="error">', '</p>'); ?>
                            </div>

                        </div>
                    </div>
                   
                    <div class="row">
                        <div class=" form-group col-lg-12">
                            <label class="control-label col-lg-2 " for="focusedInput"><span style="color:green">User Name&nbsp </span> <span class="glyphicon glyphicon-hand-right"></span></label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="focusedInput" name="uname" value="<?php echo set_value('uname'); ?>" placeholder="Your User Name" >
                            </div>
                            <div class="col-lg-5">
                                <?php echo form_error('uname', '<p class="error">', '</p>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" form-group col-lg-12">
                            <label class="control-label col-lg-2 " for="focusedInput"><span style="color:green">Password&nbsp </span> <span class="glyphicon glyphicon-hand-right"></span></label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" id="focusedInput" name="password" value="<?php echo set_value('password'); ?>" placeholder="Your Password" >
                            </div>
                            <div class="col-lg-5">
                                <?php echo form_error('password', '<p class="error">', '</p>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" form-group col-lg-12">
                            <label class="control-label col-lg-2 " for="focusedInput"><span style="color:green">Confirm &nbsp </span> <span class="glyphicon glyphicon-hand-right"></span></label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" id="focusedInput" name="conpassword" value="<?php echo set_value('conpassword'); ?>" placeholder="Confirm Password" >
                            </div>
                            <div class="col-lg-5">
                                <?php echo form_error('conpassword', '<p class="error">', '</p>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" form-group col-lg-12">
                            <label class="control-label col-lg-2 " for="focusedInput"><span style="color:green">Email&nbsp </span> <span class="glyphicon glyphicon-hand-right"></span></label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="focusedInput" name="email" value="<?php echo set_value('email'); ?>" placeholder="Your Email" >
                            </div>
                            <div class="col-lg-5">
                                <?php echo form_error('email', '<p class="error">', '</p>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" form-group col-lg-12">
                            <label class="control-label col-lg-2 " for="focusedInput"><span style="color:green">Phone&nbsp </span> <span class="glyphicon glyphicon-hand-right"></span></label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="focusedInput" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Your Phone Number" >
                            </div>
                            <div class="col-lg-5">

                                <?php echo form_error('phone', '<p class="error">', '</p>'); ?>
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class=" form-group col-lg-12">
                            <label class="control-label col-lg-2 " for="focusedInput"><span style="color:green">DOB&nbsp </span> <span class="glyphicon glyphicon-hand-right"></span></label>
                            <div class="col-lg-5">
                                <input type="date" class="form-control" id="focusedInput" name="dob" value="<?php echo set_value('lname'); ?>" >
                            </div>
                            <div class="col-lg-5">
                                <?php echo form_error('lname', '<p class="error">', '</p>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="col-lg-2 control-label"><span style="color:green">Gender&nbsp </span> <span class="glyphicon glyphicon-hand-right"></span></label>
                            <div class="col-lg-5">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="optionsRadios1" value="male" checked="" >
                                        Male
                                    </label>         

                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="optionsRadios1" value="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <?php echo form_reset(['name' => 'reset', 'class' => 'btn btn-warning', 'value' => 'Reset']); ?>
                                <!--<button type="reset" class="btn btn-default">Cancel</button>-->
                                <?php echo form_submit(['name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Submit']); ?>
                                <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                            </div>
                        </div>
                    </div>
                </div>
                </span>
            </fieldset>
        </div>
    </form>
</div>
<?php include 'footer.php'; ?>