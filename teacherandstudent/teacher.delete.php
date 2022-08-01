<?php
if($_GET){
    $id = $_GET['id'];
    $db = new PDO('mysql:host=localhost;dbname=teacher_and_student','root','');
    $query = $db->prepare("delete from teachers where id = ?");
    $del = $query->execute(array($id));
    header("Location: teacher.php");
}
