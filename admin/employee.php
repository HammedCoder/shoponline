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
          <th>Employee name</th>
          <th>Position</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Age</th>
          <th>Startdate</th>
          <th>Salary</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Employee name</th>
          <th>Position</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Age</th>
          <th>Startdate</th>
          <th>Salary</th>
        </tr>
      </tfoot>
      <tbody>
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM employee");
        $count = mysqli_num_rows($sql);
        if ($count < 1) {
          echo "No Employee to display";
        } else {
          $n = 0;
          while ($row = $sql->fetch_assoc()) {
            $n++;
            $id = $row['id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $phone = $row['phone'];
            $position = $row['position'];
            $startdate = $row['startdate'];
            $age = $row['age'];


        ?>
            <tr>

              <td><?php echo $n; ?></td>
              <td><?php echo $fname . " " . $lname; ?></td>
              <td><?php echo $position; ?></td>
              <td><?php echo $email; ?></td>
              <td>$<?php echo $phone; ?></td>
              <td><?php echo $age; ?></td>
              <td><?php echo $startdate; ?></td>
              <td>$<?php ?></td>
              <td><img src="../images/<?php echo $image; ?>" width="50rem"></td>
              <td><a href="?core=edit-post&edit=<?php echo $id; ?>" class="btn btn-info md-0">Update</a></td>
              <td><a href="?delete=<?php echo $id  ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php
          }
        }

        ?>
      </tbody>
    </table>
  </div>
</div>