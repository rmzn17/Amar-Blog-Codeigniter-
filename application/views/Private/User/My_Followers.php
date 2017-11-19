<?php include('uheader.php'); ?>


<div class="container">
    <span style="font-family: Buxton Sketch;font-size: 16px;"> 
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <h1 style="color:goldenrod">All of My Followers so far....</h1>
                <div class="table-responsive">


                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>
                        <th>Sr. No</th>
                        <th>User</th>

                        <th>View Profile</th>
                        <th>Message</th>

                        </thead>

                        <tbody>
                            <?php $index = 1; ?>
                            <?php
                            if (count($userdata->result_array())):
                                //$count = $this->uri->segment(3, 0);
                                foreach ($userdata->result_array() as $row):
                                    ?>
                                    <tr>

                                        <td> <?php echo $index++ ?></td>
                                        <?php $uname = $row['Follower_Name']; ?>
                                        <td>
                                            <h4><a href="<?php echo base_url() ?>index.php/Usercontroller/user_profile_view?uname=<?php echo $uname; ?>"style="text-decoration:none"><b><?php echo $row['Follower_Name']; ?></b></a></h4>
                                        </td>

                                        <td>

                                            <?= anchor("Usercontroller/Follower_Profile_View/{$row['Follower_Name']}", 'View Profile', array('class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'View User Full Profile', 'style' => 'font-family: Buxton Sketch;')) ?>

                                        </td>

                                        <td>

                                            <a href="#message<?php echo $row['Follower_Name']; ?>" data-toggle="modal"><button type='button' class="btn btn-primary fa fa-envelope-o"><span aria-hidden='true'></span></button></a>

                                        </td>


                                <div class="modal fade" id="message<?php echo $row['Follower_Name']; ?>" tabindex="-1" role="dialog" aria-labelledby="message" aria-hidden="true">


                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                <h4 class="modal-title custom_align" id="Heading">Send Message to &nbsp;<?php echo $row['Follower_Name']; ?></h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="alert alert-info"><h3><span class="glyphicon glyphicon-warning-sign"></span> Are you Sure you want Message <strong><?php echo $row['Follower_Name']; ?>?</h3></strong></p>
                                                </div>
                                                <div class="modal-footer ">

                                                    <?= anchor("Usercontroller/Message_User/{$row['Follower_Name']}", 'Yes', array('class' => 'btn btn-success', 'style' => 'font-family: Buxton Sketch;')) ?>

                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>

                                                </div>
                                            </div>

                                            <!-- /.modal-content --> 
                                        </div>
                                        <!-- /.modal-dialog --> 

                                    </div>
                                </div>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="1">
                                    <h3 style="color: indigo;"> You have no Follower yet....<h3>
                                            </td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>


                                        </table>


                                        </div>

                                        </div>
                                        </div>



                                        </span>
                                        </div>


                                        <center>
                                            <div class="clearfix"></div>
                                            <ul class="pagination pull-center">
                                                <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                                            </ul>
                                        </center>
                                        <?php include('ufooter.php'); ?>
