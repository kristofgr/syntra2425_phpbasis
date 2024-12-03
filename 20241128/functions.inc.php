<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


function requiredLoggedIn()
{
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit;
    }
}

function requiredLoggedOut()
{
    if (isLoggedIn()) {
        header("Location: index.php");
        exit;
    }
}

function isLoggedIn(): bool
{
    session_start();

    $loggedin = FALSE;

    if (isset($_SESSION['loggedin'])) {
        if ($_SESSION['loggedin'] > time()) {
            $loggedin = TRUE;
            setLogin();
        }
    }

    return $loggedin;
}

function setLogin($uid = false)
{
    $_SESSION['loggedin'] = time() + 3600;

    if ($uid) {
        $_SESSION['uid'] = $uid;
    }
}


// CONNECTIE MAKEN MET DE DB
function connectToDB()
{
    // CONNECTIE CREDENTIALS
    $db_host = '127.0.0.1';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'phpbasis';
    $db_port = 8889;

    try {
        $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        die();
    }
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    return $db;
}


function insertUser(String $firstname, String $lastname, String $mail, String $password, int $optin): bool|int
{
    $db = connectToDB();
    $sql = "INSERT INTO users(firstname, lastname, mail, password, optin) VALUES (:firstname, :lastname, :mail, :password, :optin)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':mail' => $mail,
        ':password' => md5($password),
        ':optin' => $optin
    ]);
    return $db->lastInsertId();
}

function isValidLogin(String $mail, String $pass): bool|int
{
    $sql = "SELECT id FROM users WHERE mail=:mail AND password=MD5(:password) AND status=1";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
        ':mail' => $mail,
        ':password' => $pass
    ]);
    return $stmt->fetchColumn();
}

function mailExists(String $email): bool
{
    $sql = "SELECT COUNT(*) AS total FROM users WHERE mail=:mail";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
        ':mail' => $email
    ]);

    return (bool)$stmt->fetchColumn();
}

function getArticles($status = null): array
{
    $sql = 'SELECT articles.*, CONCAT(users.firstname, " ", users.lastname) AS users_name 
        FROM articles 
        LEFT JOIN users ON articles.user_id = users.id';

    if ($status !== null) {
        $status = (int)$status;
        $sql .= ' WHERE articles.status = ' . $status;
    }

    $sql .= ' ORDER BY publication_date DESC';

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
