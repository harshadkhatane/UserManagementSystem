<?php
$allowedOrigin = 'http://localhost:3000';

// Debugging: Print received headers
error_log('Received Origin: ' . (isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : 'None'));

if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] == $allowedOrigin) {
    header("Access-Control-Allow-Origin: $allowedOrigin");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    header("Access-Control-Allow-Credentials: true");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }
} else {
    header('HTTP/1.1 403 Forbidden');
    echo json_encode(array("message" => "Origin not allowed"));
    exit();
}

header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        getUsers($servername, $username, $password, $dbname);
        break;
    case 'POST':
        addUser($servername, $username, $password, $dbname);
        break;
    case 'PUT':
        updateUser($servername, $username, $password, $dbname);
        break;
    case 'DELETE':
        deleteUser($servername, $username, $password, $dbname);
        break;
    default:
        http_response_code(405);
        echo json_encode(array("message" => "Method Not Allowed"));
        break;
}

function getUsers($servername, $username, $password, $dbname) {
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($users);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(array("message" => "Error: " . $e->getMessage()));
    }
}

function addUser($servername, $username, $password, $dbname) {
    $data = json_decode(file_get_contents("php://input"), true);

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, dob) VALUES (:name, :email, :password, :dob)");
        $stmt->execute(array(
            ":name" => $data['name'],
            ":email" => $data['email'],
            ":password" => password_hash($data['password'], PASSWORD_DEFAULT),
            ":dob" => $data['dob']
        ));

        echo json_encode(array("message" => "User added successfully"));
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(array("message" => "Error: " . $e->getMessage()));
    }
}

function updateUser($servername, $username, $password, $dbname) {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email, password = :password, dob = :dob WHERE id = :id");
        $stmt->execute(array(
            ":name" => $data['name'],
            ":email" => $data['email'],
            ":password" => password_hash($data['password'], PASSWORD_DEFAULT),
            ":dob" => $data['dob'],
            ":id" => $id
        ));

        echo json_encode(array("message" => "User updated successfully"));
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(array("message" => "Error: " . $e->getMessage()));
    }
}

function deleteUser($servername, $username, $password, $dbname) {
    $id = isset($_GET['id']) ? $_GET['id'] : die();

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(array(":id" => $id));

        echo json_encode(array("message" => "User deleted successfully"));
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(array("message" => "Error: " . $e->getMessage()));
    }
}
?>
