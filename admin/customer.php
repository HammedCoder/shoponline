<style>
  .rounded {
    border-radius: 50% !important;
    box-shadow: 0 1px 2px;
    width: 200px;
  }
</style>
<?php
if (isset($_GET['view'])) {
  $id = $_GET['view'];
  $qry = mysqli_query($conn, "SELECT * FROM customer WHERE id = $id");
  $row_cus = mysqli_fetch_assoc($qry);
  $fname = $row_cus['fname'];
  $lname = $row_cus['lname'];
  $email = $row_cus['email'];
  $phone = $row_cus['phone'];
  $dob = $row_cus['dob'];
  $add = $row_cus['address'];
  $image = $row_cus['image'];
  $city = $row_cus['city'];
}
?>


<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-10 col-sm-12">
      <h2 class="text-center">Customer Details</h2>
      <hr>
      <div class="card mb-4 d-flex justify-content-center">
        <?php
        if ($image == '') {
          echo "<div class='img-fluid '><img class='text-center rounded' src='../images/saidat.png' alt=''></div>";
        } else {
          echo "<div class='img-fluid '><img class='text-center rounded' src='../images/$image' alt=''></div>";
        } ?>
        <!-- <div class="img-fluid "><img class="text-center rounded" src="../images/<?php echo $image; ?>" alt=""></div> -->
        <div class="mx-5">
          <h2 class="text-muted"><span class="badge" style="color: #000;"> Name: </span><?php echo $fname . " " . $lname; ?></h2>
          <h5 class="text-muted"><span class="badge" style="color: #000;"> Phone: </span><?php echo $phone; ?></h5>
          <h5 class="text-muted"><span class="badge" style="color: #000;"> Email: </span><?php echo $email; ?></h5>
          <h5 class="text-muted"><span class="badge" style="color: #000;"> Date of Birth: </span><?php echo $dob; ?></h5>
          <h5 class="text-muted"><span class="badge" style="color: #000;"> Address: </span><?php echo $add ?></h5>
          <h5 class="text-muted"><span class="badge" style="color: #000;"> City: </span><?php echo $city ?></h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
    </div>