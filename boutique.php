<?php

//GALLARDO Pierre BTS SIO1

$articlesBoutique = ["Chaussures","T-Shirts","Jeans","Pulls","Montres"]; //initialisation du tableau des articles disponibles + taille minimum de 5 éléments
$quantitéArticles = [10,10,10,10,10]; //initialisation du tableau des quantités des articles + taille qui doit être égale aux articles disponibles
$quantitéVendues = [0,0,0,0,0];

echo "Bienvenue dans la boutique !";
echo "\n1. Affichage stock\n2. Vendre un objet\n3. Réapprovisionner le stock\n4. Suivi des ventes\n5. Supprimer un article\n6. Ajouter un article\n7. Quitter\n";
$choix = readline("Saisir un choix : ");
while($choix != 7){
    if ($choix == 1) {
        echo "Articles disponibles : \n";

        //boucle for qui affiche les articles disponibles avec leurs quantités

        for($i=0;$i<count($articlesBoutique);$i++) {
            echo ("ID de l'article : ".$i." | Nom de l'article : ".$articlesBoutique[$i]  ." | Quantité : ".$quantitéArticles[$i]);
            echo "\n";
        }
        /*
        foreach($articlesBoutique as $articles) {
            echo ("Nom de l'article $articles \n");
        } 
        */
    }elseif ($choix == 2){
        //vente

        $choixID=readline("Saisir un ID d'article : ");
        while($choixID > count($articlesBoutique)){
            echo "Veuillez choisir un ID présent dans la boutique.\n";
            $choixID=readline("Saisir un ID d'article : ");
        }
        $quantitéVente=readline("Saisir une quantité à vendre: ");
        while($quantitéVente<0){
            echo "Veuillez saisir une quantité à vendre supérieur à 0.\n";
            $quantitéVente=readline("Saisir une quantité à vendre: ");
        }

        if ($quantitéArticles[$choixID]-$quantitéVente<0) {
            echo "On ne peut pas vendre l'article : ".$articlesBoutique[$choixID]."| Stock insuffisant";
        }else{
            $quantitéArticles[$choixID]-=$quantitéVente;
            $quantitéVendues[$choixID]+=$quantitéVente;
            echo ("ID de l'article : ".$choixID." | Nom de l'article : ".$articlesBoutique[$choixID]  ." | Quantité : ".$quantitéArticles[$choixID]."\n");
        }
    }elseif ($choix == 3){
        //réapprovisionner le stock
        $choixID=readline("Saisir un ID d'article : ");
        while($choixID > count($articlesBoutique)){
            echo "Veuillez choisir un ID présent dans la boutique.\n";
            $choixID=readline("Saisir un ID d'article : ");
        }

        $quantitéAchat=readline("Saisir une quantité à réapprovisionner : ");
        while($quantitéAchat<0){
            echo "Veuillez saisir une quantité à réapprovisionner supérieur à 0.\n";
            $quantitéAchat=readline("Saisir une quantité à réapprovisionner : ");
        }
        
        $quantitéArticles[$choixID]+=$quantitéAchat;
        
        echo ("ID de l'article : ".$choixID." | Nom de l'article : ".$articlesBoutique[$choixID]  ." | Quantité : ".$quantitéArticles[$choixID]."\n"); 
    }elseif ($choix == 4){
        for($i=0;$i<count($articlesBoutique);$i++) {
            echo ("ID de l'article : ".$i." | Nom de l'article : ".$articlesBoutique[$i]  ." | Quantité : ".$quantitéArticles[$i]." | Quantité vendu : ".$quantitéVendues[$i]);
            echo "\n";
        }
    }elseif ($choix == 5){ //supprimer article
        $choixID=readline("Saisir un ID d'article : ");
        while($choixID > count($articlesBoutique)){
            echo "Veuillez choisir un ID présent dans la boutique.\n";
            $choixID=readline("Saisir un ID d'article : ");
        }
        $elementSup = $articlesBoutique[$choixID];
        array_splice($articlesBoutique,$choixID,1);
        array_splice($quantitéArticles,$choixID,1);
        array_splice($quantitéVendues,$choixID,1);

        echo "Voici la boutique après suppression de $elementSup :\n";
        for($i=0;$i<count($articlesBoutique);$i++) {
            echo ("ID de l'article : ".$i." | Nom de l'article : ".$articlesBoutique[$i]  ." | Quantité : ".$quantitéArticles[$i]);
            echo "\n";
        }
    }elseif ($choix == 6){
        $nomArticle = readline("Veuillez saisir l'article que vous souhaitez ajouter :");
        array_push($articlesBoutique,$nomArticle);
        array_push($quantitéArticles,0);
        array_push($quantitéVendues,0);
    }
    
    echo "\n1. Affichage stock\n2. Vendre un objet\n3. Réapprovisionner le stock\n4. Suivi des ventes\n5. Supprimer un article\n6. Ajouter un article\n7. Quitter\n";
    $choix = readline("Saisir un choix : ");

}