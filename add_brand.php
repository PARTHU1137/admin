<?php
include 'header.php';
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Brand</h4>
        </div>
        <div class="card-body">
          <form id="addBrandForm" action="php/add_brand.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <label for="">Name</label>
                <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" required>
              </div>
              <div class="col-md-6">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Company Email " required>
              </div>
              <div class="col-md-6">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
              </div>
              <div class="col-md-6">
                <label for="">Upload Photo</label>
                <input type="file" name="photo" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="">URL</label>
                <input type="url" name="url" class="form-control" placeholder="Enter Website URL">
              </div>
              <div class="col-md-6">
                <label for="">Category</label>
                <?php
                include 'php/config.php';
                $sql = "SELECT*FROM category";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                ?>
                  <select class="form-select form-control" id="dropdownInput" aria-label="Dropdown example" name="category">
                    <option selected>Select Category</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['category'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                <?php
                }
                ?>
              </div>
              <div class="col-md-12">
                <button type="submit" value="Save" name="save" class="btn btn-dark mt-3">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include 'footer.php';
?>



<!-- Add Brand -->
<script>
  $(document).ready(function() {
    $('#addBrandForm').submit(function(e) {
      e.preventDefault(); // Prevent the default form submission

      var formData = new FormData(this); // Create FormData object to handle file uploads

      $.ajax({
        url: $(this).attr('action'), // Use the form's action attribute (add_brand.php)
        type: 'POST',
        data: formData,
        contentType: false, // Required for file upload
        processData: false, // Required for file upload
        success: function(response) {
          // Assuming the response will be "success" if everything is good
          swal({
            title: "Successfully Added!",
            text: " Brand Added Successfully!",
            icon: "success",
            button: "OK",
          });
          $('#addBrandForm')[0].reset();
        },
        error: function() {
          swal({
            title: "Something Went Wrong!",
            text: "Brand Not Added!",
            icon: "warning",
            button: "OK",
          });
        }
      });
    });
  });
</script>