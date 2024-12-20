<?php

function connectToDB()
{
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


function getOgLinks(): array
{
    $sql = "SELECT * FROM oglinks";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertOgLink(String $url, $title, $description, $image): bool|int
{
    $db = connectToDB();
    $sql = "INSERT INTO oglinks(url, ogtitle, ogdescription, ogimage) VALUES (:url, :ogtitle, :ogdescription, :ogimage)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        'url' => $url,
        'ogtitle' => mb_strimwidth($title, 0, 250, "..."),
        'ogdescription' => mb_strimwidth($description, 0, 250, "..."),
        'ogimage' => mb_strimwidth($image, 0, 250, "..."),
    ]);

    return $db->lastInsertId();
}


function getOgViaApi(String $ogUrl): bool|stdClass
{
    $curl_handle = curl_init();

    $apiURL = "https://opengraph.io/api/1.1/site/" . urlencode($ogUrl) . "?app_id=31af649c-7c04-4a48-a52d-7ec16f461bb7";

    curl_setopt($curl_handle, CURLOPT_URL, $apiURL); // de locatie waar ik een request naartoe stuur
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true); // ik wil een antwoord ontvangen van de request url
    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false); // expliciet zeggen dat we van http naar https toch willen werken

    $curl_data = curl_exec($curl_handle);
    curl_close($curl_handle);

    $response = json_decode($curl_data);

    if ($response === null)
        return false;

    return $response;
}
