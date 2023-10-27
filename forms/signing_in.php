
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db_host = 'localhost';
    $db_name = 'recipe';
    $db_user = 'root';
    $db_pass = ''; // Replace with your actual database password

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM user WHERE email_address = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Password is correct
                echo "Login successful!\n";
            } else {
                // Password is incorrect
                echo "Incorrect password\n";
            }
        } else {
            // No matching email found
            echo "Email not found";
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }

    $pdo = null;
}
?>
