<?php include "header.php"; ?>



<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style= "margin-top: 0.5em;">
                <h1 class="admin-heading">Add New Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6" style="margin-left: 15em; margin-top: 2em;">
                <!-- Form -->
                <form action="save-post.php" method="POST" id="ckeditorForm" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" id="editor"></textarea>
                        <small id="desc" class="text-danger">Please fill the description box.</small>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category" class="form-control">
                            <option disabled selected> Select Category</option>

                            <?php

                            include "config.php";
                            $query = "SELECT * FROM category";
                            $result = mysqli_query($connection, $query) or die("query failed.");

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['category_id']}'> {$row['category_name']} </option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <br>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#desc').hide();
    });

    var allEditors = document.getElementById('editor');
    ClassicEditor.create(allEditors);
    $("#ckeditorForm").submit(function(e) {
        var content = $('#editor').val();
        html = $(content).text();
        console.log(html);
        if ($.trim(html) == '') {
            $('#desc').show();
            e.preventDefault();
        }
    });
</script>



<?php include "footer.php"; ?>