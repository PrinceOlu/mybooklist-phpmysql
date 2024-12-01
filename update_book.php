<?php  
// Include the database connection script
include("./dbConnect.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize user inputs
    $id = intval($_POST['id']); // Sanitize ID as an integer
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Check if all required fields are filled
    if (!empty($title) && !empty($author) && !empty($type) && !empty($description)) {
        // SQL query to update data into the database
        $sql = "UPDATE add_book 
                SET book_title = '$title', book_author = '$author', book_type = '$type', book_desc = '$description' 
                WHERE id = $id";

        // Execute the query and check if the update was successful
        if (mysqli_query($conn, $sql)) {
            echo "<p class='text-success'>Book updated successfully!</p>";
            header("Location: index.php?message=Book+updated+successfully");
            exit;
        } else {
            echo "<p class='text-danger'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p class='text-warning'>All fields are required. Please fill in all fields.</p>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
