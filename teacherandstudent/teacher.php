<style>
    body {
        font: 13px "Trebuchet MS", Arial, Helvetica, sans-serif;
        background: #EEE;
    }

    table {
        width: 400px;
        margin: 100px auto;
        table-layout: fixed;
        border-collapse: collapse;
    }

    caption {
        font-size: 18px;
        margin-bottom: 10px;
        color: #CC0;
        font-weight: bold;
        caption-side: top;
    }

    tr:nth-child(odd) {
        background: #DDD;
    }

    td,
    th {
        padding: 8px;
    }

    th {
        background: #0DD;
    }
    a {
        text-decoration: none;
        font-size: 150%;
        color: black;
    }

    a:hover {
        font-size: 120%;
    }
</style>
<html>
    

<body>

    <?php
    $db = new PDO('mysql:host=localhost;dbname=teacher_and_student', 'root', '');
    $teacher = $db->query("select * from teachers");
    ?>
    <table border="1px">
        <caption>TEACHERS TABLE</caption>
        <tr>
            <th>İD</th>
            <th>Name</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        foreach ($teacher as $tcr) {
            printf('
                    <tr>
                        <td>%d</td>
                        <td>
                        <a  class = "a" href="student_list_by_teacher.php?id=%d">%s</a>
                        </td>
                        <td>
                        <a class = "a" href="teacher.delete.php?id=%d">Sil</a>
                        </td>
                        <td>
                        <a  class = "a" href="teacher.update.php?id=%d">Update</a>
                        </td>
                    </tr>', $tcr["id"], $tcr["id"], $tcr["name"],$tcr["id"],$tcr["id"]);
        }
        ?>
    </table>
    <hr />
    <h3>Add New Record</h3>
    <form action="teacher.save.php" method="POST">
        Name : <input type="text" name="name" required placeholder="For example:Faruk Kaynaklı"><br />
        <input type="submit" value="Save">

    </form>
</body>

</html>