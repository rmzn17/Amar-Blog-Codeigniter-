
<?php include('uheader.php'); ?>

<div class="container">
    <?php foreach ($userinfo->result_array() as $row): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body" style="background-image: url('http://wallpapersdsc.net/wp-content/uploads/2016/03/Charles-Chaplin-Wallpapers.jpg');background-size: 100% 100%;">

                        <div class="row">

                            <div class="col-md-4 text-center">

                                <img class="img-rounded avatar avatar-original" style="-webkit-user-select:none;" src="<?php echo $row['Photo']; ?>" width="230px" height="230px">


                            </div>
                            <div class="col-md-8">

                                <div class="row">
                                    <div class="col-md-8">

                                        <h1 style=" font-family: Forte;" class="text-primary only-bottom-margin"> <?php echo $row['FirstName']; ?> &nbsp;<?= anchor("Usercontroller/Message_User/{$row['UserName']}", 'Message', array('class' => 'btn btn-success', 'data-toggle' => 'tooltip', 'title' => 'Follow  this user', 'style' => 'font-family: Buxton Sketch;')) ?>
                                        </h1>     
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md8">
                                        <h4>
                                            <b>
                                                <span style=" font-family: Buxton Sketch;">
                                                    <i class="icon-envelope"></i>&nbsp;&nbsp;<?php echo $row['Email']; ?><br>

                                                    <i class="icon-phone"></i>&nbsp;&nbsp;<?php echo $row['Phone']; ?><br>
                                                    <i class="fa fa-venus" aria-hidden="true"></i>
                                                    &nbsp;&nbsp;Gender:<?php echo $row['Gender']; ?><br>

                                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                                    &nbsp;&nbsp;Date of Birth: <?php echo $row['DOB']; ?><br>

                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    &nbsp;&nbsp;Join Here:
                                                    <?php
                                                    echo $row['Joindate'] . " (";
                                                    $date = strtotime($row['Joindate']);
                                                    $diff = time() - $date;
                                                    $days = floor($diff / (60 * 60 * 24));
                                                    $hours = round(($diff - $days * 60 * 60 * 24) / (60 * 60));
                                                    echo "$days days $hours hours Ago)<br />";
                                                    ?>


                                                    <br><br>
                                                    <div class="activity-mini">
                                                        Followers: <i class="fa fa-eye" aria-hidden="true"></i> <?php echo $row['Follower']; ?>
                                                    </div>
                                                    <div class="activity-mini">
                                                        Enemy :&nbsp;<i class="fa fa-bomb" aria-hidden="true"></i>&nbsp;<?php echo $row['Enemy']; ?>

                                                    </div>
                                                </span>
                                            </b>
                                        </h4>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <span style=" font-family: Buxton Sketch;">
                                <div class="col-md-12">
                                    <?php $uname = $row['UserName']; ?>
                                    <?= anchor("Usercontroller/Add_enemy/{$row['UserName']}", 'Enemy', array('class' => 'btn btn-danger pull-right', 'data-toggle' => 'tooltip', 'title' => 'Make Enemy This User', 'style' => 'font-family: Buxton Sketch;')) ?>
                                    <?= anchor("Usercontroller/Add_follower/{$row['UserName']}", 'Follow', array('class' => 'btn btn-info pull-right', 'data-toggle' => 'tooltip', 'title' => 'Follow  this user', 'style' => 'font-family: Buxton Sketch;')) ?>

                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
</div>




