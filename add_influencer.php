<?php
include 'header.php';
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Influencer</h4>
        </div>
        <div class="card-body">
        <form id="influencerForm" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <label for="">UserName</label>
              <input type="text" name="username" class="form-control" placeholder="Enter UserName">
            </div>
            <div class="col-md-6">
              <label for="">Category</label>
              <?php
                include 'php/config.php';
                $sql="SELECT*FROM category";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
              ?>
              <select class="form-select form-control" id="dropdownInput" aria-label="Dropdown example" name="category">
                <option selected>Select Category</option>
                <?php
                  while($row=mysqli_fetch_assoc($result)){ 
                ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['category']?></option>
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
              <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
            <div class="col-md-6">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Your password">
            </div>
            <div class="col-md-6">
              <label for="">Upload Photo</label>
              <input type="file" name="photo" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="">Follower</label>
              <input type="number" name="follower" class="form-control" placeholder="Enter Your Follower">
            </div>
            <div class="col-md-12">
              <label for="">Description</label>
              <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="col-md-12">
              <button type="button" id="submitFormButton" class="btn btn-dark mt-3">Save</button>
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

<!-- Add Influencer  -->
<script>
$(document).ready(function(){
    $('#submitFormButton').click(function(){
        var formData = new FormData($('#influencerForm')[0]);
        $.ajax({
            url: 'php/add_influencer.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                swal({
                    title: "Successfully Added!",
                    text: "Influencer Added Successfully!",
                    icon: "success",
                    button: "OK",
                });
                $('#influencerForm')[0].reset();
            },
            error: function(){
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
