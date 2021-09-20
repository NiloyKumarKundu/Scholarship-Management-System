<?php include "header.php"; ?>

<div id="main-content">
    <div class="container" style= "margin-top: 0.5em;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Profile Picture</h1>
            </div>
            <div class="col-md-offset-3 col-md-6" style="margin-left: 15em; margin-top: 2em;">
                <!-- Form -->
                <form action="save-post.php" method="POST" enctype="multipart/form-data">
                    ​<picture id="hideShow">
                        <source srcset="#" id="fileUpload" >
                        <img src="" class="img-fluid img-thumbnail" width="600px" height="400px" alt="..." style="margin-bottom: 1.5em;">
                    </picture>

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileToUpload">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" value="Upload" class="input-group-text" id="">
                        </div>
                    </div>
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>





<?php include "footer.php"; ?>