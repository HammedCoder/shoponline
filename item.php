<?php
include './includes/header.php';
include './includes/nav.php';
if (isset($_GET['item'])) {
    $id = $_GET['item'];
    $select = mysqli_query($conn, "SELECT * FROM shop WHERE id = $id");
    if ($select) {
        while ($row = $select->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $cat_id = $row['cat_id'];
            $price = $row['price'];
            $status = $row['status'];
            $image = $row['image'];
            $tag_id = $row['tag_id'];
            $desc = $row['description'];
            //     $select_cat = mysqli_query($conn, "SELECT * FROM category WHERE name LIKE %$name%");
            //     while ($cat_row = $select_cat->fetch_assoc()) {
            //         $idcat = $cat_row['id'];
            //         $namecat = $cat_row['name'];

?>
            <!--  -->

            <!-- Product section-->
            <section class="py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="./images/<?php echo $image; ?>" height="500" width="250" alt="..." /></div>
                        <div class="col-md-6">
                            <div class="small mb-1">SKU: BST-498</div>
                            <h1 class="display-5 fw-bolder"><?php echo $name; ?></h1>
                            <div class="fs-5 mb-5">
                                <span class="text-decoration-line-through mx-2 alert-info p-2">$<?php echo $price; ?> </span>
                                <span>$<?php echo $price - 12; ?></span>
                            </div>
                            <p class="lead"><?php echo $desc; ?></p>
                            <p id="identity"></p>

                            <script>
                                function show(str) {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            document.getElementById("identity").innerHTML = this.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET", "multiply.php?price=<?php echo $price; ?>&q=" + str, true);
                                    xmlhttp.send();
                                }
                            </script>
                            <div class="d-flex">
                                <input type="number" name="q" onchange="show(this.value)" class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Related items section-->
            <section class="py-5 bg-light">
                <div class="container px-4 px-lg-5 mt-5">
                    <h2 class="fw-bolder mb-4">Related products</h2>
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        <?php
                        $selectcat = mysqli_query($conn, "SELECT category.name, shop.image, shop.price, shop.name, shop.description FROM shop INNER JOIN category ON shop.cat_id=category.id WHERE category.id = $cat_id");
                        while ($rowsh = mysqli_fetch_assoc($selectcat)) {
                            $shopitem = $rowsh['name'];
                            $shopimage = $rowsh['image'];
                            $shopprice = $rowsh['price'];


                        ?>
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" width="250" height="200" src="./images/<?php echo $shopimage; ?>" alt="<?php echo $shopitem; ?>" />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder"><?php echo $shopitem; ?></h5>
                                            <!-- Product price-->
                                            <b>$<?php echo $shopprice; ?></b>

                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a id="view" class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                                    </div>
                                </div>
                            </div>
            <?php }
                    }
                }
            } ?>
                    </div>
                </div>
            </section>
            <!-- Footer-->
            <?php include './includes/footer.php';
            // if(count())
            ?>