<?php

// Déclaration du tableau des recettes
$recipes = [
    ['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
    ['Couscous','[...]','mickael.andrieu@exemple.com',false,],
];

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mon premier programme PHP</title>
  </head>
  <body>

  <h2>Page de test</h2>
        
        <p>
            Cette page contient du code HTML avec des balises PHP.<br />
            <?php /* Insérer du code PHP ici */ ?>
            Voici quelques petits tests :
        </p>
        <p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>

        <ul>
        <li style="color: blue;">Texte en bleu</li>
        <li style="color: red;">Texte en rouge</li>
        <li style="color: green;">Texte en vert</li>
        </ul>
        

    <?php
    
    echo "Ceci est du <strong>texte</strong>";
    echo"<BR>";
    echo("Celle-ci a été écrite \"entièrement\" en PHP.");
    echo"<BR>";
    $fullname = "Mathieu Nebra";
    echo "Bonjour $fullname et bienvenue sur le site !";
    echo"<BR>";
    echo 'Bonjour ' . $fullname . ' et bienvenue sur le site !';
// Calcul

/*$number = 2 + 4; // $number prend la valeur 6
$number = 5 - 1; // $number prend la valeur 4
$number = 3 * 5; // $number prend la valeur 15
$number = 10 / 2; // $number prend la valeur 5

// Allez on rajoute un peu de difficulté
$number = 3 * 5 + 1; // $number prend la valeur 16
$number = (1 + 2) * 2; // $number prend la valeur 6*/


$number = 10;
$result = ($number + 5) * $number; // $result prend la valeur 15
echo"<BR>";
$isEnabled = true; // La condition d'accès

// if ($isEnabled == true) {
//     echo "Vous êtes autorisé(e) à accéder au site ✅";
// }
// else {
//   echo "Accès refusé ❌ ";
// }

$isEnabled = true;
$isOwner = false;

if ($isEnabled && $isOwner) {
    echo 'Accès à la recette validé ✅';
} else {
    echo 'Accès à la recette interdit ! ❌';
}
     
?>
<?php $chickenRecipesEnabled = true; ?>

<?php if ($chickenRecipesEnabled): ?> <!-- Ne pas oublier le ":" -->

<h1>Liste des recettes à base de poulet</h1>

<?php endif; ?><!-- Ni le ";" après le endif -->
<BR>
<ul>
        <?php for ($lines = 0; $lines <= 1; $lines++): ?>
            <li><?php echo $recipes[$lines][0] . ' (' . $recipes[$lines][2] . ')'; ?></li>
        <?php endfor; ?>
    </ul>

    <?php
// Une bien meilleure façon de stocker une recette ! Tableau Associatif
// $recipe = [
//     'title' => 'Cassoulet',
//     'recipe' => 'Etape 1 : des flageolets, Etape 2 : ...',
//     'author' => 'john.doe@exemple.com',
//     'enabled' => true,
// ];

?>

<?php

/**
 * Déclaration du tableau des recettes
 * Chaque élément du tableau est un tableau numéroté (une recette)
 */
$recipes = [
    ['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
    ['Couscous','[...]','mickael.andrieu@exemple.com',false,],
];

for ($lines = 0; $lines <= 1; $lines++) {
    echo $recipes[$lines][0];
}
// Enregistrons les informations de date dans des variables
echo"<br>";
$day = date('d');
$month = date('m');
$year = date('Y');

$hour = date('H');
$minut = date('i');

// Maintenant on peut afficher ce qu'on a recueilli
echo 'Bonjour ! Nous sommes le ' . $day . '/' . $month . '/' . $year . 'et il est ' . $hour. ' h ' . $minut;

?>

<?php
function isValidRecipe(array $recipe) : bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}
$romanSalad = [
  'title' => 'Salade Romaine',
  'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
  'author' => 'laurene.castor@exemple.com',
  'is_enabled' => true,
];

$sushis = [
  'title' => 'Sushis',
  'recipe' => 'Etape 1 : du saumon ; Etape 2 : du riz',
  'author' => 'laurene.castor@exemple.com',
  'is_enabled' => false,
];


// Répond true !
$isRomandSaladValid = isValidRecipe($romanSalad);

// Répond false !
$isSushisValid = isValidRecipe($sushis);

?>
  </body>
</html>
