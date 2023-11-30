<?php

require 'C:\xampp\htdocs\readyplay\php\form.php';

$id = filter_input(INPUT_GET, 'id');

if($id){
    $sql = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindvalue(":id", $id);
    $sql->execute();

    header("Location: /readyplay/lista.php");
}