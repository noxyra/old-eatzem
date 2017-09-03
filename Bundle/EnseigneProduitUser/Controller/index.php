<?php

    $EnsManager = new EnseigneManager($db);
    $ProManager = new ProduitsManager($db);
    $ForManager = new FormatManager($db);

    $enseigne = $EnsManager->getByUrl($get['enseigne']);

    $produits = $EnsManager->getProdList($enseigne);

    foreach ($produits as $p){
        $p->hydrateFormats($db);
        $p->hydrateIngredients($db);
    }

    // Gestion des produits en fonction de la page + retour datatab
    $datatab = [];
    if($get['select'] == 'entrees'){
        $titre = "Nos Entrées";
        foreach($produits as $produit){
            if($produit->type() == '5'){
                $datatab[] = $produit;
            }
        }
    }
    elseif($get['select'] == 'plats'){
        $titre = "Nos Plats";
        foreach($produits as $produit){
            if($produit->type() == '6' OR $produit->type() == '7'){
                $datatab[] = $produit;
            }
        }
    }
    elseif($get['select'] == 'pizzas'){
        $titre = "Nos Pizzas";
        foreach($produits as $produit){
            if($produit->type() == '1'){
                $datatab[] = $produit;
            }
        }
    }
    elseif($get['select'] == 'desserts'){
        $titre = "Nos Desserts";
        foreach($produits as $produit){
            if($produit->type() == '8' OR $produit->type() == '2'){
                $datatab[] = $produit;
            }
        }
    }
    elseif($get['select'] == 'sandwichs'){
        $titre = "Nos Sandwish";
        foreach($produits as $produit){
            if($produit->type() == '10' OR $produit->type() == '11' OR $produit->type() == '12' OR $produit->type() == '13'){
                $datatab[] = $produit;
            }
        }
    }
    elseif($get['select'] == 'vienoiseries'){
        $titre = "Nos Viénoiseries";
        foreach($produits as $produit){
            if($produit->type() == '9'){
                $datatab[] = $produit;
            }
        }
    }
    elseif($get['select'] == 'boissons'){
        $titre = "Nos Boissons";
        foreach($produits as $produit){
            if($produit->type() == '3' OR $produit->type() == '4'){
                $datatab[] = $produit;
            }
        }
    }
    else{
        header('Location: .');
    }

?>