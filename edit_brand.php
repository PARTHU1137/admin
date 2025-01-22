<?php
include 'header.php';
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Edit Brand</h4>
        </div>
        <div class="card-body">
          <?php
          include 'php/config.php';
          $id = $_GET['id'];
          $sql = "SELECT * FROM company WHERE c_id={$id}";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row1 = mysqli_fetch_assoc($result)) {
          ?>
              <form id="editBrandForm" action="php/edit_brand.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <label for="">UserName</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter UserName"
                      value="<?php echo $row1['UserName']; ?>">
                  </div>
                  <div class="col-md-6">
                    <label for="">Category</label>
                    <?php
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <select class="form-select form-control" name="category" aria-label="Dropdown example">
                        <option>Select Category</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                          $select = ($row1['category'] == $row['id']) ? 'selected' : '';
                        ?>
                          <option <?php echo $select; ?> value="<?php echo $row['id']; ?>"><?php echo $row['category']; ?>
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="col-md-6">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email"
                      value="<?php echo $row1['Email']; ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label for="">URL</label>
                    <input type="url" name="url" class="form-control" placeholder="Enter url"
                      value="<?php echo $row1['url']; ?>" required>
                  </div>
                  <div class="col-md-12">
                    <label for="">Upload Photo</label>
                    <input type="text" hidden name="old_image" value="<?php echo $row1['image']; ?>">
                    <input type="file" name="new_image" class="form-control">
                    <label for="">Current Image:</label>
                    <img src="../influencer_images/<?php echo $row1['image']; ?>" alt="" height="50px" width="50px"
                      class="mt-2">
                  </div>
                  <input type="hidden" name="id" value="<?php echo $row1['c_id']; ?>">
                  <div class="col-md-12">
                    <button type="submit" name="save" value="Save" class="btn btn-dark mt-3">Update</button>
                  </div>
                </div>
              </form>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>

<!-- Edit Brand  -->
<script>
  $(document).ready(function() {
    // Submit the form via AJAX
    $('#editBrandForm').submit(function(e) {
      e.preventDefault(); // Prevent the default form submission

      // Create a FormData object to handle file uploads and form data
      var formData = new FormData(this);

      // AJAX request
      $.ajax({
        url: $(this).attr('action'), // Get the form action URL (php/edit_influencer.php)
        type: 'POST', // Use POST method
        data: formData, // Send the form data
        contentType: false, // Required for file upload
        processData: false, // Prevent jQuery from processing the data
        success: function(response) {
          // Check if the response is success or failure

          swal({
            title: "Successfully Updated!",
            text: "Brand Updated Successfully!",
            icon: "success",
            button: "OK",
          }).then(() => {

            window.location.href = "brand.php";
          });
        }
      });



    });
  });
</script>