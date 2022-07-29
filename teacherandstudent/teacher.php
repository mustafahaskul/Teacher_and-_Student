<style>
body {
    font:13px "Trebuchet MS", Arial, Helvetica, sans-serif;
    background:#EEE;
}
 
table {
    width:400px;
    margin:100px auto;
    table-layout:fixed;
    border-collapse:collapse;
}
 
caption {
    font-size:18px;
    margin-bottom:10px;
    color:#CC0;
    font-weight:bold;
    caption-side:top;
}
 
tr:nth-child(odd) {
    background:#DDD;
}
 
td, th {
    padding:8px;
}
 
th {
    background:#0DD;
}</style>
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
        </tr>
        <?php
        foreach ($teacher as $tcr) {
            printf('
                    <tr>
                        <td>%d</td>
                        <td>%s</td>
                    </tr>', $tcr["id"], $tcr["name"]);
        }
        ?>
    </table>
    </body>
</html>