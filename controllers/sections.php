<?php

require 'config/db.php';

function create($db ,$parent_id, $name, $data){
    if($parent_id == 'null'){
        $parent_id = null;
    }
    
    $stmt = $db->prepare("INSERT INTO sections (user_id, parent_id, name, data) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $parent_id, $name, $data]);
    header('Location: sections');
}

function read($pdo){   
    return $pdo->query("SELECT * FROM sections WHERE user_id = {$_SESSION['user_id']}")->fetchAll(PDO::FETCH_ASSOC);
}

function update($pdo, $id){
    
}

function delete($pdo, $id){
    return $pdo->query("DELETE FROM sections WHERE id={$id}");
}

require 'views/sections.view.php';