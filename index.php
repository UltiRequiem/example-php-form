<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="output.css">
        <title>Formulario PHP</title>
</head>

<body class="bg-slate-400">

        <div class="flex flex-col items-center text-center">
                <header class="flex flex-col gap-1">
                        <h1 class="text-4xl">Do you like my dog?</h1>
                        <p class="font-semibold text-xl mb-1">Her name is Kira.</p>
                </header>

                <div>
                        <img src="https://kira.deno.dev" alt="Kira's photo" class="object-cover h-48 w-48" />
                </div>



                <form action="HandleForm.php" method="post" class="flex flex-col gap-3 m-2 ">
                        <div>
                                <p>Name: <input required type="text" name="name" /></p>
                        </div>

                        <div>

                                <p>Email: <input required type="email" name="email" /></p>
                        </div>


                        <div>
                                <p>
                                        Comment:
                                        <textarea required cols="20" rows="1" name="comment"></textarea>
                                </p>

                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

        </div>

        <div>
                <h2>Previous Comments: </h2>
                <?php
                $db_name = "responses";


                $db = new SQLite3('form_log.db');
                $res = $db->query("SELECT * FROM $db_name");

                while ($row = $res->fetchArray()) {
                        echo "
        <div class='bg-slate-600 m-3'>
        Name: {$row['name']}
        <br>
        Comment: {$row['comment']}

        </div>
        ";
                }

                ?>

        </div>
</body>

</html>
