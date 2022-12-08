<?php



list('name' => $name, 'email' => $email, 'comment' => $comment) = $_REQUEST;

if (!$name | !$email | !$comment) {
        header('Location: /');
}

$db_name = "responses";


$db = new SQLite3('form_log.db');

$db->enableExceptions(true);

try {
        $db->exec("INSERT INTO $db_name (name, email, comment) VALUES('$name', '$email', '$comment')");
} catch (Exception) {
        print "$name, you already said something about my dog!";

        $query = "SELECT * FROM $db_name WHERE email='$email'";

        $res = $db->query($query);

        list('comment' => $user_comment) = $res->fetchArray();

        print "<br/>";

        print "You said '$user_comment'.";

        print "<br/>";

        print '<a href="/">Return Home</a>';

        die();
}
