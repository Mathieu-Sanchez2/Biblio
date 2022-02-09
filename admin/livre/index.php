<?php 
    include '../config/config.php';
    include '../config/bdd.php';
    var_dump($_SESSION);
    // création de la requete SQL
    $sql = 'SELECT * FROM livre';
    // on execute la requete
    $requete = $bdd->query($sql);
    // on recupere les données
    $livres = $requete->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($livres);


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Liste des livres</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Liste des livres</h1>
                    </div>
                    <a href="add.php" class="btn btn-success">Créer un livre</a>
                    <?php 
                        if (isset($_SESSION['error_update_livre']) && $_SESSION['error_update_livre'] == false) {
                            alert('success', 'Le livre est bien ajouté !');
                            unset($_SESSION['error_update_livre']);
                        }
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">n° ISBN</th>
                                <th scope="col">Illustration</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Résume</th>
                                <th scope="col">Prix</th>
                                <th scope="col">date achat</th>
                                <th scope="col">nb pages</th>
                                <th scope="col">disponibilité</th>
                                <th scope="col">modifier</th>
                                <th scope="col">supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($livres as $livre) : ?>
                                <tr>
                                    <td><?= $livre['id'] ?></td>
                                    <td><?= $livre['num_ISBN'] ?></td>
                                    <td>@mdo</td>
                                    <td><?= $livre['titre'] ?></td>
                                    <td><?= substr($livre['resume'], 0, 100) ?> [...]</td>
                                    <td><?= $livre['prix'] ?> €</td>
                                    <td><?= $livre['date_achat'] ?></td>
                                    <td><?= $livre['nb_pages'] ?></td>
                                    <td><?= $livre['disponibilite'] ?></td>
                                    <td><a href="<?php echo URL_ADMIN ?>livre/update.php?id=<?php echo $livre['id'] ?>" class="btn btn-warning">modifier</a></td>
                                    <td><a href="<?php echo URL_ADMIN ?>livre/action.php?id=<?php echo $livre['id'] ?>" class="btn btn-danger">supprimer</a></td>
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