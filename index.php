<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Formulario PHP</title>
</head>

<body>
        <h1>Do you like my dog?</h1>
        <p>Her name is Kira.</p>

        <form action="HandleForm.php" method="post">
                <p>Name: <input required type="text" name="name" /></p>
                <p>Email: <input required type="email" name="email" /></p>

                <p>
                        Comment:
                        <textarea required cols="20" rows="1" name="comment"></textarea>
                </p>

                <input type="submit" value="Submit!" />
        </form>

        <img src="kira.jpg" alt="Kira's photo" height="300" />

        <div>
                <h2>Previous Comments: </h2>
                <?php
                $db_name = "responses";


                $db = new SQLite3('form_log.db');
                $res = $db->query("SELECT * FROM $db_name");

                while ($row = $res->fetchArray()) {
                        echo "
        <div>
        Name: {$row['name']}
        </div>
        ";
                }

                ?>

        </div>
</body>

</html>
