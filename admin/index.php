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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            include 'includes/sidebar.php';
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <?php
                    include 'includes/topbar.php';
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <?php 
                    
                        $dsn = 'mysql:dbname=bibliotheque_2;host=localhost';
                        $utilisateur = 'bibliotheque';
                        $mot_de_passe = '0dmaSLwNk2d57FXE';    

                        try {
                            $bdd = new PDO($dsn, $utilisateur, $mot_de_passe, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                        }catch (PDOException $erreur){
                            // echo 'erreur : ' . $erreur->getMessage();
                            die('Probleme de bdd');
                        }
                        // RECUPERER LES LIVRES EN BDD
                        // 1 ER ETAPE GENERE LA REQUETE SQL
                        $sql = 'SELECT * FROM livre';
                        // ENVOYER LA REQUETE A LA BDD
                        // PDO qui execute la méthode query(avec la variable $sql en param)
                        $requete = $bdd->query($sql);
                        // GESTION DU RETOUR DE DONNEES
                        $livres = $requete->fetchAll(PDO::FETCH_ASSOC);
                        // var_dump($livres);
                        echo '<ul>';
                        foreach ($livres as $livre) {
                           echo '<li>' . $livre['titre'] . '</li>';
                        }
                        echo '</ul>';
                    ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php
            include 'includes/footer.php';
            ?>
</body>
</html>