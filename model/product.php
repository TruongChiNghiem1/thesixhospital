<?php 
function select_category () {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM ga_category");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function duplicate ($name, $id = null) {
    if (is_null($id)) {
        $sql = "SELECT * FROM ga_product WHERE name = :name";
    } else {
        $sql = "SELECT * FROM ga_product WHERE name = :name AND id != $id";
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
    $stmt = $conn->prepare("INSERT INTO ga_product (name, price, intro, content, image, category_id, created_at) VALUES (:name, :price, :intro, :content, :image, :category_id, :created_at)");
    $stmt->bindParam(':name', $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(':price', $data["price"], PDO::PARAM_STR);
    $stmt->bindParam(':intro', $data["intro"], PDO::PARAM_STR);
    $stmt->bindParam(':content', $data["content"], PDO::PARAM_STR);
    $stmt->bindParam(':image', $data["image"], PDO::PARAM_STR);
    $stmt->bindParam(':category_id', $data["category_id"], PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $data["created_at"], PDO::PARAM_STR);
    return $stmt->execute();
}

function index () {
    global $conn;
    $stmt = $conn->prepare("SELECT p.*, c.name as category_name FROM ga_product as p, ga_category as c WHERE c.id = p.category_id ORDER BY p.created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function detail ($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM ga_product WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function edit ($data) {
    global $conn;
    $stmt = $conn->prepare("UPDATE ga_product SET name=:name,price=:price,image=:image,intro=:intro,content=:content,category_id=:category_id,updated_at=:updated_at WHERE id=:id");
    $stmt->bindParam(':name', $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(':price', $data["price"], PDO::PARAM_STR);
    $stmt->bindParam(':intro', $data["intro"], PDO::PARAM_STR);
    $stmt->bindParam(':content', $data["content"], PDO::PARAM_STR);
    $stmt->bindParam(':image', $data["image"], PDO::PARAM_STR);
    $stmt->bindParam(':category_id', $data["category_id"], PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $data["updated_at"], PDO::PARAM_STR);
    $stmt->bindParam(':id', $data["id"], PDO::PARAM_STR);
    return $stmt->execute();
}

function delete ($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM ga_product WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt->execute();
}
?>