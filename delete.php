<?php  
// Include the database connection script
include("./dbConnect.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize user inputs
    $id = intval($_POST['id']); // Sanitize ID as an integer

    // Check if the ID field is not empty
    if (!empty($id)) {
        // SQL query to delete the record from the database
        $sql = "DELETE FROM add_book WHERE id = ?";
        $stmt = $conn->prepare($sql); // Use prepared statements for security
        $stmt->bind_param("i", $id); // Bind the ID as an integer

        // Execute the query and check if the deletion was successful
        if ($stmt->execute()) {
            // Redirect back to index.php after successful deletion
            header("Location: index.php?message=Book+deleted+successfully");
            exit;
        } else {
            echo "<p class='text-danger'>Error: Unable to delete book. Please try again later.</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='text-warning'>Invalid book ID. Please try again.</p>";
    }
}

// Close the database connection
$conn->close();
?>
