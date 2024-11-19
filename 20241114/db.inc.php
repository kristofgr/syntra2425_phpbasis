<?php

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


// HAAL ALLE NEWS ITEMS OP UIT DE DB
function getNewsItems(): array
{
    $sql = "SELECT newsitems.*, authors.name as author_name FROM newsitems
    LEFT JOIN authors
    ON newsitems.author_id = authors.id;";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// HAAL HET NEWS ITEM MET SPECIFIEKE ID OP
function getNewsItemById(int $id): array|bool
{
    $sql = "SELECT newsitems.*, authors.name as author_name FROM newsitems
    LEFT JOIN authors
    ON newsitems.author_id = authors.id
    WHERE newsitems.id = :id;";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
        ":id" => $id
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertNewsItem(String $title, String $body, int $author = null, int $status = 1, String $publication_date = null): bool|int
{
    $db = connectToDB();
    $sql = "INSERT INTO newsitems(title, body, author_id, status, publication_date) VALUES (:title, :body, :author_id, :status, :publication_date)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':body' => $body,
        ':author_id' => $author,
        ':status' => $status,
        ':publication_date' => $publication_date
    ]);
    return $db->lastInsertId();
}

// UPDATE 1 SPECIFIEK RECORD BY ID
function updateNewsItem(int $id, String $title, String $body, int $author = null, int $status = 1): bool|int
{
    $db = connectToDB();
    $sql = "UPDATE newsitems 
        SET title = :title, body=:body, author_id = :author_id, status = :status, update_date = CURRENT_TIMESTAMP
        WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':body' => $body,
        ':author_id' => $author,
        ':status' => $status,
        ':id' => $id,
    ]);
    $success = (bool)$stmt->rowCount();
    return $success ? $id : false;
}

// HAAL ALLE AUTHORS OP UIT DE DB
function getAuthors(): array
{
    $sql = "SELECT * FROM authors ORDER BY name ASC";
    $stmt = connectToDB()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
}
