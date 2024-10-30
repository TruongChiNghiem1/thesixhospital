<?php 
function duplicate ($username, $id = null) {
    if (is_null($id)) {
        $sql = "SELECT * FROM user WHERE username = :username";
    } else {
        $sql = "SELECT * FROM user WHERE username = :username AND id != $id";
    }

    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username',$username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return false;
    } 

    return true;
}

function create ($data) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO user (username, password, level, created_at) VALUES (:username, :password, :level, :created_at)");
    $stmt->bindParam(':username', $data["username"], PDO::PARAM_STR);
    $stmt->bindParam(':password', $data["password"], PDO::PARAM_STR);
    $stmt->bindParam(':level', $data["level"], PDO::PARAM_STR);
    $stmt->bindParam(':created_at',$data["created_at"], PDO::PARAM_STR);
    return $stmt->execute();
}

function index () {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM user ORDER BY created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function detail ($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM user WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function edit ($data) {
    global $conn;
    $stmt = $conn->prepare("UPDATE user SET username = :username, updated_at = :updated_at WHERE id = :id");
    $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
    $stmt->bindParam(':username', $data["username"], PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $data["updated_at"], PDO::PARAM_STR);
    return $stmt->execute();
}


function delete ($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM user WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt->execute();
}
?>