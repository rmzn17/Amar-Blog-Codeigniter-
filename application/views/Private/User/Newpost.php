
<?php include('uheader.php'); ?>

<span style="font-family: Buxton Sketch;font-size: 16px;">
    <div class="container-fluid">

        <?php echo form_open_multipart('Usercontroller/Article_post', ['class' => 'form-horizontal']) ?>

        <div class="row">

            <div class="col-sm-9 col-sm-offset-1 col-md-9">
                <h1 style="color: #337AB7"class="page-header">Add new Article</h1>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="col-lg-10">
                            <label name="title" for="title"><span style="color: #337AB7">Title</span></label>
                            <input type="text" class="form-control" name="articles_title" id="title" placeholder="Give a title of article" value="<?php echo set_value('articles_title'); ?>" required>
                        </div>
                        <div class="col-lg-3">
                            <?php echo form_error('title', '<p class="error">', '</p>'); ?>
                        </div>

                    </div>


                    <div class="form-group col-lg-12">
                        <div class="col-lg-10">
                            <label for="description"><span style="color: #337AB7">Description</span></label>
                        </div>
                       <div class="col-lg-10">
                            <textarea name="articles_Description" id="content" placeholder="Give a description of your article " rows="5" cols="111" value="<?php echo set_value('articles_Description'); ?>" required></textarea>
                          
                        </div>


                        <div class="col-lg-10">
                            <?php echo form_error('description', '<p class="error">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group col-lg-12">
                        <div class="col-lg-10">
                            <label for="image"><span style="color: #337AB7">Upload Article image</span></label>
                            <input type="file" name="image" id="image" class="form-control" required=""/>
                        </div>
                        <div class="col-lg-3">
                            <?php echo form_error('image', '<p class="error">', '</p>'); ?>
                        </div>

                    </div>
                    <div class="form-group col-lg-10">
                        <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-upload"></i>Upload</span></button>    

                    </div>


                </div>
            </div>


        </div>

        <?php form_close(); ?>
          <script type="text/javascript">
         	CKEDITOR.replace( 'editor1' );
		 </script>
    </div>
</div>
</span>
<?php include('ufooter.php'); ?>