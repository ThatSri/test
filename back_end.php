<?php 
    include 'head_backend.php';
?>
    <div class="container-fluid">
        <div class="placeholder">
            <div class="parallax-window" data-parallax="scroll" data-image-src="img/KFC5.jpg">
                <!-- style="transform: translate3d(0px, 0px, 0px); position: absolute; top: -385px; left: 0px; height: 1200px; width: 1200px; max-width: none;" -->

            </div>
        </div>
        <!-- <h1 class="text-start">KFC Delivery</h1>
                <h6 class="text-start">Add New Menu</h6>
                <nav class="text-end"><a href="add_menu.php">Add Menu</a> -->
        <main>
            <?php
            require("connect_db.php");
            $sql = "SELECT * FROM menu";
            $rs = mysqli_query($conn, $sql);
            ?>

            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>
                            <center>ID</center>
                        </th>
                        <th>
                            <center>Image</center>
                        </th>
                        <th>
                            <center>Name</center>
                        </th>
                        <th>
                            <center>Details</center>
                        </th>
                        <th>
                            <center>Price</center>
                        </th>
                        <th>
                            <center>Edit</center>
                        </th>
                        <th>
                            <center>Delete</center>
                        </th>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($rs)) {
                    echo ("<tr>");
                    echo ("<td style='width: 53px;'>" . $row["menu_id"] . "</td>");
                    echo ("<td align=center>" . "<img src=" . $row["image"] . " style='width: 60%'>" . "</td>");
                    echo ("<td>" . $row["n_menu"] . "</td>");
                    echo ("<td>" . $row["detail"] . "</td>");
                    echo ("<td style='width: 53px;'>" . $row["price"] . " ฿" . "</td>");
                    echo ("<td><a href=edit_menu.php?ID=" . $row["menu_id"] . " class='btn btn-warning btn-xs'>edit</a></td> ");
                    echo ("<td><a href=delete_menu.php?ID=" . $row["menu_id"] . " onclick=\"return confirm('Are you sure?')\"class='btn btn-danger btn-xs'>Delete</a></td>");
                    echo ("</tr>\n");
                }
                ?>
            </table>
        </main>

    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle click on paging links
            $('.tm-paging-link').click(function(e) {
                e.preventDefault();

                var page = $(this).text().toLowerCase();
                $('.tm-gallery-page').addClass('hidden');
                $('#tm-gallery-page-' + page).removeClass('hidden');
                $('.tm-paging-link').removeClass('active');
                $(this).addClass("active");
            });
        });
    </script>
</body>

</html>