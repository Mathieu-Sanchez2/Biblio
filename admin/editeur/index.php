<?php 
    include '../config/config.php';
    if (!isConnect()){
        header('location:' . URL_ADMIN . 'login.php');
        die; 
    }
    include '../config/bdd.php';
    $sql = 'SELECT * FROM editeur';
    $req = $bdd->query($sql);
    $editeurs = $req->fetchAll(PDO::FETCH_ASSOC);
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
    <link href="<?= URL_ADMIN ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                        <h1 class="h3 mb-0 text-gray-800">Liste des editeurs</h1>
                    </div>
                    <a href="add.php" class="btn btn-primary my-2">Ajouter un editeur</a>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">D??nomination</th>
                            <th scope="col">N??SIRET</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($editeurs as $editeur) : ?>
                                <tr>
                                    <td><?= $editeur['id'] ?></td>
                                    <td><?= $editeur['denomination'] ?></td>
                                    <td><?= $editeur['siret'] ?></td>
                                    <td><?= $editeur['adresse'] . ' ' .  $editeur['ville'] . ' ,' . $editeur['code_postal']?></td>
                                    <td><?= $editeur['mail'] ?></td>
                                    <td><a href="update.php?id=<?= $editeur['id'] ?>" class="btn btn-warning">Modifier</a></td>
                                    <td><a href="action.php?id=<?= $editeur['id'] ?>" class="btn btn-danger">Supprimer</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php
                include '../includes/footer.php';
            ?>
</body>
</html>