<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/create.css">
    <title>Add New Book</title>
</head>
<body>
    <div class="form-container">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h5">Add New Book</h1>
            <a href="./index.php" class="btn btn-secondary btn-sm">Back</a>
        </header>

        <form action="add_book.php" method="post">
            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" required>
            </div>

            <!-- Author -->
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Enter author's name" required>
            </div>

            <!-- Book Type -->
            <div class="mb-3">
                <label for="type" class="form-label">Book Type</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="" disabled selected>Select book type</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Sci-fi">Sci-fi</option>
                    <option value="Horror">Horror</option>
                </select>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Book Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter book description" required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Create Book</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous"></script>

</body>
</html>