<div class="container">
    <h1  style=" font-family: Buxton Sketch;color:blue" > My all post so far....... </h1>
    <?php foreach ($articles->result_array() as $row): ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body" style="background-color:#F0F0F0;">
                        <div class="row">
                            <div class="col-md-12 lead">
                                <div style=" font-family: Buxton Sketch;float: left;">

                                    <?php $uname = $row['articles_UserName']; ?>
                                    <?php $art_id = $row['articles_id']; ?>
                                    <span style="margin-right: 20px;">
                                        <h2><b>Author:&nbsp;</b><a href="<?php echo base_url() ?>index.php/Usercontroller/user_profile_view?uname=<?php echo $uname; ?>"style="text-decoration:none"><?php echo $row['articles_UserFullname']; ?></a></h2>
                                    </span>
                                </div>
     

                            </div>
                            <hr>
                        </div>

                        <div class="row">

                            <div class="col-md-4 text-center">

                                <img class="img-rounded avatar avatar-original" style="-webkit-user-select:none;" src="<?php echo $row['articles_photo']; ?>" width="250px" height="250px">


                            </div>
                            <div class="col-md-8">

                                <div class="row">
                                    <div class="col-md-8">


                                        <h1 style=" font-family: Forte;" class="text-primary only-bottom-margin"> <?php $row['articles_UserName']; ?></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>
                                            <span style=" font-family: Buxton Sketch;">

                                                <h3> <b>Title:&nbsp;</b><?php echo $row['articles_title']; ?></h3>
                                                <span class="text-primary">Publish Date:</span><b><i> <?php echo $row['articles_date']; ?></i></b>
                                                <br> <br>

                                                <div class="comment more">
                                                    <?php
                                                    $description = strip_tags($row['articles_Description']);

                                                    echo $description;
                                                    ?>
                                                </div>
                                                <br>


                                                <br><br><br><br>

                                            </span>
                                        </h4>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 lead">

                                <div style=" font-family: Buxton Sketch;float: left">

                                   <div class="activity-mini">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?= anchor("Usercontroller/Add_Like/{$row['articles_id']}", 'Like', array('class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Like this article', 'style' => 'font-family: Buxton Sketch;text-decoration:none;color:white;')) ?>
                                        <i class="glyphicon glyphicon-thumbs-up text-muted"></i><?php echo $row['articles_Like']; ?></span>&nbsp;&nbsp;&nbsp;

                                        <?= anchor("Usercontroller/Add_Dislike/{$row['articles_id']}", 'Dislike', array('class' => 'btn btn-warning', 'data-toggle' => 'tooltip', 'title' => 'Dislike this article', 'style' => 'font-family: Buxton Sketch;text-decoration:none;color: white;')) ?>
                                        <i class="glyphicon glyphicon-thumbs-down text-muted"></i><?php echo $row['articles_Dislike']; ?>&nbsp;&nbsp;&nbsp;


                                    </div>
                                </div>



                                <div class="col-md-11" style="margin-left: 11%;">





                                    <div class="col-md-12 form-group" style="font-family: Buxton Sketch;">
                                        <?php echo form_open('Usercontroller/Add_Comment'); ?>
                                        <label style="color:#2E8B57"><br>Add a public comment</label>

                                        <?php echo form_input(['name' => 'comment', 'class' => 'form-control', 'placeholder' => 'Type Your Comment']); ?>

                                        <?php echo form_hidden('article_id', $row['articles_id']); ?>
                                        <?php echo form_hidden('owner', $uname); ?>

                                        <?php
                                        echo form_submit(['name' => 'submit', 'value' => 'Comment', 'class' => 'btn btn-primary pull-right', 'style' => 'font-family: Buxton Sketch;']),
                                        form_reset(['name' => 'reset', 'value' => 'Cancel', 'class' => 'btn btn-warning pull-right', 'style' => 'font-family: Buxton Sketch;']);
                                        ?>


                                        </form>


                                    </div>

                                    <?php
                                    $tot_comment = $row['articles_Comment'];
                                    if ($tot_comment > 0):
                                        ?>

                                        <h2 style="font-family: Buxton Sketch;color: goldenrod;"><?php echo $tot_comment ?> Comments...</h2>

                                        <hr>

                                        <div style="background-color: #F0F0F0;">

                                            <?php
                                            foreach ($comments->result_array() as $cmt):
                                                ?>

                                                <?php
                                                $Commentator = $cmt['Commentator'];
                                                $comment = $cmt['Comment'];
                                                $arti_id = $cmt['Articles_id'];

                                                //$time = $row['Notification_Time'];

                                                $seconds = strtotime(date('Y-m-d H:i:s')) - strtotime($cmt['Time']);

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
                                                ?>

                                                <?php if ($row['articles_id'] == $arti_id): ?>

                                                     <div style=" font-family: Buxton Sketch;border-bottom: 2px dotted #999; ">
                                                  
                                                        <img src="https://i.pinimg.com/736x/bc/fc/29/bcfc29bca43b054fece7af94d44e9e4c--charlie-chaplin-pop-art.jpg" width="50px" height="50px"alt="User Avatar" class="img-rounded" />

                                                        <span style="color: #337AB7;">
                                                            <a href="<?php echo base_url() ?>index.php/Usercontroller/user_profile_view?uname=<?php echo $Commentator; ?>"style="text-decoration:none"><?php echo $Commentator; ?></a>

                                                        </span>

                                                        <span style="font-size: 15px;float: right;">

                                                            <i class="glyphicon glyphicon-time"></i> 
                                                            <?php
                                                            // echo nbs(50);

                                                            echo '<span style=" color:#B22222;">';
                                                            echo $cmt['Time'] . "(" . $time . ")";
                                                            echo '</span>';
                                                            ?>
                                                        </span>
                                                        <br>
                                                        <span style="color: indigo; margin-left: 6%;">  <?php echo $comment ?></span>

                                                    </div>
                                                    <hr>

                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                        </div>

                                        <?php
                                    else: {
                                     echo '<h3 style = "font-family: Buxton Sketch;color: indigo;"> No comments yet....<h3>';

                                        }
                                        ?>
                                        <br>


                                    <?php endif; ?>



                                </div>

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>

<script>

    $(document).ready(function () {
        var showChar = 500;
        var ellipsestext = "...";
        var moretext = "more";
        var lesstext = "less";
        $('.more').each(function () {
            var content = $(this).html();

            if (content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar - 1, content.length - showChar);

                var html = c + '<span class="moreelipses">' + ellipsestext + '</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function () {
            if ($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });



</script>

<?php include('ufooter.php'); ?>