<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test BDD PHP</title>
</head>
     <body>
        <h1>Bases de données MySQL</h1>
        <?php
            $servername = 'localhost';
            $username = 'moina1706';
            $password = 'moina1706';

            //On essaie de se connecter//
            try{
                $conn = new PDO("mysql:host=$servername;dbname=testphp", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
            }

            /*On capture les exceptions si une exception est lancée et on affiche
             les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
