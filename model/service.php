<?php
function index () {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM dich_vu ORDER BY created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_service_by_id($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM dich_vu WHERE id_dich_vu = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function indexExId ($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM dich_vu WHERE id_dich_vu != :id ORDER BY created_at DESC LIMIT 4");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}