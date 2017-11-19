<?php include('uheader.php'); ?>


<div class="container">
    <span style="font-family: Buxton Sketch;font-size: 16px;"> 
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <h1 style="color:goldenrod"> Search Results....</h1>
                <div class="table-responsive">


                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>
                        <th>Sr. No</th>
                        <th>Title</th>

                        <th>Author</th>


                        </thead>

                        <tbody>
                            <?php $index = 1; ?>
                            <?php
                            if (count($articles)):
                                $count = $this->uri->segment(3, 0);
                                foreach ($articles as $article):
                                    ?>
                                    <tr>

                                        <td> <?php echo $index++ ?></td>
                                        <?php
                                        $article_id = $article->articles_id;
                                        $article_author = $article->articles_UserName;
                                        ?>
                                        <td>
                                            <h4><a href="<?php echo base_url() ?>index.php/Usercontroller/view_article?article_id=<?php echo $article_id; ?>"style="text-decoration:none"><b><?php echo $article->articles_title; ?></b></a></h4>
                                        </td>

                                        <td>

                                            <h4><a href="<?php echo base_url() ?>index.php/Usercontroller/user_profile_view?uname=<?php echo $article_author; ?>"style="text-decoration:none"><b><?php echo $article->articles_UserFullname; ?></b></a></h4>

                                        </td>



                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">
                                        <h3 style="color: indigo;"> No Result Found....</h3>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>


                    </table>


                </div>

            </div>
        </div>

 <?= $this->pagination->create_links(); ?>

    </span>
    
    
</div>


<?php include('ufooter.php'); ?>