<style>
    body {
        font: 13px "Trebuchet MS", Arial, Helvetica, sans-serif;
        background: #EEE;
    }

    table {
        width: 600px;
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
    $student = $db->query('select * from students');
    $db->exec("SET NAMES utf8");

    ?>
    <table border="1px">

        <caption>STUDENTS TABLE</caption>

        <tr>
            <th>İD</th>
            <th>Name</th>
            <th>Number</th>
            <th>Teacher İD</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        foreach ($student as $std) {
            printf(
                '
                    <tr>
                    <td>%d</td>
                    <td>%s</td>
                    <td>%d</td>
                    <td>%d</td>
                    <td>
                    <a class = "a" href="students_delete.php?id=%d">Sil</a>
                    </td>
                    <td>
                    <a  class = "a" href="students_update.php?id=%d">Update</a>
                    </td>
                    </tr>',
                $std['id'],
                $std['name'],
                $std['number'],
                $std['teacher_id'],
                $std['id'],
                $std['id']
            );
        }
        ?>
    </table>
    <hr />
    <h3>Add New Record</h3>
    <form action="students_save.php" method="POST">
        Name : <input type="text" name="name" required placeholder="For example:Mustafa Haskul"><br />
        Number : <input type="text" name="number" required><br />
        Teacher : <select name="teacher_id">
            <option value="3">Halit</option>
            <option value="4">Mustafa</option>
            <option value="5">Faruk</option>
        </select><br>
        <input type="submit" value="Save">

    </form>
</body>


</html>