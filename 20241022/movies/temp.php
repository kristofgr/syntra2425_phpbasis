$db_host = 'db';
$db_user = 'username';
$db_password = 'password';
$db_db = 'syntrafs';
$db_port = 3306;

try {
$db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
echo "Error!: " . $e->getMessage() . "<br />";
die();
}
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);


$sql = "SELECT * FROM movies";

$stmt = $db->prepare($sql);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);




<!-- $sql = "SELECT id, name, category FROM soorten WHERE id = :id";

$stmt = connectToDB()->prepare($sql);
$stmt->execute([
  "id" => $id
]);
return $stmt->fetchAll(PDO::FETCH_ASSOC); -->