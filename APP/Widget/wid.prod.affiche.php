<div class="card">
    <h3 class="panel-heading-spe-prod text-left">
        <?=$produit->appelation();?>
        <?php if(!empty($produit->ingredients())){ ?>
            <button type="button" class="btn btn-default pull-right" style="position: relative; top: -5px;" data-container="body" data-toggle="popover" data-placement="bottom" data-content="
        <?php
            $donnees = $produit->ingredients();
            $i = 0;
            $max = count($donnees);
            foreach($produit->ingredients() as $ing){
                echo $ing->nom();
                $i++;

                if($i < $max){
                    echo " | ";
                }
            }
            ?>
        ">
                <span class="fa fa-eye"></span>
            </button>
        <?php } ?>
    </h3>
    <p class="panel-body spe-image" style="background-image: url('<?=ImageTools::pathProduitsPic($produit);?>')">
        <?php if(!empty($produit->duree_limite())){ echo "<span class='spe-label-produit label label-success'>Termine le ".DateToolBox::conv_fr($produit->duree_limite())."  </span>"; } ?>
    </p>
    <div class="panel-body-spe-type text-center">
        <?=TypeProduitTool::getType($produit->type());?>
    </div>
    <p class="panel-footer spe-price">
        <?php if($produit->formats() == null OR empty($produit->formats()) OR count($produit->formats()) == 0){ ?>
            <span class="special-prix prix-warning">Aucun prix à afficher</span>
        <?php }elseif(count($produit->formats()) == 1){ $format = $produit->formats(); ?>
            <span class="special-prix prix-success"><?=$format[0]->prix();?>€</span>
            <?php unset($format); }else{
            foreach ($produit->formats() as $format){ ?>
                <span class="special-prix prix-multi">
                            <span><?=$format->prix();?>€</span>
                            <span><?=$format->format();?><?=TypeFormatTool::getType($format->unite());?></span>
                        </span>
            <?php }} ?>
    </p>
    <?php if(isset($pro_mode) AND $pro_mode == true){ ?>
        <div class="panel-body alert-warning text-right border-bottom">
            <a type="button" class="btn btn-warning" title="Modifier le produit" href="./?page=editer_produit&prod_id=<?=$produit->id();?>"><span class="fa fa-cog" aria-hidden="true"></span></a>
            <a type="button" class="btn btn-default" title="Ajouter un format" href="./?page=ajout_format&prod_id=<?=$produit->id();?>"><span class="fa fa-plus" aria-hidden="true"></span></a>
            <a type="button" class="btn btn-default" title="Gérer les formats" href="./?page=gestion_format&prod_id=<?=$produit->id();?>"><span class="fa fa-link" aria-hidden="true"></span> Formats</a>
            <a type="button" class="btn btn-danger suppress_button" title="Supprimer le produit" href="./?page=gestion_produits&delete_id=<?=$produit->id();?>"><span class="fa fa-trash" aria-hidden="true"></span></a>
        </div>
    <?php } ?>
</div>