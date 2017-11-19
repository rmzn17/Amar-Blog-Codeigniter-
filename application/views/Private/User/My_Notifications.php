<?php include('uheader.php'); ?>


<div class="container">
    <span style="font-family: Buxton Sketch;font-size: 16px;"> 

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="table-responsive">


                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>

                        <th><h2 style="color: goldenrod;">Notifications<h2></th>


                                    </thead>

                                    <tbody>

                                        <?php
                                        if (count($notifications->result_array())):
                                            $count = $this->uri->segment(3, 0);
                                            foreach ($notifications->result_array() as $row):
                                                ?>
                                                <tr>

                                                    <td>
                                                        <?php
                                                        $noti = $row['Notification'];

                                                        //$time = $row['Notification_Time'];

                                                        $seconds = strtotime(date('Y-m-d H:i:s')) - strtotime($row['Notification_Time']);

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
                                                        <h3 style="color: indigo;"> <?php echo $noti ?></h3>
                                                        <h5 style="color: #337AB7;"> <?php echo $time; ?></h5>
                                                    </td>



                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="1">
                                                    <h3 style="color: indigo;"> You have no notification yet....<h3>
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
