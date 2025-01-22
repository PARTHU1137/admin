<?php
    include 'header.php';
    
?>
 <div class="container-fluid py-2">
      <div class="row">
        <div class="ms-3">
          <h3 class="mb-3 h4 font-weight-bolder">Dashboard</h3>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <?php
                    include 'php/config.php';
                    $sql = "SELECT COUNT(*) AS total FROM category";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        
                    
                  ?>
                  <p class="text-sm mb-0 text-capitalize">Total Category</p>
                  <h4 class="mb-0"><?php echo$row['total'];?></h4>
                  <?php
                    }
                  ?>
                  <!-- <p class="text-sm mb-0 text-capitalize">Total Category</p>
                  <h4 class="mb-0">1</h4> -->
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">category</i>
                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3">
              <!-- <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+55% </span>than last week</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                <?php
                    include 'php/config.php';
                    $sql = "SELECT COUNT(*) AS total FROM influencer";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        
                    
                  ?>
                  <p class="text-sm mb-0 text-capitalize">Total Influencer</p>
                  <h4 class="mb-0"><?php echo$row['total'];?></h4>
                  <?php
                    }
                  ?>
                  <!-- <p class="text-sm mb-0 text-capitalize">Total Influencer</p>
                  <h4 class="mb-0">2300</h4> -->
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">person </i>
                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3">
              <!-- <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+3% </span>than last month</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                <?php
                    include 'php/config.php';
                    $sql = "SELECT COUNT(*) AS total FROM company";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        
                    
                  ?>
                  <p class="text-sm mb-0 text-capitalize">Total Brand</p>
                  <h4 class="mb-0"><?php echo$row['total'];?></h4>
                  <?php
                    }
                  ?>
                  <!-- <p class="text-sm mb-0 text-capitalize">Total Brand</p>
                  <h4 class="mb-0">3,462</h4> -->
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">business</i>
                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3">
              <!-- <p class="mb-0 text-sm"><span class="text-danger font-weight-bolder">-2% </span>than yesterday</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Total Revanue</p>
                  <h4 class="mb-0">₹103,430</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                <i class="material-symbols-rounded opacity-10">currency_rupee</i>
                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3">
              <!-- <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+5% </span>than yesterday</p> -->
            </div>
          </div>
        </div>
      </div>


<!-- Latest Influencer -->
<div class="col-12 mt-5">
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
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                <th class="text-capitalizecenter text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Follower</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td class="text-center">
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
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"><?php echo $row['Email']; ?></span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"><?php echo $row['Follower'] ?></span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">
                      <?php
                      echo $row['category'];
                      ?>
                    </span>
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
<!-- Latest Brand  -->
<div class="col-12 mt-5">
  <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">Brand</h6>
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-0">
        <?php
        include 'php/config.php';
        $sql = "SELECT*FROM company
                        INNER JOIN category
                        ON company.category = category.id
                        ORDER BY company.c_id ASC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
          <table class="table align-items-center mb-0" id="brand_table">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">UserName</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Website</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td class="text-center">
                    <?php echo $row['c_id']; ?>
                  </td>
                  <td>
                    <!-- <p class="text-xs font-weight-bold mb-0">Manager</p>
                        <p class="text-xs text-secondary mb-0">Organization</p>
                         -->
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="../influencer_images/<?php echo $row['image']; ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm"><?php echo $row['UserName'] ?></h6>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="text-xs text-secondary mb-0"><?php echo $row['Email']; ?></p>
                  </td>
                  
                  <td class="align-middle text-center text-sm">
                  <p class="text-xs text-secondary mb-0"><?php echo $row['category']; ?></p>
                  </td>
                  <td class="align-middle text-center text-sm">
                  <p class="text-xs text-secondary mb-0"><?php echo $row['url']; ?></p>
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
    include 'footer.php';
?>