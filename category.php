<?php
include 'header.php';
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Category</h4>
        </div>
        <div class="card-body">
          <form id="addCategoryForm">
            <div class="mb-3">
              <label for="category">Category</label>
              <input type="text" name="category" class="form-control" placeholder="Enter Category" required>
            </div>
            <button type="submit" class="btn btn-dark">Add Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-12">
  <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n2 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">Category</h6>
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>
              <th class="text-secondary opacity-7">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'php/config.php';
            $sql = "SELECT*FROM category";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm"><?php echo $row['id']; ?></h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <?php echo $row['category']; ?>
                  </td>
                  <td class="align-middle">
                    <a href="edit_category.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">
                      <i class="material-symbols-rounded opacity-10">edit</i>
                      Edit</a>
                    <button type="submit" class="btn btn-danger delete_category" value="<?php echo $row['id']; ?>">
                      <i class="material-symbols-rounded opacity-10">delete</i>
                      Delete
                    </button>
                  </td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php
include 'footer.php';
?>
<!-- Add category  -->
<script>
  $(document).ready(function() {
    $('#addCategoryForm').submit(function(e) {
      e.preventDefault();

      var formData = $(this).serialize();

      $.ajax({
        url: 'php/add_category.php',
        type: 'POST',
        data: formData,
        success: function(response) {

          swal("Success!", "Category added successfully!", "success")
            .then(() => location.reload());
        },
      });
    });
  });
</script>

<!-- Delete Category  -->
<script>
  $(document).ready(function () {
    $('.delete_category').click(function(e){
      e.preventDefault();

      var id=$(this).val();
      swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
      type: "POST",
      url: "php/delete_category.php",
      data: {id:id},
      success: function (response) {
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        }).then(() => {
            window.location.href = "category.php";
            });
        
      }
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
    });
  });
</script>