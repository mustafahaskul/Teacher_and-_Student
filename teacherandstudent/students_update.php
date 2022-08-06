<html>

<body>

    <?php
    if ($_POST) {
        $new_name = $_POST["name"];
        $new_teacher = $_POST['teacher_id'];
        $update_student_id = $_POST["hdnid"];
        $db = new PDO('mysql:host=localhost;dbname=teacher_and_student', 'root', '');
        $query = $db->prepare("update students set name = ?,teacher_id = ? where id = ?");
        $update = $query->execute(array($new_name, $new_teacher, $update_student_id));
        header("Location: students.php");
    }

    if ($_GET) {
        $id = $_GET['id'];
        $db = new PDO('mysql:host=localhost;dbname=teacher_and_student', 'root', '');
        $query = $db->query("select * from students where id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            $name = $query['name'];
            $teacher = $query['teacher_id'];
        }
    }
    ?>

    <h3>Update Information</h3>
    <form action="students_update.php" method="POST">
        <input type="hidden" name="hdnid" value="<?php echo $id ?>"><br>
        Name : <input type="text" name="name" value="<?php echo $name ?>" required placeholder="For example: Mustafa Haskul"><br />
        Teacher : <select name="teacher_id" value="<?php echo $teacher ?>">
            <option value="3">Halit</option>
            <option value="4">Mustafa</option>
            <option value="5">Faruk</option>
        </select><br>
        <input type="submit" value="Save">

    </form>
</body>


</html>