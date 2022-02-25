<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Contact site bibliothèque</title>
  </head>
  <body>
  <?php include 'include/menu.php'; ?>
    <div class="container">
      <h1 class="text-center mt-3">Contact site bibliothèque</h1>
      <form action="" method="POST">
        <div class="row">
          <div class="col">
            <div class="mb-3">
              <label for="nom" class="form-label">Nom :</label>
              <input type="text" name="nom" class="form-control" id="nom">
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
              <label for="mail" class="form-label">Mail :</label>
              <input type="text" name="mail" class="form-control" id="mail">
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="objet" class="form-label">Mail :</label>
          <select type="text" name="objet" class="form-control" id="objet">
            <option value="demande informations">Demande informations</option>
            <option value="autres">Autres</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message :</label>
          <textarea id="message" name="message" rows="5" cols="33" class="form-control"></textarea>
        </div>
        <div class="mb-3 text-center">
          <input type="submit" class="btn btn-primary" value="Envoyer" name="btn_prise_contact">
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
