<?php
include "header.php";
if ($_SESSION['user_role'] == '0') {
  header("location: post.php");
}
?>


<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">All Users</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-user.php">add user</a>
      </div>
      <div class="col-md-12">

        <?php
        include './config.php';

        // Make per page content
        if (isset($_GET['page'])) {
          $page_number = $_GET['page'];
        } else {
          $page_number = 1;
        }
        $limit = 5;
        $offset = ($page_number - 1) * $limit;

        $query = "SELECT * FROM users ORDER BY user_id DESC LIMIT {$offset}, {$limit}";
        $result = mysqli_query($connection, $query) or die("failed!");
        $count = mysqli_num_rows($result);

        if ($count > 0) {

        ?>


          <table class="content-table">
            <thead>
              <th>DB ID</th>
              <th>Full Name</th>
              <th>User Name</th>
              <th>Role</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($result)) {


              ?>

                <tr>
                  <td class='id'><?php echo $row['user_id'] ?></td>
                  <td><?php echo $row['first_name'] . " " . $row['last_name'] ?></td>
                  <td><?php echo $row['username'] ?></td>
                  <td>
                    <?php
                    if ($row['role']) {
                      echo "Admin";
                    } else {
                      echo "Modarator";
                    }
                    ?>
                  </td>

                  <td class='edit'>
                    <a style="color: #302f2f;" href='update-user.php?id=<?php echo $row['user_id'] ?>'>
                      <i class="fas fa-edit"></i>
                    </a>
                  </td>


                  <td class='delete'>
                    <a style="color: #302f2f;" onclick="return confirm('Are You Sure?')" href='delete-user.php?id=<?php echo $row['user_id'] ?>'>
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>

            </tbody>

          <?php } ?>
          </table>

          <?php
          include './config.php';
          $query2 = "SELECT * FROM users";
          $result2 = mysqli_query($connection, $query2) or die("failed");

          if (mysqli_num_rows($result2)) {
            $total_records = mysqli_num_rows($result2);
            $total_page = ceil($total_records / $limit);

            echo "<nav aria-label='Page navigation example'>";
            echo "<ul class='pagination justify-content-center'>";

            if ($page_number > 1) {
              echo '<li class="page-item">';
              echo '<a class="page-link" href="users.php?page=' . ($page_number - 1) . '">Previous</a>';
              echo "</li>";
            }
            for ($i = 1; $i <= $total_page; $i++) {
              if ($i == $page_number) {
                $active = "active";
              } else {
                $active = "";
              }
              echo '<li class="page-item ' . $active . '">';
              echo '<a class="page-link" href="users.php?page=' . $i . '">' . $i . '</a></li>';
            }
            if ($page_number < $total_page) {
              echo '<li class="page-item"><a class="page-link" href="users.php?page=' . ($page_number + 1) . '">Next</a></li>';
            }
            echo "</ul>";
          }
          ?>
          <!-- <li class="active"><a>1</a></li> -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>