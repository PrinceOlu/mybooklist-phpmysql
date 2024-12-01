<?php  
// Include the database connection script
include("./dbConnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/create.css">
    <title>Edit Book Details</title>
</head>
<body>
    <div class="container mt-4">
        <div class="form-container">
            <header class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h5">Edit Book Details</h1>
                <a href="./index.php" class="btn btn-secondary btn-sm">Back</a>
            </header>
<?php 
$book = null; // Default to null in case no valid book is found
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the ID to prevent SQL injection
    $sql = "SELECT * FROM add_book WHERE id = ?"; // Use a prepared statement
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc(); // Fetch the book details
    } else {
        echo "<p class='text-danger'>Book not found.</p>";
    }
    $stmt->close();
} else {
    echo "<p class='text-warning'>Invalid or missing book ID.</p>";
}
?>
            <form action="update_book.php" method="post">
                <!-- Hidden ID Field -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($book['id'] ?? ''); ?>">

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Book Title</label>
                    <input type="text" class="form-control" id="title" name="title" 
                           value="<?php echo htmlspecialchars($book['book_title'] ?? ''); ?>" required>
                </div>

                <!-- Author -->
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" 
                           value="<?php echo htmlspecialchars($book['book_author'] ?? ''); ?>" required>
                </div>

                <!-- Book Type -->
                <div class="mb-3">
                    <label for="type" class="form-label">Book Type</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="" disabled>Select book type</option>
                        <?php 
                        $types = ["Adventure", "Fantasy", "Thriller", "Sci-fi", "Horror"];
                        foreach ($types as $type) {
                            $selected = ($book['type'] ?? '') === $type ? 'selected' : '';
                            echo "<option value=\"$type\" $selected>$type</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Book Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($book['book_desc'] ?? ''); ?></textarea>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Book</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous"></script>
</body>
</html>
