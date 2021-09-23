<?php include './header.php'; ?>


<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">Premium Requests</h1>
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

                $query = "  SELECT *
                    FROM users u
                    JOIN subscription s
                    ON u.user_id = s.user_id
                    AND s.cur_status = 'pending'
                    ORDER BY s.start_date ASC
                    LIMIT {$offset}, {$limit}";


                $result = mysqli_query($connection, $query) or die("failed!");
                $count = mysqli_num_rows($result);

                if ($count > 0) {

                ?>
                    <table class="content-table">
                        <thead>
                            <th>DB ID</th>
                            <th>Full Name</th>
                            <th>Money</th>
                            <th>Payment No</th>
                            <th>Approve</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {

                            ?>

                                <tr>
                                    <td class='id'><?php echo $row['user_id'] ?></td>
                                    <td><?php echo $row['first_name'] . " " . $row['last_name'] ?></td>
                                    <td>
                                        <?php echo $row['price'] ?>
                                    </td>

                                    <td>
                                        <?php echo $row['trxid'] ?>
                                    </td>

                                    <td class='edit'>
                                        <a style="color: #302f2f;" href='./confirm-premium.php?id=<?php echo $row['user_id'] ?>'>
                                            <i class="fas fa-user-check"></i>
                                        </a>
                                    </td>


                                    <td class='delete'>
                                        <a style="color: #302f2f;" onclick="return confirm('Are You Sure?')" href='delete-premium.php?id=<?php echo $row['user_id'] ?>'>
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                            ?>

                        </tbody>
                        <?php
                        include './config.php';
                        $query2 = "SELECT * FROM subscription";
                        $result2 = mysqli_query($connection, $query2) or die("failed");


                        if (mysqli_num_rows($result2)) {
                            ?>
                                </table>
                            <?php
                            $total_records = mysqli_num_rows($result2);
                            $total_page = ceil($total_records / $limit);

                            echo "<nav aria-label='Page navigation example'>";
                            echo "<ul class='pagination justify-content-center'>";

                            if ($page_number > 1) {
                                echo '<li class="page-item">';
                                echo '<a class="page-link" href="premium.php?page=' . ($page_number - 1) . '">Previous</a>';
                                echo "</li>";
                            }
                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i == $page_number) {
                                    $active = "active";
                                } else {
                                    $active = "";
                                }
                                echo '<li class="page-item ' . $active . '">';
                                echo '<a class="page-link" href="premium.php?page=' . $i . '">' . $i . '</a></li>';
                            }
                            if ($page_number < $total_page) {
                                echo '<li class="page-item"><a class="page-link" href="premium.php?page=' . ($page_number + 1) . '">Next</a></li>';
                            }
                            echo "</ul>";
                        }
                        ?>
                    
                    <?php
                } else {
                    ?>
                        <div class="container">
                            <h4>No request has been pending!</h4>
                        </div>
                        </table>
                    <?php
                } ?>
                    


                    <!-- <li class="active"><a>1</a></li> -->
            </div>
        </div>
    </div>
</div>




<?php include './footer.php'; ?>