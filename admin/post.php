<?php 
include "header.php";

if ($_SESSION['user_role'] == '0') {
  header("location: post.php");
} else if ($_SESSION['user_role'] > 1) {
  header("location: ../index.php");
}

?>

<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">All Posts</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-post.php">add post</a>
      </div>
      <div class="col-md-12">

        <?php

        include "config.php";
        $limit = 7;

        if (isset($_GET['page'])) {
          $page_number = $_GET['page'];
        } else {
          $page_number = 1;
        }

        $offset = ($page_number - 1) * $limit;


        if ($_SESSION['user_role'] == '1') {
          $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, category.category_name,users.username FROM post
          LEFT JOIN category ON post.category = category.category_id
          LEFT JOIN users ON post.author = users.user_id
          ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
        } elseif ($_SESSION['user_role'] == '0') {
          $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, category.category_name,users.username FROM post
          LEFT JOIN category ON post.category = category.category_id
          LEFT JOIN users ON post.author = users.user_id
          WHERE post.author = {$_SESSION['user_id']}
          ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
        }

        $result = mysqli_query($connection, $query) or die("Failed");
        $count = mysqli_num_rows($result);

        if ($count > 0) {

        ?>
          <table class="content-table table-striped">
            <thead>
              <th>S.No.</th>
              <th>Image</th>
              <th>Title</th>
              <th>Category</th>
              <th>Date</th>
              <th>Author</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>
            <tbody>
              <?php
              $serial_number = 1;
              while ($row = mysqli_fetch_assoc($result)) {

              ?>
                <tr>
                  <td class='id'><?php echo $serial_number++ ?></td>
                  <td><img height="50px" src="upload/<?php echo $row['post_img'] ?>"></td>
                  <td><?php echo $row['title'] ?></td>
                  <td><?php echo $row['category_name'] ?></td>
                  <td><?php echo $row['post_date'] ?></td>
                  <td><?php echo $row['username'] ?></td>

                  <td class='edit'>
                    <a style="color: #302f2f;" href='update-post.php?id=<?php echo $row['post_id'] ?>'>
                    <i class="fas fa-edit"></i>
                    </a>
                  </td>
                  <td class='delete'>
                    <a style="color: #302f2f;" onclick="return confirm('Are You Sure?')" href='delete-post.php?id=<?php echo $row['post_id'] ?>&catid=<?php echo $row['category'] ?>'>
                    <i class="fas fa-trash"></i>
                    </a>
                  </td>


                </tr>
              <?php } ?>
            </tbody>
          <?php } ?>
          </table>

          <?php

          include "config.php";
          $query2 = "SELECT * FROM post WHERE post.author = {$_SESSION['user_id']}";
          $result2 = mysqli_query($connection, $query2) or dir("Failed.");
          if (mysqli_num_rows($result2)) {
            $total_records = mysqli_num_rows($result2);
            $total_page = ceil($total_records / $limit);

            echo "<nav aria-label='Page navigation example'>";
            echo "<ul class='pagination justify-content-center'>";
            if ($page_number > 1) {
              echo '<li class="page-item">';
              echo '<a class="page-link" href="post.php?page=' . ($page_number - 1) . '">Previous</a>';
              echo "</li>";
            }

            for ($i = 1; $i <= $total_page; $i++) {

              if ($i == $page_number) {
                $active = "active";
              } else {
                $active = "";
              }

              echo '<li class="page-item ' . $active . '">';
              echo '<a class="page-link" href="post.php?page=' . $i . '">' . $i . '</a></li>';
            }
            if ($total_page > $page_number) {
              echo '<li class="page-item"><a class="page-link" href="post.php?page=' . ($page_number + 1) . '">Next</a></li>';
            }
            echo "</ul>";
          }


          ?>

      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>