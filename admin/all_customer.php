<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table me-1"></i>
    All Products
  </div>
  <div class="card-body">
    <table class="table table-striped" id="datatablesSimple">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Address</th>
          <th>City</th>
          <!-- <th>Image</th> -->
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Address</th>
          <th>City</th>
          <!-- <th>Image</th> -->
          <th></th>
          <th></th>
        </tr>
      </tfoot>
      <tbody>
        <?php

        $cus_qry = mysqli_query($conn, "SELECT * FROM customer");
        $n = 0;
        while ($row_cus = mysqli_fetch_assoc($cus_qry)) {
          $n++;
          $id = $row_cus['id'];
          $fname = $row_cus['fname'];
          $lname = $row_cus['lname'];
          $email = $row_cus['email'];
          $phone = $row_cus['phone'];
          $add = $row_cus['address'];
          $image = $row_cus['image'];
          $city = $row_cus['city'];
        ?>
          <tr>
            <td><?php echo $n; ?></td>
            <td><?php echo $fname . " " . $lname; ?></td>
            <td><?php echo $phone; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $add; ?></td>
            <td><?php echo $city; ?></td>
            <td><a href="?core=customer&view=<?php echo $id ?>" class="btn btn-primary btn-sm">View</a></td>
            <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        <?php  }
        ?>
      </tbody>
    </table>
  </div>

</div>