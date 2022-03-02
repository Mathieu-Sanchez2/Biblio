<?php 
    include '../config/config.php';
    if (!isConnect()){
        header('location:' . URL_ADMIN . 'login.php');
        die; 
    }
    include '../config/bdd.php';
    
    $sql = "SELECT * FROM livre WHERE disponibilite = 0";
    $req = $bdd->query($sql);
    $livres_dispo = $req->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM usager";
    $req = $bdd->query($sql);
    $usagers = $req->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($livres_dispo,$usagers);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="http://localhost/biblio/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="http://localhost/biblio/admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            include '../includes/sidebar.php';
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <?php
                    include '../includes/topbar.php';
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Créer une location</h1>
                    </div>

                    <form action="action.php" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="livre" class="form-label">Liste des livre disponible:</label>
                                    <select class="mt-1 select-livre" name="livre" id="livre">
                                        <?php  foreach($livres_dispo as $livre) : ?>
                                            <option value="<?= $livre['id'] ?>"><?= $livre['num_ISBN'] . ' | ' . $livre['titre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="usager" class="form-label">Liste des usagers</label>
                                    <select class="mt-1 select-usager" name="usager" id="usager">
                                        <?php  foreach($usagers as $usager) : ?>
                                            <option value="<?= $usager['id'] ?>"><?= $usager['nom'] . ' ' . $usager['prenom'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="date_debut" class="form-label">Date de début de location :</label>
                                    <input type="date" name="date_debut" class="form-control" id="date_debut" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="date_fin" class="form-label">Date de fin de location (si connu) :</label>
                                    <input type="date" name="date_fin" class="form-control" id="date_fin" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            <input type="submit" name="btn_add_location" value="Créer la location"class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php
                include '../includes/footer.php';
            ?>
</body>
</html>