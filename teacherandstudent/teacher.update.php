<html>

<body>


    <?php
    if ($_POST) {
        $new_name = $_POST["name"];
        $update_teacher_id = $_POST["hdnid"];
        $db = new PDO('mysql:host=localhost;dbname=teacher_and_student', 'root', '');
        $query = $db->prepare("update teachers set name = ? where id = ?");
        $update = $query->execute(array($new_name, $update_teacher_id));
        header("Location: teacher.php");  
    }

    if ($_GET) {
        $id = $_GET['id'];
        $db = new PDO('mysql:host=localhost;dbname=teacher_and_student', 'root', '');
        $query = $db->query("select * from teachers where id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            $name = $query['name'];
        }
    }
    ?>

    <h3>Update Information</h3>
    <form action="teacher.update.php" method="POST">
        <input type="hidden" name="hdnid" value="<?php echo $id ?>"><br>
        Name : <input type="text" name="name" value="<?php echo $name ?>" required placeholder="For example: Mustafa Haskul"><br />
        <input type="submit" value="Save">

    </form>
</body>

</html>