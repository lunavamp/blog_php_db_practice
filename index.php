<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <style>
        main {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        form {
            max-width: 500px;
        }
        input, textarea {
            width: 100%;
        }
    </style>
</head>
<body>
   <main>
   <?php
    include 'db.php';

    // get posts list
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["content"] . "</p>";
            echo "<p><small>Posted on " . $row["created_at"] . "</small></p>";
            echo "<hr>";
        }
    } else {
        echo "No posts yet.";
    }

    $conn->close();
    ?>

    <h2>Add a Post</h2>
    <form action="add_post.php" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="7" required></textarea><br><br>
        <input type="submit" value="Add Post">
    </form>
   </main>
</body>
</html>
