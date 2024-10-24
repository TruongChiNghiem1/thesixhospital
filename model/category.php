<?php 
function duplicate ($name, $id = null) {
    if (is_null($id)) {
        $sql = "SELECT * FROM ga_category WHERE name = :name";
    } else {
        $sql = "SELECT * FROM ga_category WHERE name = :name AND id != $id";
    }

    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return false;
    } 

    return true;
}

function create ($data) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO ga_category (name, created_at) VALUES (:name, :created_at)");
    $stmt->bindParam(':name', $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $data["created_at"], PDO::PARAM_STR);
    return $stmt->execute();
}

function index () {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM ga_category ORDER BY created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function detail ($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM ga_category WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function edit ($data) {
    global $conn;
    $stmt = $conn->prepare("UPDATE ga_category SET name = :name, updated_at = :updated_at WHERE id = :id");
    $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
    $stmt->bindParam(':name', $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $data["updated_at"], PDO::PARAM_STR);
    return $stmt->execute();
}


function delete ($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM ga_category WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt->execute();
}
?>