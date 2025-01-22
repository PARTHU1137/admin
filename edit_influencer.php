<?php
include 'header.php';
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Edit Influencer</h4>
        </div>
        <div class="card-body">
          <?php
          include 'php/config.php';
          $id = $_GET['id'];
          $sql = "SELECT*FROM influencer WHERE i_id={$id}";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row1 = mysqli_fetch_assoc($result)) {
          ?>
              <form id="editInfluencerForm" action="php/edit_influencer.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <label for="">UserName</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter UserName" value="<?php echo $row1['UserName']; ?>">
                  </div>
                  <div class="col-md-6">
                    <label for="">Category</label>
                    <?php
                    $sql = "SELECT*FROM category";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <select class="form-select form-control" id="dropdownInput" aria-label="Dropdown example" name="category">
                        <option>Select Category</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                          $select = ($row1['category'] == $row['id']) ? 'selected' : '';
                        ?>
                          <option <?php echo $select; ?> value="<?php echo $row['id']; ?>"><?php echo $row['category'] ?></option>
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
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $row1['Email']; ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label for="">Follower</label>
                    <input type="number" name="follower" class="form-control" placeholder="Enter Your Follower" value="<?php echo $row1['Follower']; ?>">
                  </div>
                  <div class="col-md-12">
                    <label for="">Upload Photo</label>
                    <input type="text" hidden name="old_image" value="<?php echo $row1['image']; ?>">
                    <input type="file" name="new_image" class="form-control">
                    <label for="">Current Image:</label>
                    <img src="../influencer_images/<?php echo $row1['image']; ?>" alt="" height="50px" width="50px" class="mt-2">
                  </div>
                  <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"><?php echo $row1['Description']; ?></textarea>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $row1['i_id']; ?>">
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



<!-- Edit Influencer  -->
<script>
  $(document).ready(function() {
    $('#editInfluencerForm').submit(function(e) {
      e.preventDefault(); // Prevent the default form submission

      var formData = new FormData(this); // Create FormData object to handle file uploads

      $.ajax({
        url: $(this).attr('action'), // Use the form's action attribute (edit_influencer.php)
        type: 'POST',
        data: formData,
        contentType: false, // Required for file upload
        processData: false, // Required for file upload
        success: function(response) {

          swal({
            title: "Successfully Updated!",
            text: "Influencer Updated Successfully!",
            icon: "success",
            button: "OK",
          }).then(() => {
            window.location.href = "influencer.php";
          });
        },
        error: function() {
          swal({
            title: "Something Went Wrong!",
            text: "Influencer Not Added!",
            icon: "warning",
            button: "OK",
          });
        }
      });
    });
  });
</script>