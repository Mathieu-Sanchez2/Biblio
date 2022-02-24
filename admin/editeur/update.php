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
    $sql = 'SELECT * FROM editeur WHERE id = ?';
    $req = $bdd->prepare($sql);
    $req->execute([$id]);
    $editeur = $req->fetch(PDO::FETCH_ASSOC);
    // var_dump($editeur);
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
                        <h1 class="h3 mb-0 text-gray-800">Modifier un editeur</h1>
                    </div>
                    <form action="action.php" method="POST">
                        <input type="hidden" name="id" value="<?= $editeur['id'] ?>">
                        <div class="mb-3">
                            <label for="denomination" class="form-label">Dénomination : </label>
                            <input type="text" class="form-control" id="denomination" name="denomination" value="<?= $editeur['denomination'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="siret" class="form-label">N° SIRET</label>
                            <input type="text" class="form-control" id="siret" name="siret" value="<?= $editeur['siret'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $editeur['adresse'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="code_postal" class="form-label">Code postal</label>
                            <input type="text" class="form-control" id="code_postal" name="code_postal" value="<?= $editeur['code_postal'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" value="<?= $editeur['ville'] ?>">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="mail" class="form-label">Mail</label>
                                    <input type="text" class="form-control" id="mail" name="mail" value="<?= $editeur['mail'] ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="numero_tel" class="form-label">Mail</label>
                                    <input type="text" class="form-control" id="numero_tel" name="numero_tel" value="<?= $editeur['numero_tel'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <input type="submit" value="Modifier" name="btn_update_editeur" class="btn btn-primary">
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