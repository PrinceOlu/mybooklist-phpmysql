<?php  
// Include the database connection script
include("./dbConnect.php");

// Check if the form is submitted

    // Retrieve and sanitize user inputs
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Check if all required fields are filled
    if (!empty($title) && !empty($author) && !empty($type) && !empty($description)) {
        // SQL query to insert data into the database
        $sql = "INSERT INTO add_book (book_title, book_author, book_type, book_desc) 
                VALUES ('$title', '$author', '$type', '$description')";

        // Execute the query and check if the insertion was successful
        if (mysqli_query($conn, $sql)) {
            echo "New book added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
  
    }


// Close the database connection
mysqli_close($conn);
?>
