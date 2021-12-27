//*JS - JQUERY

$(document).ready(function () {
    //EXECUTION DES FONCTIONS
    $("#add").on("click", addClient); 
    $(".delete").on("click", deleteClient);
    $(".edit").on("click", editClient);


//AJOUT CLIENT
function addClient() {
    //VALEUR DES CHAMPS
    var nom = $("#nom").val(); 
    var prenom = $("#prenom").val();
    var email = $("#email").val();
    //console.log(id);

    //SI ILS NE SONT PAS VIDE
    if ((nom != "") && (prenom != "") && (email != "")) {
        jQuery.ajax({
            type: "POST",
            url: "traitement.php",
            data: {
                nom,
                prenom,
                email
            },
            success: function (response) {
                $("#reponse")
                    .hide()
                    .html("<p class=\"alert alert-success\"> Client " + nom + " " + prenom + " ajouté avec succès.</p>")
                    .fadeIn()
                    .delay(3000)
                    .fadeOut();
                $('input').val('');
                //ON INCREMENTE UN TR
                $('#clients').append("<tr><td>" + nom + "</td><td>" + prenom + "</td><td>" + email + "</td><td><a class='delete' href='#' data-id="+ response +" ><i class='fas fa-trash-alt'></i></a></td><td><a class='edit' href='#' data-id="+ response +"><i class='fas fa-pencil-alt'></i></a></td></tr>");
                $(".delete").on("click", deleteClient);
                $(".edit").on("click", editClient);
                console.log(response);
            },
            error: function () {
                $("#reponse")
                    .html("<p class=\"alert alert-danger\"> Une erreur s'est produite, veuillez réesayer.</p>");
            }
        });
    
    } else {
        $("#reponse")
                .html("<p class=\"alert alert-danger\"> Veuillez renseigner tous les champs.</p>")
                .fadeIn()
                .delay(3000)
                .fadeOut();
    }
};

function deleteClient() {
    
    //ON RECUPERE LA DATA DE ID INCREMENTE PRECEDEMMENT
    var id = $(this).data("id");
    var $a = $(this);

    $confirm = confirm("Souhaitez-vous vraiment supprimer ce client ?");
    console.log(id);
    
    //SI CONFIRMATION < REQUETE AJAX
    if ($confirm) {
        jQuery.ajax({
            type: "GET",
            data: 'deleteid=' + id, //ON IMPLEMENTE ID DANS LES DONNEES EN GET POUR PHP
            url: "traitement.php",
            success: function (response) {

                $("#reponse")
                    .hide()
                    .html("<p class=\"alert alert-success\"> Client supprimé avec succès.</p>")
                    .fadeIn()
                    .delay(3000)
                    .fadeOut();
                $a.parents('tr').fadeOut(); //$a.parents('tr').remove();



            },
            error: function () {
                $("#reponse")
                    .html("<p class=\"alert alert-danger\"> Une erreur s'est produite, veuillez réesayer.</p>")
                    .fadeIn()
                    .delay(3000)
                    .fadeOut();;
            }
        });
    }
}

function editClient() {

    var id = $(this).data("id");
    var $a = $(this);
    
    //ON RECUPERE LE TR DE THIS
    var tr = $a.parents('tr');
    
    //ON RECUPERE CHAQUE DONNEE TD
    var nomTr = tr.children().eq(0).html();
    var prenomTr = tr.children().eq(1).html();
    var emailTr = tr.children().eq(2).html();
    
    //GESTION AFFICHAGE BUTTON
    $("#add").fadeOut();
    $("#modif").fadeIn();
    $("#annuler").fadeIn();
    
    //VAR
    $("#prenom").val(prenomTr);
    $("#nom").val(nomTr);
    $("#email").val(emailTr);

    //GESTION CLICK ANNULER
    $("#annuler").on("click", function () {
        $('input').val('');
        $("#add").fadeIn();
        $("#modif").remove();
        $("#annuler").remove();
    });

    //CLICK MODIF
    $("#modif").click(function () {
        
        //APRES CLICK, ON RECUP LES VALUES DES CHAMPS
        var editNom = $("#nom").val();
        var editPrenom = $("#prenom").val();
        var editEmail = $("#email").val();
        
        //SI LES CHAMPS NE SONT PAS VIDES, ON ENVOIE LES DONNEES VERS AJAX
        if ((editNom != "") && (editPrenom != "") && (editEmail != "")) {
            jQuery.ajax({
                type: "POST",
                data: {
                    editNom,
                    editPrenom,
                    editEmail
                },
                url: "traitement.php?editid=" + id,
                
                //EN CAS DE SUCCES, ON MODIFIE LES DONNEES DU TD DE THIS
                success: function (response) {
                    tr.children().eq(0).html(editNom);
                    tr.children().eq(1).html(editPrenom);
                    tr.children().eq(2).html(editEmail);
                    $("#reponse")
                        .hide()
                        .html("<p class=\"alert alert-success\"> Client " + editNom + " " + editPrenom + " modifié avec succès.</p>")
                        .fadeIn(1000)
                        .delay(3000)
                        .fadeOut();
                    $('input').val('');
                    $("#add").fadeIn();
                    $("#modif").fadeOut();
                    $("#annuler").fadeOut();

                },
                error: function () {
                    $("#reponse")
                        .html("<p class=\"alert alert-danger\"> Une erreur s'est produite lors de la modification, veuillez réesayer.</p>")
                        .fadeIn(1000)
                        .delay(3000)
                        .fadeOut();
                }
            });
        } else {
            $("#reponse")
                .html("<p class=\"alert alert-danger\"> Veuillez renseigner tous les champs.</p>")
                .fadeIn(1000)
                .delay(3000)
                .fadeOut();
        }

    });
}
});
