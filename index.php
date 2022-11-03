<!-- Header-->
<?php include './includes/header.php'; ?>
<!-- Navigation-->
<?php include './includes/nav.php'; ?>


<!-- Section-->
<?php include './includes/carousel.php'; ?>
<section>

    <div class="container px-4 px-lg-5 mt-3">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM shop");
            if ($select) {
                while ($row = $select->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $cat_id = $row['cat_id'];
                    $price = $row['price'];
                    $status = $row['status'];
                    $image = $row['image'];
                    $tag_id = $row['tag_id'];
                    $select_cat = mysqli_query($conn, "SELECT * FROM category WHERE id = $cat_id");
                    while ($cat_row = $select_cat->fetch_assoc()) {
                        $idcat = $cat_row['id'];
                        $namecat = $cat_row['name'];
                        $select_tag = mysqli_query($conn, "SELECT * FROM tags WHERE id = $tag_id");
                        while ($tag_row = $select_tag->fetch_assoc()) {
                            $idtag = $tag_row['id'];
                            $nametag = $tag_row['name'];

            ?>
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Sale badge-->
                                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo $nametag; ?></div>
                                    <!-- Product image-->
                                    <a style="color: #fff; text-decoration:none;" href="item.php?item=<?php echo $id ?>"><img class="card-img-top" src="./images/<?php echo $image; ?>" width="300" height="250" alt="<?php echo $name; ?>" /></a>
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder"><a style="color: #000; text-decoration:none;" href=" item.php?item=<?php echo $id ?>"><?php echo $name ?></a></h5>
                                            <p class="badge bg-dark"><?php echo $namecat; ?></a></p>
                                            <!-- Product reviews-->
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <?php
                                                // Rating Query

                                                $sql = mysqli_query($conn, "SELECT AVG(rating.value) AS value FROM rating INNER JOIN prod_rating ON rating.id=prod_rating.rat_id WHERE prod_id = $id");

                                                while ($row = $sql->fetch_assoc()) {
                                                    $rate = $row['value'];
                                                    $num = number_format($rate);
                                                    if ($num == 0) {
                                                        echo "<a href='rate.php?item=$id' class='mx-2 text-danger' style='font-weight:500;'>rate this item!</a>" . "<br>";
                                                        for ($i = 0; $i < 5; $i++) {
                                                            echo "<div class='bi-star' id='rate'></div>";
                                                        }
                                                    } else {
                                                        echo "<a href='rate.php?item=$id' class='mx-2 text-danger' style='font-weight:500;'>rate this item!</a>" . "<br>";
                                                        for ($i = 0; $i < $num; $i++) {
                                                            echo "<div class='bi-star-fill'></div>";
                                                        }
                                                    }
                                                }
                                                // Count number of rating each product get
                                                $sqlc = mysqli_query($conn, "SELECT COUNT(rating.value) AS value FROM rating INNER JOIN prod_rating ON rating.id=prod_rating.rat_id WHERE prod_id = $id");
                                                while ($rowc = $sqlc->fetch_assoc()) {
                                                    $count = $rowc['value'];
                                                }
                                                ?>
                                            </div>
                                            <!-- Product price--> $<?php echo "<b>" . $price . "</b>"; ?>
                                        </div>
                                    </div>

                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                                    </div>
                                </div>
                            </div>

            <?php
                        }
                    }
                }
            } else {
                echo "No items in the shop";
            }
            ?>
        </div>
</section>

<!-- Footer-->
<?php include './includes/footer.php';
echo $_SERVER['GATEWAY_INTERFACE'] . '<br>';
echo $_SERVER['SERVER_ADDR'] ?>