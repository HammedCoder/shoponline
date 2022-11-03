<?php
$msg = "";
if (isset($_POST['submit'])) {
  $prod = $_POST['prod'];
  $cat = $_POST['cat'];
  $tag = $_POST['tag'];
  $price = $_POST['price'];
  $desc = $_POST['desc'];
  $image = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];
  $type = pathinfo($image, PATHINFO_EXTENSION);
  $size = $_FILES['image']['size'];

  if ($type != 'jpg' && $type != 'jpeg' && $type != 'png' && $type != 'jfif') {
    $msg = "<div class= 'alert alert-info'>Only file or type PNG or JPG of JFIF is allowed</div>";
  } elseif ($size > 300000) {
    $msg = "<div class= 'alert alert-info'>Image size should not more that 300kb</div>";
  } else {
    $qry = mysqli_query($conn, "INSERT INTO shop(cat_id, name, price, tag_id, status, image, description) VALUES($cat, '$prod', $price, $tag, 1, '$image','$desc' )");
    if ($qry) {
      move_uploaded_file($tmp, "../images/$image");
      $msg = "<div class= 'alert alert-info'>New Product created</div>";
    } else {
      die(mysqli_error($conn));
      $msg = "<div class= 'alert alert-warning'>Query Failed</div>";
    }
  }
}


?>
<div class="container-fluid">
  <div class="row m-3">
    <div class="col-lg-8 col-md-6">
      <?Php echo $msg; ?>
      <h2 class="text-info">Create New Products</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-floating">
          <input type="text" id="prod" name="prod" class="form-control mb-2" required>
          <label for="prod">Product Name</label>
        </div>
        <div class="form-floating">
          <input type="number" id="price" name="price" class="form-control mb-2" required>
          <label for="price">Price</label>
        </div>

        <div class="form-floating">
          <select type="text" id="prod" name="cat" class="form-control mb-2" required>
            <option value="#">Select category</option>
            <?php
            $cat_qry = mysqli_query($conn, "SELECT * FROM category");
            while ($row_cat = mysqli_fetch_assoc($cat_qry)) {
              $cat_id = $row_cat['id'];
              $cat_name = $row_cat['name'];
            ?>
              <option value="<?php echo $cat_id ?>"><?php echo $cat_name ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-floating">
          <select type="text" id="prod" name="tag" class="form-control mb-2" required>
            <option value="#">Select tag</option>
            <?php
            $tag_qry = mysqli_query($conn, "SELECT * FROM tags");
            while ($row_tag = mysqli_fetch_assoc($tag_qry)) {
              $tag_id = $row_tag['id'];
              $tag_name = $row_tag['name'];

            ?>

              <option value="<?php echo $tag_id ?>"><?php echo $tag_name ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-floating">
          <input type="file" id="image" name="image" class="form-control mb-2">

        </div>
        <div class="form-floating">
          <textarea class="form-control mb-2" name="desc" id="desc" cols="30" rows="10"></textarea>
          <label for="desc">Product description</label>
        </div>

        <input type="submit" id="submit" name="submit" class="btn btn-primary mb-2 btn-md">

      </form>
    </div>

    <?php
    $msg = "";
    if (isset($_POST['createcat'])) {
      $newcat = $_POST['cate'];
      $sql = mysqli_query($conn, "INSERT INTO category(name) VALUES('$newcat')");
      if ($sql) {
        $msg = "<div class= 'alert alert-info'>New category created</div>";
        echo "<script>setTimeout(function(){window.history.back()})</script>";
        $newcat = "";
      } else {
        $msg = "<div class= 'alert alert-info'>Query Failed</div>";
      }
    };

    ?>
    <div class="col-lg-4 col-md-6">
      <!-- Create Category Form-->
      <?php echo $msg; ?>
      <h2 class="text-info">Create Category</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-floating">
          <input type="text" id="price" name="cate" class="form-control mb-2" required>
          <label for="price">Category</label>
        </div>
        <input type="submit" id="submit" name="createcat" class="btn btn-primary mb-2 btn-sm">
      </form>


      <!-- Create Tags Form-->
      <?php
      $msg = "";
      if (isset($_POST['createtag'])) {
        $newtag = $_POST['tag'];
        $sql = mysqli_query($conn, "INSERT INTO tags(name) VALUES('$newtag')");
        if ($sql) {
          $msg = "<div class= 'alert alert-info'>New tag created</div>";
          echo "<script>setTimeout(function(){window.history.back()}, 2000)</script>";
          $newtag = "";
        } else {
          $msg = "<div class= 'alert alert-info'>Query Failed</div>";
        }
      };
      echo $msg
      ?>
      <h2 class="text-info">Create Tag</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-floating">
          <input type="text" id="tag" name="tag" class="form-control mb-2" required>
          <label for="tag">Category</label>
        </div>
        <input type="submit" id="submit" name="createtag" class="btn btn-primary mb-2 btn-sm">
      </form>
    </div>
  </div>
</div>