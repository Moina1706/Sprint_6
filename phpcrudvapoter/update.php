<?php
// Inclure le fichier
require_once "config.php";
 
// Definir les variables
$reference = $nom = $description = $prixachat = $prixvente = $quantite = $type="";
$reference_err = $name_err = $description_err =  $prixachat_err = $prixvente_err = $quantite_err = $type_err= "";

 
// verifier la valeur id dans le post pour la mise à jour
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // recuperation du champ chaché
    $id = $_POST["id"];
    
    // Validate reference
    $input_reference = trim($_POST["reference"]);
    if(empty($input_reference)){
        $reference_err = "Veuillez entrez une reference.";
       } else{
        $reference = $input_reference;
    }


    // Validate name
    $input_name = trim($_POST["nom"]);
    if(empty($input_name)){
        $name_err = "Veuillez entrez un nom.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Veuillez entrez a valid name.";
    } else{
        $nom = $input_name;
    }
    
    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Veuillez entrez la description.";     
    } else{
        $description= $input_description;
    }

    // Validate prix achat
    $input_prixachat = trim($_POST["prixachat"]);
    if(empty($input_prixachat)){
        $prixachat_err = "Veuillez entrez le prix d'achat.";
    } elseif(!ctype_digit($input_prixachat)){
        $prixachat_err = "Veuillez entrez une valeur positive.";
    } else{
        $prixachat = $input_prixachat;
    }

    // Validate prix vente
    $input_prixvente = trim($_POST["prixvente"]);
    if(empty($input_prixvente)){
        $prixvente_err = "Veuillez entrez le prix de vente.";
    } elseif(!ctype_digit($input_prixvente)){
        $prixvente_err = "Veuillez entrez une valeur positive.";
    } else{
        $prixvente = $input_prixvente;
    }


    // Validate quantite
    $input_quantite = trim($_POST["quantite"]);
    if(empty($input_quantite)){
        $quantite_err = "Veuillez entrez la quantite.";     
    } elseif(!ctype_digit($input_quantite)){
        $quantite_err = "Veuillez entrez une valeur positive.";
    } else{
        $quantite = $input_quantite;
    }
    
    // Validate Type de produit
    $input_type = $_POST["type"];
    if(empty($input_type)){
        $type_err = "Veuillez entrez un type.";     
    } else{
        $type = $input_type;
    }

    // verifier les erreurs avant modification
    if(empty($reference_err) && empty($name_err) && empty($description_err) && empty($prixachat_err) && empty($prixvente_err)&& empty($quantite_err) && empty($type_err)){
        // Prepare an update statement
        $sql = "UPDATE vapfactory SET reference=?, nom=?, description=?, prixachat=?, prixvente=?, quantite=?, type=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind les variables
            mysqli_stmt_bind_param($stmt, "sssdddsi", $param_reference, $param_nom, $param_description, $param_prixachat, $param_prixvente, $param_quantite, $param_type, $param_id);
            
            // Set parameters
            $param_reference=$reference;
            $param_nom = $nom;
            $param_description = $description;
            $param_prixachat = $prixachat;
            $param_prixvente = $prixvente;
            $param_quantite = $quantite;
            $param_type = $type;
            $param_id = $id;
            
            // executer
            if(mysqli_stmt_execute($stmt)){
                // enregistremnt modifié, retourne
                header("location: index.php");
                exit();
            } else{
                echo "Oops! une erreur est survenue.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // si il existe un paramettre id
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // recupere URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare la requete
        $sql = "SELECT * FROM vapfactory WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind les variables
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* recupere l'enregistremnt */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // recupere les champs
                    $reference = $row["reference"];
                    $nom = $row["nom"];
                    $description = $row["description"];
                    $prixachat = $row["prixachat"];
                    $prixvente = $row["prixvente"];
                    $quantite = $row["quantite"];
                    $type=$row["type"];
                } else{
                    // pas de id parametter valid, retourne erreur
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! une erreur est survenue.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // pas de id parametter valid, retourne erreur
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'enregistremnt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="menu">
<?php include 'header.php';?>
</div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Mise à jour de l'enregistrement</h2>
                    <p>Modifier les champs et enregistrer</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                   
                    
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" value="Vapoteuses" <?php if($type == 'Vapoteuses') echo 'checked="checked" ';?>>
                        <label class="form-check-label" for="inlineRadio1">Vapoteuses </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" value="E-Liquides" <?php if($type== 'E-Liquides') echo 'checked="checked" ';?>>
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
                            <span class="invalid-feedback"><?php echo $description_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Prix achat</label>
                            <input type="number" name="prixachat" class="form-control <?php echo (!empty($prixachat_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prixachat; ?>">
                            <span class="invalid-feedback"><?php echo $prixachat_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Prix vente</label>
                            <input type="number" name="prixvente" class="form-control <?php echo (!empty($prixvente_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prixvente; ?>">
                            <span class="invalid-feedback"><?php echo $prixvente_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Quantite</label>
                            <input type="number" name="quantite" class="form-control <?php echo (!empty($quantite_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantite; ?>">
                            <span class="invalid-feedback"><?php echo $quantite_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
