<div class="col-xs-12 col-sm-12 col-md-6">
    <div class="card card-horizontal">
        <div class="row">
            <div class="col-md-5">
                <div class="image">
                    <img src="<?=ImageTools::pathEnseignePic($v);?>"/>
                    <div class="filter filter-red">
                        <a href="./?enseigne=<?=$v->url();?>" title="Voir l'enseigne <?=$v->nom();?>" class="btn btn-neutral btn-round">
                            <?php $type = $ENSEIGNE_MAN->getTypeList($v); echo $type[0]->type(); ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="content">
                    <p class="category">
                        <span class="label label-danger label-fill">
                            <i class="fa fa-compass" aria-hidden="true"></i> <span style="font-weight: bold;"><?=LocalisationTools::convertDistKm($v->dist());?></span>
                        </span>
                        <span class="label label-danger label-fill">
                            <i class="fa fa-globe" aria-hidden="true"></i> <span style="font-weight: bold;"><?=ucfirst(strtolower($v->ville()));?></span>
                        </span>
                    </p>

                    <a class="card-link" href="./?enseigne=<?=$v->url();?>" title="Voir l'enseigne <?=$v->nom();?>">
                        <h4 class="title"><?=$v->nom();?></h4>
                    </a>
                    <a class="card-link" href="./?enseigne=<?=$v->url();?>" title="Voir l'enseigne <?=$v->nom();?>">
                        <p class="description"><?=$v->description();?></p>
                    </a>
                    <div class="footer">
                        <div class="stats">
                            <a class="card-link" href="#">
                                <?php
                                    if($v->livraison() == 1){
                                        echo "<span class='text-success'>";
                                        echo "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";
                                        echo " Livraison (" . $v->rayon_livraison() . ' km)';
                                        echo "</span>";
                                    }
                                    else{
                                        echo "<span>";
                                        echo "<i class=\"fa fa-times\" aria-hidden=\"true\"></i>";
                                        echo " Livraison";
                                        echo "</span>";
                                    }
                                ?>
                            </a>
                        </div>
                        <div class="stats">
                            <a class="card-link" href="#">
                                <?php
                                if($v->sur_place() == 1){
                                    echo "<span class='text-success'>";
                                    echo "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";
                                    echo " Sur place";
                                    echo "</span>";
                                }
                                else{
                                    echo "<span>";
                                    echo "<i class=\"fa fa-times\" aria-hidden=\"true\"></i>";
                                    echo " Sur place";
                                    echo "</span>";
                                }
                                ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end card -->
</div>