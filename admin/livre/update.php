<?php 
    include '../config/config.php';
    include '../config/bdd.php';
    var_dump($_SESSION);
    if (isset($_GET['id'])){
        $id = intval($_GET['id']);
        if ($id > 0){
            // création de la req SQL
            $sql = "SELECT * FROM livre WHERE id= :id";
            // preparation de la requete
            $requete = $bdd->prepare($sql);
            // tableau de données
            $data = [':id' => $id];
            $requete->execute($data);
            // recupération des infos
            $livre = $requete->fetch(pdo::FETCH_ASSOC);
            // var_dump($livre);
        }else{
            header('location:index.php');
            die;
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Modifier un livre</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Modifier un livre</h1>
                    </div>
                    <?php 
                        if (isset($_SESSION['error_update_livre']) && $_SESSION['error_update_livre'] == true) {
                            alert('danger', 'Le livre n\'est pas ajouté !');
                            unset($_SESSION['error_update_livre']);
                        }
                    ?>
                    <form action="action.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $livre['id'] ?>">
                        <div class="mb-3">
                            <label for="num_isbn" class="form-label">N°ISBN</label>
                            <input type="text" name="num_isbn" class="form-control" id="num_isbn" value="<?php echo $livre['num_ISBN'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" name="titre" class="form-control" id="titre" value="<?php echo $livre['titre'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="resume" class="form-label">Résumer</label>
                            <input type="text" name="resume" class="form-control" id="resume" value="<?php echo $livre['resume'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" name="prix" class="form-control" id="prix" value="<?php echo $livre['prix'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nb_pages" class="form-label">Nombres de pages</label>
                            <input type="text" name="nb_pages" class="form-control" id="nb_pages" value="<?php echo $livre['nb_pages'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="disponibilite" class="form-label">Disponibilité :</label>
                            <input type="text" name="disponibilite" class="form-control" id="disponibilite" value="<?php echo $livre['disponibilite'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="date_achat" class="form-label">Date achat</label>
                            <input type="date" name="date_achat" class="form-control" id="date_achat" value="<?php echo $livre['date_achat'] ?>">
                        </div>
                        <div class="mb-3 row">
                            
                            <div class="col">
                                <label for="illustration" class="form-label">Illustration :</label>
                                <input type="file" name="illustration" class="form-control" id="illustration">
                            </div>
                            <div class="col">
                                <p>Illustration actuelle :</p>
                                <img src="<?= URL_ADMIN ?>/img/illustration/<?= $livre['illustration'] ?>" alt="illustration <?= $livre['titre'] ?>" height="250px" width="250px">
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" name="btn_update_livre" value="Modifier">
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