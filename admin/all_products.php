<link rel="stylesheet" href="../dist/css/bootstrap.min.css">
<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table me-1"></i>
    All Products
  </div>
  <div class="card-body">
    <table id="datatablesSimple" class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Product name</th>
          <th>Category</th>
          <th>tag</th>
          <th>Price</th>
          <th>Image</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Product name</th>
          <th>Category</th>
          <th>tag</th>
          <th>Price</th>
          <th>Image</th>
        </tr>
      </tfoot>
      <tbody>
        <?php
        include '../includes/connect.php';
        $sql = mysqli_query($conn, "SELECT * FROM shop");
        $count = mysqli_num_rows($sql);
        if ($count < 1) {
          echo "No products to display";
        } else {
          $n = 0;
          while ($row = $sql->fetch_assoc()) {
            $n++;
            $id = $row['id'];
            $name = $row['name'];
            $cat_id = $row['cat_id'];
            $tag_id = $row['tag_id'];
            $price = $row['price'];
            $image = $row['image'];
            $select_cat = mysqli_query($conn, "SELECT * FROM category WHERE id = $cat_id");
            while ($cat_row = $select_cat->fetch_assoc()) {
              $idcat = $cat_row['id'];
              $namecat = $cat_row['name'];
              $select_tag = mysqli_query($conn, "SELECT * FROM tags WHERE id = $tag_id");
              while ($tag_row = $select_tag->fetch_assoc()) {
                $idtag = $tag_row['id'];
                $nametag = $tag_row['name'];

        ?>
                <tr>

                  <td><?php echo $n; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $namecat; ?></td>
                  <td><?php echo $nametag; ?></td>
                  <td>$<?php echo $price; ?></td>
                  <td><img src="../images/<?php echo $image; ?>" width="50rem"></td>
                  <td><a href="?core=edit-post&edit=<?php echo $id; ?>" class="btn btn-info md-0">Update</a></td>
                  <td><a href="?delete=<?php echo $id  ?>" class="btn btn-danger">Delete</a></td>
                </tr>
        <?php
              }
            }
          }
        } ?>
      </tbody>
    </table>
  </div>
</div>