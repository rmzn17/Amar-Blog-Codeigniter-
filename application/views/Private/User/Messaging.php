

<html>
    <head>
        <style>

            .panel-body
            {
                overflow-y: scroll;
                height: 370px;
            }

        </style>

    </head>
</html>
<?php include('uheader.php'); ?>
<div class="container">

    <span style=" font-family: Buxton Sketch;">
        <div class="row">
            <div class="col-md-7 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-comment"></span>   <span style="font-size:20px;color: goldenrod;">Chat with...</span>

                        <div class="panel-body">
                            <?php
                            if (count($message)):

                                foreach ($message as $row):
                                    ?>
                                    <ul class="chat">
                                        <li class="left clearfix"><span class="chat-img pull-left">
                                                <img src="https://s-media-cache-ak0.pinimg.com/originals/9d/8f/8f/9d8f8f5b00b72235b3b2f51b3913e1cd.jpg" width="50px" height="50px"alt="User Avatar" class="img-circle" />


                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <strong class="primary-font"><span style="font-size:20px;color: #337AB7;"><?php echo $row['From_Username']; ?></span></strong>
                                                    <small class="pull-right text-muted" style="color: green">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                        <?php
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
                                                        else if ($seconds < 24 * 60 * 60)
                                                            $time = $hours . " hours ago";
                                                        else if ($seconds < 24 * 60 * 60)
                                                            $time = $day . " day ago";
                                                        else
                                                            $time = $months . " month ago";

                                                        echo $time;
                                                        ?>
                                                    </small>
                                                </div>
                                                <p>
                                                    <b>

                                                        <?php
                                                        echo $row['Message'];
                                                        ?></b>
                                                </p>
                                            </div>
                                        </li>

                                    </ul>
                                <?php endforeach; ?>
                            <?php else: ?>

                                <h3 style="color: indigo;"> Before Chatting,You Need to follow this person ....<h3>

                                    <?php endif; ?>
                                    </div>
                                    <div class="panel-footer">
                                        <?php foreach ($message as $row): ?>
                                            <?php
                                            echo form_open("Usercontroller/Send_Message/{$row['to']}");
                                            ?>
                                        <?php endforeach; ?>

                                        <div class="input-group">
                                            <input id="btn-input" style="font-size:17px;" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." required />
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">
                                                    Send</button>

                                            </span>
                                        </div>

                                    </div>
                                    </div>
                                    </div>
                                    </div>

                                    </div>
                                    </span>

                                    </div>
                                    <?php include('ufooter.php'); ?>
