
<?php include('aheader.php'); ?>

<span style="font-family: Buxton Sketch;">
<div class="container-fluid">
    <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Add new Article</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-9">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Give a title of article">
                    </div>


                    <div class="form-group col-md-9">
                        <label for="description">Description</label>
                        <textarea name="content" id="content" placeholder="Give a description of your article "></textarea>
                        <script>CKEDITOR.replace('content');</script>
                    </div>

                    <div class="form-group col-md-9">
                        <label for="image">Upload Article image</label>
                        <input type="file" name="image" id="image" class="form-control" />

                    </div>
                    <div class="form-group col-md-9">
                        <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-upload"></i>Upload</span></button>    

                    </div>


                </div>
        </div>
        </form>

    </div>
</div>
</div>
</span>

<?php include('afooter.php'); ?>p'); ?>