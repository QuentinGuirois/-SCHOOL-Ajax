<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Exercice Application MVC PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>

<body>
    <div class="container-fluid"></div>
    <div class="container" id="blocPrincipal">
        <h1 class="display-4">Mes Clients</h1>
        <form id="myForm" class="form-control-sm">
            <ul class="list-unstyled">
                <li>
                    <label class="font-weight-bold text-uppercase" for="nom">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </li>
                <li>
                    <label class="font-weight-bold text-uppercase" for="prenom">Prénom :</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </li>
                <li>
                    <label class="font-weight-bold text-uppercase" for="email">Email :</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </li>
                <li>
                    <button type="button" class="btn btn-danger" id="add">Ajouter un client</button>
                    <button type="button" class="btn btn-danger" id="modif">Modifier le client</button>
                    <button type="button" class="btn btn-danger" id="annuler">Annuler</button>
                    <div id="reponse"></div>
                </li>
            </ul>
        </form>
        <table id="clients">
            <tr><th> Nom </th><th> Prénom </th><th> Email </th></tr>
            <?php
            include 'display.php' 
            ?>
        </table>
    </div> 
<footer id="footer">
    <div class="text-center">
        Test footer
        
        <!-- Bootstrap script / FontAwesome -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        
        <script src="https://kit.fontawesome.com/b81bf834cd.js" crossorigin="anonymous"></script>
        
    </div>
</footer>



</body>

</html>