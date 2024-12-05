<?php
function index () {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM dich_vu ORDER BY created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}