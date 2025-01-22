<?php
include 'header.php';
include 'php/config.php';

$id = $_GET['id'] ?? null; 
if (!$id) {
    echo "<p>Invalid category ID.</p>";
    exit;
}

$stmt = $conn->prepare("SELECT category FROM category WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "<p>Category not found.</p>";
    exit;
}
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category</h4>
                </div>
                <div class="card-body">
                    <form id="addCategoryForm">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                        <div class="mb-3">
                            <label for="category">Category</label>
                            <input type="text" name="category" class="form-control" 
                                   placeholder="Enter Category" required 
                                   value="<?php echo htmlspecialchars($row['category']); ?>">
                        </div>
                        <button type="submit" class="btn btn-dark">Update</button>
                    </form>
                    <div id="responseMessage"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>

<!-- Edit Category  -->
<script>
    $(document).ready(function () {
    $('#addCategoryForm').submit(function (event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: 'php/edit_category.php',
            type: 'POST',
            data: formData,
            success: function (response) {

                swal({
            title: "Successfully Updated!",
            text: "Category Updated Successfully!",
            icon: "success",
            button: "OK",
          }).then(() => {

            window.location.href = "category.php";
          });
            }
        });
    });
});

</script>
