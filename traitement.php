<?php
    include 'connect.php';
    if($bdd){
        
        //AJOUT CLIENT
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])){
            try {
            $req = $bdd->prepare("INSERT INTO clientajax (nom, prenom, email) VALUES (:nom, :prenom, :email)");
            $req->bindParam(':nom', $_POST['nom']);
            $req->bindParam(':prenom', $_POST['prenom']);
            $req->bindParam(':email', $_POST['email']);
            $resultat = $req->execute();
                
            $MyId = $bdd->lastInsertId();
            echo ($MyId);
            
        } catch (Exception $e) {
            echo "Erreur de connexion :" .$e->getMessage();
        }
        }

        //SUPPRESSION
        if (isset($_GET['deleteid'])){
            try {
                $id = $_GET['deleteid'];
                $req   = $bdd->prepare("DELETE FROM clientajax WHERE id ='$id'");
                $resultat = $req->execute();
                echo json_encode($resultat);
            } catch (Exception $e) {
                echo "Erreur de connexion :" .$e->getMessage();
            }
         }

        //MODIFICATION
        if (isset($_GET['editid']) && isset($_POST['editNom']) && isset($_POST['editPrenom']) && isset($_POST['editEmail'])){
            
                
                $id = $_GET['editid'];
                $nom = $_POST["editNom"];
                $prenom = $_POST["editPrenom"];
                $email = $_POST["editEmail"];
                try {
                    
                    $req   = $bdd->prepare("UPDATE clientajax SET nom='$nom', prenom ='$prenom', email ='$email' WHERE id='$id'" );
                    $resultat = $req->execute();
                    echo json_encode($resultat);
                } catch (Exception $e) {
                    echo "Erreur de connexion :" .$e->getMessage();
                }
            }};
           
         
    