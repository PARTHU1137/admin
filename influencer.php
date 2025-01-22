<?php
include 'header.php';
?>
<div class="col-12">
  <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">Influencer</h6>
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-0">
        <?php
        include 'php/config.php';
        $sql = "SELECT*FROM influencer 
                        INNER JOIN category
                        ON influencer.category = category.id
                        ORDER BY influencer.i_id ASC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
          <table class="table align-items-center mb-0" id="influencer_table">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Follower</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                <th class="text-secondary opacity-7">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td>
                    <?php echo $row['i_id']; ?>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="../influencer_images/<?php echo $row['image']; ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm"><?php echo $row['UserName']; ?></h6>
                      </div>
                    </div>
                    <!-- <p class="text-xs font-weight-bold mb-0">Manager</p>
                        <p class="text-xs text-secondary mb-0">Organization</p> -->
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"><?php echo $row['Email']; ?></span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"><?php echo $row['Follower'] ?></span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"><?php echo $row['Description']; ?></span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">
                      <?php
                      echo $row['category'];
                      ?>
                    </span>
                  </td>
                  <td class="align-middle">
                    <a href="edit_influencer.php?id=<?php echo $row['i_id']; ?>" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">
                      <i class="material-symbols-rounded opacity-10">edit</i>
                      Edit</a>
                    <!-- <a href="" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true"> -->
                    <button type="submit" class="btn btn-danger delete_influencer" value="<?php echo $row['i_id']; ?>">
                      <i class="material-symbols-rounded opacity-10">delete</i>
                      Delete
                    </button>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php'
?>

<!-- Delete Influencer  -->
<script>
  $(document).ready(function() {
    $('.delete_influencer').click(function(e) {
      e.preventDefault();

      var id = $(this).val();
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
              url: "php/delete_influencer.php",
              data: {
                id: id
              },
              success: function(response) {
                if (response == '100') {
                  swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                  }).then(() => {
                    // Reload the table or page after successful deletion
                    location.reload(); // You can replace this with table reload if you don't want to reload the entire page
                  });;
                }

              }
            });

          }
        });
    });
  });
</script>


