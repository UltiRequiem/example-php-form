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

        $res = $db->query("SELECT * FROM $db_name WHERE email MATCH '$email'");

        while ($row = $res->fetchArray()) {
                echo "{$row['id']} {$row['name']} {$row['price']} \n";
        }

        die();
}


print "Your name is $name, your email is $email and you said '$comment.'";

print "<br/>";

print 'Response saved successfully!';
