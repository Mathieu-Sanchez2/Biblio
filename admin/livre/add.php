<?php 
    include '../config/config.php';
    include '../config/bdd.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Créer un livre</h1>
                    </div>
                    <form action="action.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="num_isbn" class="form-label">N°ISBN</label>
                            <input type="text" name="num_isbn" class="form-control" id="num_isbn">
                        </div>
                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" name="titre" class="form-control" id="titre">
                        </div>
                        <div class="mb-3">
                            <label for="resume" class="form-label">Résumer</label>
                            <input type="text" name="resume" class="form-control" id="resume">
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" name="prix" class="form-control" id="prix">
                        </div>
                        <div class="mb-3">
                            <label for="nb_pages" class="form-label">Nombres de pages</label>
                            <input type="text" name="nb_pages" class="form-control" id="nb_pages">
                        </div>
                        <div class="mb-3">
                            <label for="date_achat" class="form-label">Date achat</label>
                            <input type="date" name="date_achat" class="form-control" id="date_achat">
                        </div>
                        <div class="mb-3">
                            <label for="illustration" class="form-label">Illustration : </label>
                            <input type="file" name="coucoumaison" class="form-control" id="illustration">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" name="btn_add_livre" value="Modifier">
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