<?php
$host = "localhost";
$port = "5432";
$dbname = "fitness_tracker";
$username = "postgres";
$password = "1234";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit;
}

// Process user input
if (isset($_POST['user_input'])) {
    $user_input = trim($_POST['user_input']);
    $stmt = $pdo->prepare("SELECT answer FROM questions_answers WHERE question ILIKE :question");
    $stmt->execute([':question' => '%' . $user_input . '%']);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //contitional statement
    if ($result) {
        echo $result['answer'];
    } else {
        echo "Sorry, I don't know the answer to that. Ask another question about fitness!";
    }
}

?>
