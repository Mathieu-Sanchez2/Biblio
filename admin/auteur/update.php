<?php 
    include '../config/config.php';
    if (!isConnect()){
        header('location:' . URL_ADMIN . 'login.php');
        die; 
    }
    if (isset($_GET['id'])){
        $id = intval($_GET['id']);
        if ($id <= 0){
            // erreur
            header('location:index.php');
            die;
        }
    }
    include '../config/bdd.php';
    $sql = 'SELECT * FROM auteur WHERE id = ?';
    $req = $bdd->prepare($sql);
    $req->execute([$id]);
    $auteur = $req->fetch(PDO::FETCH_ASSOC);
    // var_dump($auteur);
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
                        <h1 class="h3 mb-0 text-gray-800">Modifier un auteur</h1>
                    </div>
                    <form action="action.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $auteur['id'] ?>">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?= $auteur['nom'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $auteur['prenom'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nom_de_plume" class="form-label">Pseudo</label>
                            <input type="text" class="form-control" id="nom_de_plume" name="nom_de_plume" value="<?= $auteur['nom_de_plume'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $auteur['adresse'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="code_postal" class="form-label">Code postal</label>
                            <input type="text" class="form-control" id="code_postal" name="code_postal" value="<?= $auteur['code_postal'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" value="<?= $auteur['ville'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="mail" class="form-label">Mail</label>
                            <input type="text" class="form-control" id="mail" name="mail" value="<?= $auteur['mail'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="numero" class="form-label">Numéro</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="<?= $auteur['numero'] ?>">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                                <div class="col">
                                    <p>Photo sauvegarder :</p>
                                    <img src="<?= URL_ADMIN ?>img/photo/<?= $auteur['photo'] ?>" alt="<?= $auteur['photo'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <input type="submit" value="Modifier" name="btn_update_auteur" class="btn btn-primary">
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