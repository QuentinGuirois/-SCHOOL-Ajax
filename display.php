<?php
    //CONSTRUCTION DU TABLEAU DYNAMIQUE
    include 'connect.php';
    
    if($bdd){
        $query = "SELECT * FROM clientajax";
        $prep = $bdd->prepare($query);
        $result = $prep->execute();
        if ($result){
            $resultat = $prep->fetchAll(PDO::FETCH_ASSOC);
            $output = "";
            foreach($resultat as $row){
                $id = $row['id'];
                $output .= "<tr>";
                $output .= "<td>" . $row['nom'] . "</td>";
                $output .= "<td>" . $row['prenom'] . "</td>";
                $output .= "<td>" . $row['email'] . "</td>";
                $output .= "<td><a class='delete' href='#' data-id='". $row['id'] ."'><i class='fas fa-trash-alt'></i></a></td>";
                $output .= "<td><a class='edit' href='#' data-id='". $row['id'] ."'><i class='fas fa-pencil-alt'></i></a></td>";
                $output .= "</tr>";
            }
            echo $output;
        }
    } else {
        echo "Erreur de connexion";
    }