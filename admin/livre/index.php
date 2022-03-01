<?php 
    include '../config/config.php';
    if (!isConnect()){
        header('location:' . URL_ADMIN . 'login.php');
        die; 
    }
    include PATH_ADMIN . 'config/bdd.php';
    // création de la requete SQL
    $sql = 'SELECT * FROM livre';
    // on execute la requete
    $requete = $bdd->query($sql);
    // on recupere les données
    $livres = $requete->fetchAll(PDO::FETCH_ASSOC);
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
    <link href="<?= URL_ADMIN ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= URL_ADMIN ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            include PATH_ADMIN . 'includes/sidebar.php';
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <?php
                    include PATH_ADMIN . 'includes/topbar.php';
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Liste des livres</h1>
                    </div>
                    <a href="add.php" class="btn btn-success my-2">Ajouter un livre</a>
                    <?php 
                        if (isset($_SESSION['error_update_livre']) && $_SESSION['error_update_livre'] == false) {
                            alert('success', 'Le livre est bien modifier !');
                            unset($_SESSION['error_update_livre']);
                        }
                        if (isset($_SESSION['error_add_livre']) && $_SESSION['error_add_livre'] == false){
                            alert('success', 'Le livre est bien ajouté en bdd');
                            unset($_SESSION['error_add_livre']);
                        }
                        if (isset($_SESSION['error_delete_livre']) && $_SESSION['error_delete_livre'] == false){
                            alert('success', 'Le livre est bien supprimer');
                            unset($_SESSION['error_delete_livre']);
                        }
                        if (isset($_SESSION['error_delete_livre']) && $_SESSION['error_delete_livre'] == true){
                            alert('danger', 'Le livre n\'est pas supprimer');
                            unset($_SESSION['error_delete_livre']);
                        }
                        if (isset($_SESSION['error_delete_illustration']) && $_SESSION['error_delete_illustration'] == true){
                            alert('danger', 'L\'illustration ne peut être supprimer');
                            unset($_SESSION['error_delete_illustration']);
                        }
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">n° ISBN</th>
                                <th scope="col">Illustration</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Catégories</th>
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
                            <?php foreach ($livres as $livre) :
                                $date = date_create($livre['date_achat']); ?>
                                <tr>
                                    <td><?= $livre['id'] ?></td>
                                    <td><?= $livre['num_ISBN'] ?></td>
                                    <td>@mdo</td>
                                    <td><a href="single.php?id=<?= $livre['id'] ?>"><?= $livre['titre'] ?></a></td>
                                    <td><?= getCategories($livre['id'], $bdd); ?></td>
                                    <td><?= substr(($livre['resume']), 0, 100) ?> [...]</td>
                                    <td><?= $livre['prix'] ?> €</td>
                                    <td><?= $date->format('d/m/Y') ?></td>
                                    <td><?= $livre['nb_pages'] ?></td>
                                    <td><?= $livre['disponibilite'] ?></td>
                                    <td><a href="<?= URL_ADMIN ?>livre/update.php?id=<?= $livre['id'] ?>" class="btn btn-warning">modifier</a></td>
                                    <td><a href="<?= URL_ADMIN ?>livre/action.php?id=<?= $livre['id'] ?>" class="btn btn-danger">supprimer</a></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php
                include  PATH_ADMIN . 'includes/footer.php';
            ?>
</body>
</html>