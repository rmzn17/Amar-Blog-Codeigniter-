<?php include('uheader.php'); ?>


<div class="container">
    <span style="font-family: Buxton Sketch;font-size: 16px;"> 

        <div class="row">
            <div class="col-md-9 col-md-offset-2">

                <div class="table-responsive">


                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>

                        <th><h2 style="color: goldenrod;">All Messages...<h2></th>


                                    </thead>

                                    <tbody>

                                        <?php
                                        if (count($messages->result_array())):
                                            $count = $this->uri->segment(3, 0);
                                            foreach ($messages->result_array() as $row):
                                                ?>
                                                <tr>

                                                    <td>
                                                        <?php
                                                        $noti = $row['Message'];

                                                        //$time = $row['Notification_Time'];

                                                        $seconds = strtotime(date('Y-m-d H:i:s')) - strtotime($row['Time']);

                                                        $months = floor($seconds / (3600 * 24 * 30));
                                                        $day = floor($seconds / (3600 * 24));
                                                        $hours = floor($seconds / 3600);
                                                        $mins = floor(($seconds - ($hours * 3600)) / 60);
                                                        $secs = floor($seconds % 60);

                                                        if ($seconds < 60)
                                                            $time = $secs . " seconds ago";
                                                        else if ($seconds < 60 * 60)
                                                            $time = $mins . " min ago";
                                                        else if ($seconds < 60 * 60 * 60)
                                                            $time = $hours . " hours ago";
                                                        else if ($seconds < 24 * 60 * 60 * 60 * 60)
                                                            $time = $day . " day ago";
                                                        else
                                                            $time = $months . " month ago";

                                                        // echo $time;
                                                        ?>

                                                        <h4>
                                                            <img src="https://s-media-cache-ak0.pinimg.com/originals/9d/8f/8f/9d8f8f5b00b72235b3b2f51b3913e1cd.jpg" width="50px" height="50px"alt="User Avatar" class="img-circle" />


                                                            <?php
                                                            $uname = $this->session->userdata('uname');
                                                            $name = $row['From_Username'];

                                                            if ($uname == $name) {

                                                                $name = 'Me';

                                                                echo '<span style="color:#337AB7;"> ' . $name . '</span>' . ':-';
                                                            } else {
                                                                echo '<span style="color:#337AB7;"> ' . $name . '</span>' . ':-';
                                                                ?>
                                                                <?= anchor("Usercontroller/Message_User/{$row['From_Username']}", 'Reply', array('class' => 'btn btn-success pull-right', 'data-toggle' => 'tooltip', 'title' => 'Reply This User', 'style' => 'font-family: Buxton Sketch;')); ?>
                                                                <?php
                                                            }
                                                            echo $noti;
                                                            ?></h4>
                                                        <h5 style="color: #337AB7;"> <?php echo $time; ?></h5>
                                                    </td>



                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="1">
                                                    <h3 style="color: indigo;"> You have no message yet....<h3>
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

