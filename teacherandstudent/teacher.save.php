<?php 

try{
    $db = new PDO('mysql:host=localhost;dbname=teacher_and_student','root','');
    $sql = $db->prepare("insert into teachers set 
    name=:name");
    $add = $sql->execute(array(
        "name" => $_POST['name']
    ));
    if ($add){
        header("Location: teacher.php");
        exit;
    }else
        echo "Kayıt eklenemedi";
}
catch (PDOException $exception)
{
    print $exception->getMessage();
}
$db=null;
