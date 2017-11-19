<?php include('aheader.php'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<div class="container">
    <span style="font-family: Buxton Sketch;font-size: 16px;"> 
        <div class="row">
            <div class="col-md-12">
                <h1>All Userlist so far....</h1>
                <div class="table-responsive">


                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>
                        <th>Photo</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Gender</th>
                        <th>Join Date</th>
                        <th>Message</th>

                        <th>Delete</th>
                        </thead>

                        <tbody>
                            <?php foreach ($userdata->result_array() as $row): ?>
                                <tr>

                                    <td><img class="img-circle avatar avatar-original" style="-webkit-user-select:none;" src="<?php echo $row['Photo']; ?>" width="50px" height="50px"></td>
                                    <td><?php echo $row['FirstName']; ?></td>
                                    <td><?php echo $row['UserName']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['Phone']; ?></td>
                                    <td><?php echo $row['Gender']; ?></td>
                                    <td><?php echo $row['Joindate']; ?></td>

                                    <td>

                                        <a href="#message<?php echo $row['UserName']; ?>" data-toggle="modal"><button type='button' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button></a>

                                    </td>

                                    <td>
                                        <a href="#delete<?php echo $row['UserName']; ?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>

                                    </td>


                            <div class="modal fade" id="message<?php echo $row['UserName']; ?>" tabindex="-1" role="dialog" aria-labelledby="message" aria-hidden="true">


                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                            <h4 class="modal-title custom_align" id="Heading">Send Message to &nbsp;<?php echo $row['FirstName']; ?></h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="alert alert-info"><h3><span class="glyphicon glyphicon-warning-sign"></span> Are you Sure you want Message <strong><?php echo $row['FirstName']; ?>?</h3></strong></p>
                                            </div>
                                            <div class="modal-footer ">

                                                <?= anchor("Admincontroller/user_message/{$row['UserName']}", 'Yes', array('class' => 'btn btn-success', 'style' => 'font-family: Buxton Sketch;')) ?>

                                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>

                                            </div>
                                        </div>

                                        <!-- /.modal-content --> 
                                    </div>
                                    <!-- /.modal-dialog --> 

                                </div>
                            </div>


                            <div class="modal fade" id="delete<?php echo $row['UserName']; ?>" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">

                                <div class="modal-dialog">


                                    <?php echo form_open('Admincontroller/user_delete'); ?>

                                    <input type="hidden" name="delete_user" value="<?php echo $row['UserName']; ?>">


                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="alert alert-danger"><h3><span class="glyphicon glyphicon-warning-sign"></span> Are you Sure you want Delete <strong><?php echo $row['FirstName']; ?>?</h3></strong></p>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>


                                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content --> 
                                </div>
                                <!-- /.modal-dialog --> 

                                <?php form_close(); ?>

                            </div>


                            </tr>
                        <?php endforeach; ?>
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
<?php include('afooter.php'); ?>