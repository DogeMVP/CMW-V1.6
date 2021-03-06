<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> Menus
            <small>Gestionnaire des Menus</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a data-toggle="collapse" data-parent="#adminPanel" href="#informations">Informations</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Menus
            </li>
        </ol>
        <hr>
        <?php if($_Joueur_['rang'] != 1 AND ($_PGrades_['PermsPanel']['menus']['actions']['addLinkMenu'] == false AND $_PGrades_['PermsPanel']['menus']['actions']['addDropLinkMenu'] == false AND $_PGrades_['PermsPanel']['menus']['actions']['editDropAndLinkMenu'] == false)) { ?>
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <div class="alert alert-danger">
                    <strong>Vous avez aucune permission pour accéder aux menus.</strong>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <div class="alert alert-success">
                    <strong>Vous pouvez créer et modifier des liens qui seront visibles sur la barre du menu principal. Vous pouvez aussi éditer des listes déroulantes. Ces dernières sont plus compliquées à créer. Ce lien basique contient juste un nom et une adresse, vous pouvez choisir parmis 2 catégories pour l'adresse: une page du site (par exemple une page "nous rejoindre !") ou un lien direct(comme un lien "faire un don"). Vous devez créer la page avant de la mettre sur le menu ! Pour gérer une liste déroulante, vous y attribuez au départ un nom et un premier élément de la liste, vous pourrez rajouter une infinitée de liens sur votre liste par la suite !</strong>
                </div>
            </div>
        <?php }
        if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['menus']['actions']['addLinkMenu'] == true) { ?>
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <h3>Création d'un lien menu</h3>
            </div>
            <form method="POST" action="?&action=newLienMenu">
                <div class="col-lg-6 col-lg-offset-3 text-center">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-lg-6 col-lg-offset-3">
                                <h3>Créer un lien</h3>
                                <div class="row">
                                    <label class="control-label">Nom</label>
                                    <input type="text" class="form-control" name="menuTexte" placeholder="Nom du lien">
                                </div>
                                <div class="row">
                                    <label class="control-label">
                                        <input type="radio" name="methode" value="1" checked> Lien 
                                    </label>
                                    <input type="text" class="form-control" name="menuLien" placeholder="ex: http://minecraft.net/">
                                </div>
                                <div class="row">
                                    <label class="control-label">
                                        <input type="radio" name="methode" value="2"> Page
                                    </label>
                                    <select class="form-control" name="page">
                                    <?php $i = 0;
                                    while($i < count($pages)) { ?>
                                        <option value="<?php echo $pages[$i]; ?>"><?php echo $pages[$i]; ?></option><?php $i++;
                                    } ?>
                                    </select>
                                </div>
                                <hr>
                                <div class="row">
                                    <input type="submit" class="btn btn-success" value="Créer le lien !"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php }
        if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['menus']['actions']['addDropLinkMenu'] == true) { ?>
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <h3>Création d'une liste déroulante</h3>
            </div>
            <form method="POST" action="?&action=newListeMenu">
                <div class="col-lg-6 col-lg-offset-3 text-center">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-lg-6 col-lg-offset-3">
                                <h3>Créer une liste déroulante</h3>
                                <div class="row">
                                    <label class="control-label">Nom</label>
                                    <input type="text" class="form-control" name="menuTexte" placeholder="Nom de la liste">
                                </div>
                                <div class="row">
                                    <label class="control-label">Lien #1</label>
                                    <input type="text" class="form-control" name="lienTexte" placeholder="Nom du lien">
                                    <div class="row">
                                        <label class="control-label">
                                            <input type="radio" name="methode" value="1" checked> Lien 
                                        </label>
                                        <input type="text" class="form-control" name="menuLien" placeholder="ex: http://minecraft.net/">
                                    </div>
                                    <div class="row">
                                        <label>
                                            <input type="radio" name="methode" value="2"> Page
                                        </label>
                                        <select class="form-control" name="page">
                                            <?php $i = 0;
                                            while($i < count($pages)) { ?>
                                                <option value="<?php echo $pages[$i]; ?>"><?php echo $pages[$i]; ?></option><?php $i++;
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <em>Vous pourrez rajouter des liens plus tard..</em>
                                <hr>
                                <div class="row">
                                    <input type="submit" class="btn btn-success" value="Créer une liste déroulante !"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php }
        if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['menus']['actions']['editDropAndLinkMenu'] == true) { ?>
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <h3>Edition des liens</h3>
            </div>
            <form method="POST" action="?&action=general">
                <div class="col-lg-6 col-lg-offset-3 text-center">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-lg-6 col-lg-offset-3">
                                <h3>Modifier les liens basiques</h3>
                                <div class="row">
                                    <ul class="nav nav-tabs">
                                        <?php for($i = 0; $i < count($lectureMenu['MenuTexte']); $i++) { ?>
                                            <li class="<?php if($i == 0) echo 'active'; ?>">
                                                <a href="#editLiens<?php echo $i; ?>" data-toggle="tab"><?php echo $lectureMenuA['MenuTexte'][$i]; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="tab-content">
                                        <?php for($i = 0; $i < count($lectureMenu['MenuTexte']); $i++) { ?>
                                            <form class="tab-pane <?php if($i == 0) echo 'active'; ?>" id="editLiens<?php echo $i; ?>" method="post" action="?&action=modifierLien&id=<?php echo $i; ?>">
                                                <h4>Lien de menu #<?php echo $lectureMenu['MenuTexte'][$i]; ?><a class="label label-danger pull-right" href="?&action=supprLienMenu&id=<?php echo $i; ?>">Supprimer le lien...</a></h4>
                                                <div class="row">
                                                    <div class="row">
                                                        <label class="control-label">Titre du lien</label>
                                                        <input class="form-control" type="text" value="<?php echo $lectureMenu['MenuTexte'][$i]; ?>" name="texteLien" />
                                                    </div>
                                                    <div class="row">
                                                        <label class="control-label">Lien #1</label>
                                                        <input type="text" class="form-control" name="lienTexte" placeholder="Nom du lien">
                                                        <div class="row">
                                                            <label>
                                                                <input type="radio" name="methode" value="1" checked> Lien 
                                                            </label>
                                                            <input type="text" class="form-control" name="menuLien" placeholder="ex: http://minecraft.net/" value="<?php echo $lectureMenu['MenuLien'][$i]; ?>" name="lienLien">
                                                        </div>
                                                        <div class="row">
                                                            <label>
                                                                <input type="radio" name="methode" value="2"> Page
                                                            </label>
                                                            <select class="form-control" name="page">
                                                                <?php $j = 0;
                                                                while($j < count($pages)) { ?>
                                                                    <option value="<?php echo $pages[$j]; ?>"><?php echo $pages[$j]; ?></option><?php $j++;
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <input type="submit" class="btn btn-success" value="Valider les changements !"/>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                                <h3>Edition des menus déroulants</h3>
                                <div class="row">
                                    <ul class="nav nav-tabs">
                                        <?php $j = 0;
                                        for($i = 0; $i < count($lectureMenu['MenuTexte']); $i++) {
                                            if(isset($lectureMenu['MenuListeDeroulante'][$lectureMenu['MenuTexte'][$i]])) { ?>
                                                <li class="<?php if($j == 0) echo 'active'; ?>">
                                                    <a href="#editLiensDeroul<?php echo $i; ?>" data-toggle="tab"><?php echo $lectureMenu['MenuTexte'][$i]; ?></a>
                                                </li>
                                            <?php $j++;
                                            }
                                        } ?>
                                    </ul>
                                    <div class="tab-content">
                                        <?php $j = 0;
                                        for($i = 0; $i < count($lectureMenu['MenuTexte']); $i++) {
                                            if(isset($lectureMenu['MenuListeDeroulante'][$lectureMenu['MenuTexte'][$i]]['0'])) { ?>
                                                <div class="tab-pane <?php if($j == 0) echo 'active'; ?>" id="editLiensDeroul<?php echo $i; ?>">
                                                    <h4>Menu déroulant: #<?php echo $lectureMenu['MenuTexte'][$i]; ?></h4>
                                                    <form role="form" method="POST" action="?&action=editMenuListe">
                                                        <div class="row">
                                                            <label class="control-label">Titre de la liste déroulante</label>
                                                            <input type="text" class="form-control" placeholder="Le nom de la liste déroulante" name="titreListe" value="<?php echo $lectureMenu['MenuTexte'][$i]; ?>" />
                                                        </div>
                                                        <div class="row">
                                                            <?php if($lectureMenu['MenuListeDeroulante'][$lectureMenu['MenuTexte'][$i]]['0'] != "LastLinkDontDelete") {
                                                                for($j = 0; $j < count($lectureMenu['MenuListeDeroulante'][$lectureMenu['MenuTexte'][$i]]); $j++) { 
                                                                    if(preg_match("#\?&page=#", $lectureMenu['MenuListeDeroulanteLien'][$lectureMenu['MenuTexte'][$i]][$j]))
                                                                        $method = 1;
                                                                    elseif($lectureMenu['MenuListeDeroulanteLien'][$lectureMenu['MenuTexte'][$i]][$j] == '-divider-')
                                                                        $method = 2;
                                                                    else
                                                                        $method = 0;
                                                                    ?>
                                                                    <div class="row">
                                                                        <label class="control-label">Lien <?php echo $lectureMenu['MenuListeDeroulante'][$lectureMenu['MenuTexte'][$i]][$j]; ?> </label>
                                                                        <input type="text" class="form-control" name="lienTexte<?php echo $j; ?>" placeholder="Texte du lien" value="<?php echo $lectureMenu['MenuListeDeroulante'][$lectureMenu['MenuTexte'][$i]][$j]; ?>">
                                                                        <div class="row">
                                                                            <label class="control-label">
                                                                                <input type="radio" name="methode<?php echo $j; ?>" value="1" <?php if($method == 0) echo 'checked'; ?>> Lien 
                                                                            </label>
                                                                            <input type="text" class="form-control" name="menuLien<?php echo $j; ?>" value="<?php echo $lectureMenu['MenuListeDeroulanteLien'][$lectureMenu['MenuTexte'][$i]][$j]; ?>"placeholder="ex: http://minecraft.net/">
                                                                        </div>
                                                                        <div class="row">
                                                                            <label class="control-label">
                                                                                <input type="radio" name="methode<?php echo $j; ?>" value="2" <?php if($method == 1) echo 'checked'; ?>> Page
                                                                            </label>
                                                                            <select class="form-control" name="page<?php echo $j; ?>">
                                                                                <?php $l = 0;
                                                                                if(!empty($pages))
                                                                                    while($l < count($pages)) { ?>
                                                                                        <option value="<?php echo $pages[$l]; ?>"><?php echo $pages[$l]; ?></option><?php $l++;
                                                                                    } ?>
                                                                            </select>
                                                                            <div class="row">
                                                                                <label class="control-label">
                                                                                    <input type="radio" name="methode<?php echo $j; ?>" value="3" <?php if($method == 2) echo 'checked'; ?>> Diviseur
                                                                                </label>
                                                                            </div>
                                                                            <div class="row">
                                                                                <a class="btn btn-danger" href="?&action=supprLienMenuDeroulant&id=<?php echo $i; ?>&id2=<?php echo $j; ?>">Supprimer le lien: <?php echo $lectureMenu['MenuListeDeroulante'][$lectureMenu['MenuTexte'][$i]][$j]; ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <div class="row">
                                                                    <div class='alert alert-danger' style='text-align: center;'>Veuillez créer un lien pour cette liste ou la supprimer</div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <input type="submit" class="btn btn-success" value="Valider les changements !"/>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php }
                                            if(isset($lectureMenu['MenuListeDeroulante'][$lectureMenu['MenuTexte'][$i]])) { ?>
                                                <h4>Ajouter un lien dans la liste: #<?php echo $lectureMenu['MenuTexte'][$i]; ?></h4>
                                                <form role="form" method="POST" action="?&action=nouveauMenuListeLien&liste=">
                                                    <input type="hidden" name="listeNum" value="<?php echo $lectureMenu['MenuTexte'][$i]; ?>" />
                                                    <div class="row">
                                                        <label class="control-label">Titre du lien</label>
                                                        <input type="text" class="form-control" name="nomLien" placeholder="Le nom du lien" />
                                                    </div>
                                                    <div class="row">
                                                        <label class="control-label">
                                                            <input type="radio" name="methode" value="1" checked> Lien 
                                                        </label>
                                                        <input type="text" class="form-control" name="menuLien" placeholder="ex: http://minecraft.net/">
                                                    </div>
                                                    <div class="row">
                                                        <label class="control-label">
                                                            <input type="radio" name="methode" value="2"> Page
                                                        </label>
                                                        <select class="form-control" name="page">
                                                        <?php $l = 0;
                                                        if(!empty($pages))
                                                            while($l < count($pages)) { ?>
                                                                <option value="<?php echo $pages[$l]; ?>"><?php echo $pages[$l]; ?></option><?php $l++;
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <label class="control-label">
                                                            <input type="radio" name="methode" value="3"> Diviseur
                                                        </label>
                                                    </div>
                                                    <input type="hidden" name="categorie" value="<?php echo $lectureMenu['MenuTexte'][$i]; ?>" />
                                                    <hr>
                                                    <div class="row">
                                                        <input type="submit" class="btn btn-success" value="Valider les changements"/>
                                                    </div>
                                                </form>
                                            <?php $j++;
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
<!-- /.row -->