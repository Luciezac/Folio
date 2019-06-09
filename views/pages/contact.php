<?php 

include 'views/partials/header.php';

    //Sending a complete form 
    $messages = [
        'error' => [],
        'success' => [],
    ];

    if(!empty($_POST))
    { 
        // get the variables 
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $societe = trim($_POST['societe']);
        $content = trim($_POST['content']);


        // Errors
        if(empty($nom))
        {
            $messages['error']['nom'] = 'Pas de nom';
        }
        
        if(empty($prenom))
        {
            $messages['error']['prenom'] = 'Pas de prénom';
        }

        if(empty($societe))
        {
            $messages['error']['societe'] = 'Pas de société';
        }

        if(empty($content))
        {
            $messages['error']['content'] = 'Pas de message';
        }

        
        // Get the content 
        if(empty($messages['error']))
        {   
            $prepare = $pdo->prepare(' 
            INSERT INTO 
                form (nom, prenom, societe, content)
            VALUES
                (:nom, :prenom, :societe, :content)
            ');

            $prepare->bindValue('nom', $nom);
            $prepare->bindValue('prenom', $prenom);
            $prepare->bindValue('societe', $societe);
            $prepare->bindValue('content', $content);
            $execute = $prepare->execute();

            $messages['success'][] = 'Message envoyé';
            
            echo "Votre message a bien été envoyé";

        }
    }
?>

<div class=page>

    <div class="illu_form">
        <img src="assets/images/illu_form.svg" alt="illuform">
    </div>

    <div class="contact_form">

        <div>
            <h2>Travaillons ensemble!</h2>
        </div>

        <form  class="all" action="#" method="post" enctype="multipart/form-data">

            <div class="form">
                <div class="element">
                    <label for="nom">Nom</label>
                    <input class="inputBlock" type="text" name="nom" id="nom">
                        <?php if (isset($messages['error']['nom'])): ?>
                            <p><?=$messages['error']['nom'] ?> </p>
                        <?php endif; ?>
                </div>

                <div class="element">
                    <label for="prenom">Prénom</label>
                    <input class="inputBlock" type="text" name="prenom" id="prenom">
                        <?php if (isset($messages['error']['prenom'])): ?>
                            <p><?=$messages['error']['prenom'] ?> </p>
                        <?php endif; ?>
                </div>

                <div class="element">
                    <label for="societe">Société</label>
                    <input class="inputBlock" name="societe" id="societe">
                        <?php if (isset($messages['error']['societe'])): ?>
                            <p><?=$messages['error']['societe'] ?> </p>
                        <?php endif; ?>
                </div>

                <div class="element">
                    <label for="content">Message</label>
                    <textarea class="inputBlock"name="content" id="content" cols="30" rows="10"></textarea>
                        <?php if (isset($messages['error']['content'])): ?>
                            <p><?=$messages['error']['content'] ?> </p>
                        <?php endif; ?>
                </div>

                <input class="inputBlock2" type="submit" value="ENVOYÉ">

            </div>
        </form>
    </div>
</div>






