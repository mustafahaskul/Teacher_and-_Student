<?php 

try{
    $db = new PDO('mysql:host=localhost;dbname=teacher_and_student','root','');
    $sql = $db->prepare("insert into students set 
    name=:name,
    number=:number,
    teacher_id=:teacher_id");
    $add = $sql->execute(array(
        "name" => $_POST['name'],
        "number" => $_POST['number'],
        "teacher_id"=>$_POST['teacher_id']
    ));
    if ($add){
        header("Location: students.php");
        exit;
    }else
        echo "Kayıt eklenemedi";
}
catch (PDOException $exception)
{
    print $exception->getMessage();
}
$db=null;

