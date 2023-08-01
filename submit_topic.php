<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted form data
    $topicTitle = $_POST["topic-title"];
    $topicContent = $_POST["topic-content"];

    // Validate the form data (e.g., check for empty fields or length limits)

    // Connect to the database (replace placeholders with actual credentials)
    $dbHost = "localhost";
    $dbName = "your_database_name";
    $dbUser = "your_username";
    $dbPass = "your_password";

    try {
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert the topic into the database
        $stmt = $pdo->prepare("INSERT INTO topics (title, content) VALUES (:title, :content)");
        $stmt->bindParam(":title", $topicTitle);
        $stmt->bindParam(":content", $topicContent);
        $stmt->execute();

        // Redirect back to the forum page after successful submission
        header("Location: forum.html");
        exit();
    } catch (PDOException $e) {
        // Handle database connection or insertion errors here
        echo "Error: " . $e->getMessage();
        die();
    }
} else {
    // If someone tries to access the script directly without submitting the form, redirect them to the homepage
    header("Location: index.html");
    exit();
}
?>
