<?php  
// Include the database connection script
include("./dbConnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <div class="form-container">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h5">Book Detail</h1>
            <a href="./index.php" class="btn btn-secondary btn-sm">Back</a>
        </header>  
        <div class="book-details">
            <?php 
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = intval($_GET['id']); // Sanitize the ID to prevent SQL injection
                $sql = "SELECT * FROM add_book WHERE id = ?"; // Corrected query with a placeholder
                $stmt = $conn->prepare($sql); // Use prepared statements
                $stmt->bind_param("i", $id); // Bind the ID as an integer
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $book = $result->fetch_assoc();
                    echo "<h2>" . htmlspecialchars($book['book_title']) . "</h2>";
                    echo "<p><strong>Author:</strong> " . htmlspecialchars($book['book_author']) . "</p>";
                    echo "<p><strong>Type:</strong> " . htmlspecialchars($book['book_type']) . "</p>";
                    echo "<p><strong>Description:</strong> " . htmlspecialchars($book['book_desc']) . "</p>";
                } else {
                    echo "<p class='text-danger'>Book not found.</p>";
                }
                $stmt->close();
            } else {
                echo "<p class='text-warning'>Invalid or missing book ID.</p>";
            }
            ?>
        </div>
    </div>
</div>
<!-- Bootstrap 5 JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
