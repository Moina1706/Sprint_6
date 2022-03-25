<?php
// Inclure le fichier config
require_once "config.php";
 
// Definir les variables
$reference = $nom = $description = $prixachat = $prixvente = $quantite = "";
$reference_err = $name_err = $description_err = $prixachat_err = $prixvente_err = $quantite_err = "";
 
// Traitement
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // / Validate reference
    // $input_reference = trim($_POST["reference"]);
    // if(empty($input_reference)){
    //     $reference_err = "Veillez entrez la reference du produit.";
    // } elseif(!filter_var($input_reference, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $reference_err = "Veillez entrez a valid reference.";
    // } else{
    //     $reference = $input_reference;
    // }


// Validate reference
$input_reference = trim($_POST["reference"]);
if(empty($input_reference)){
    $reference_err = "Veillez entrez la reference du produit.";
} else{
    $reference = $input_reference;
}

    // Validate name
    $input_name = trim($_POST["nom"]);
    if(empty($input_name)){
        $name_err = "Veillez entrez un nom.";
    } else{
        $nom = $input_name;
    }
    
    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Veillez entrez une description.";     
    } else{
        $description = $input_description;
    }

    // Validate prixachat
    $input_prixachat = trim($_POST["prixachat"]);
    if(empty($input_prixachat)){
        $prixachat_err = "Veillez entrez le prix d'achat.";
     } elseif(!ctype_digit($input_prixachat)){
            $prixachat_err = "Veillez entrez une valeur positive.";     
    } else{
        $prixachat = $input_prixachat;
    }

    // Validate prix vente
    $input_prixvente = trim($_POST["prixvente"]);
    if(empty($input_prixvente)){
        $prixvente_err = "Veillez entrez le prix de vente.";  
     } elseif(!ctype_digit($input_prixvente)){
            $prixvente_err = "Veillez entrez une valeur positive.";   
    } else{
        $prixvente = $input_prixvente;
    }
    
    // Validate quantite
    $input_quantite = trim($_POST["quantite"]);
    if(empty($input_quantite)){
        $quantite_err = "Veillez entrez les quantites.";     
    } elseif(!ctype_digit($input_quantite)){
        $quantite_err = "Veillez entrez une valeur positive.";
    } else{
        $quantite = $input_quantite;
    }
    
    // verifiez les erreurs avant enregistrement
    if(empty($reference_err) && empty($name_err) && empty($description_err) && empty($prixachat_err) && empty($prixvente_err) && empty($quantite_err)){
        echo "Je suis dans la boucle";
        // Prepare an insert statement
        $sql = "INSERT INTO vapfactory (reference, nom, description, prixachat, prixvente, quantite) VALUES (?, ?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind les variables à la requette preparée
            mysqli_stmt_bind_param($stmt, "sssddd", $param_reference, $param_nom, $param_description, $param_prixachat, $param_prixvente, $param_quantite);
            // Set parameters
            $param_reference =$reference;
            $param_nom = $nom;
            $param_description = $description;
            $param_prixachat = $prixachat;
            $param_prixvente = $prixvente;
            $param_quantite = $quantite;
            
            // executer la requette
            if(mysqli_stmt_execute($stmt)){
                // opération effectuée, retour
                header("location: index.php");
                exit();
            } else{
                echo "Oops! une erreur est survenue.";
            }
            
        }
        
        // // Close statement
         mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Ajouter un produit Vap Factory</h2>
                    <p>Remplir le formulaire pour ajouter les produits du stock de Vape Electronique</p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                   

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="cigarette" value="ci" Default checked>
                        <label class="form-check-label" for="inlineRadio1">Cigarettes électroniques </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="liquide" value="li">
                        <label class="form-check-label" for="inlineRadio2">E-liquides</label>
                    </div>


                    <div class="form-group">
                            <label>Reference</label>
                            <input type="text" name="reference" class="form-control <?php echo (!empty($reference_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $reference; ?>">
                            <span class="invalid-feedback"><?php echo $reference_err;?></span>
                        </div>    
                    <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>
                            <span class="invalid-feedback"><?php echo $ecole_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Prix achat</label>
                            <input type="number" name="prixachat" class="form-control <?php echo (!empty($prixachat_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prixachat; ?>">
                            <span class="invalid-feedback"><?php echo $prixachat_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Prix Vente</label>
                            <input type="number" name="prixvente" class="form-control <?php echo (!empty($prixvente_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prixvente; ?>">
                            <span class="invalid-feedback"><?php echo $prixvente_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Quantite</label>
                            <input type="number" name="quantite" class="form-control <?php echo (!empty($quantite_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantite; ?>">
                            <span class="invalid-feedback"><?php echo $quantite_err;?></span>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>