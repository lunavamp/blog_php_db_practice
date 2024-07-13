<?php
include 'db.php';

// get form data
$title = $_POST['title'];
$content = $_POST['content'];

// add post
$sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "Post successfully added.";
    echo "<br><a href='index.php'>Go back to the blog</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
