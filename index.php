<?php  
// Include the database connection script
include("./dbConnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/index.css">
</head>
<body>
    <div class="container my-5">
        <!-- Page Header -->
        <h1 class="mb-4 text-center text-primary">Book List</h1>

        <!-- Display Success Message -->
        <?php
        if (isset($_GET['message'])) {
            echo "<div class='alert alert-success'>{$_GET['message']}</div>";
        }
        ?>

        <!-- Add New Book Button -->
        <div class="text-end mb-4">
            <a href="./create.php" class="btn btn-success">Add New Book</a>
        </div>

        <!-- Table of Books -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `add_book`";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr style='cursor: pointer;' onclick=\"window.location.href='./view.php?id=" . $row['id'] . "'\">
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['book_title'] . "</td>
                                    <td>" . $row['book_author'] . "</td>
                                    <td>" . $row['book_type'] . "</td>
                                    <td>
                                        <a href='./edit-details.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm me-2'>Edit</a>
                                        <form action='./delete.php' method='POST' class='d-inline'>
                                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                                            <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                        </form>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center text-muted'>No books available</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap 5 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
