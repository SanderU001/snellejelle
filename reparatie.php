<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body {
            background-color: gray;
        }

        .container-md {
            border: solid 3px black;
            height: 50em;
        }
        

    </style>
</head>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-gray">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Snelle Jelle</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="medewerkerprofiel.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reparatie.php">Reparatie Overzicht</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="loguit.php">Uitloggen</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
    <?php
          session_start();

          $_SESSION['username'] = "Reparatie";
              echo $_SESSION['username'];

            
          require "database.php";

          //ZET WAARDE IN DATABASE
          $sql = "INSERT INTO table reparatie VALUES titel" ;
          $stmt = $db_conn->prepare($sql);
          $sql = "SELECT * FROM reparatie";
          $statement = $db_conn->prepare($sql);
          $statement->execute();
          $database_gegevens = $statement->fetchAll(PDO::FETCH_ASSOC);
          
           //stuur naar mysql.
           $stmt->bindParam(":placeholder", $placeholder_variabele );
           $stmt->execute();

          
          foreach ($database_gegevens as $value) {
          
          }   

          //UPDATE EEN WAARDE IN EEN DATABASE TABEL
          $sql = "UPDATE reparatie SET titel = Prada Fiets, datum = 26 Jan WHERE id = 3 ";
          $stmt = $db_conn->prepare($sql); 
          //stuur naar mysql.
          $stmt->bindParam(":placeholder", $placeholder_variabele );
          $stmt->bindParam(":placeholder2", $placeholder_variabele2);
          $stmt->bindParam(":placeholder3", $placeholder_variabele3);
          $stmt->execute();
      ?>
      <?php
        $stmt = $db_conn->query('SELECT * FROM fiets');
        while ($info = $stmt->fetch()) {
          echo("<tr><td>" . $info['merk'] . "</td><td>" . $info['model'] . "</td>");
      }
      ?>
        <body>
            <div class="container-md">
                <table>
                  <tr>
                    <h2>Reparatie<h2>
                  </tr>
                  <tr>
                    <th><?php echo $value["titel"]; ?></th>
                  </tr>
                  <tr>
                    <th><?php echo $value["datum"]; ?></th>
                  </tr>
                    <th><?php echo $value["tijdstip"]; ?></th>
                  <tr>
                    <th><?php echo $value["opmerkingen"]; ?></th>
                  </tr>
                  <tr>
                    <th><?php echo $value["kosten"]; ?></th>
                  </tr>
                  
                  <form method=post>
            <?php
            if (isset($_POST['maakfiets'])) {
                $merk = 0;
                $model = 0;
                $type = 0;
                $kleur = 0;
                $maakFiets = "INSERT INTO fiets (merk, model, type, kleur) VALUES (?,?,?,?)";
                $stmt= $db_conn->prepare($maakFiets);
                $stmt->execute([$merk, $model, $type, $kleur]);
                header("refresh:0");
                
            }

            if (isset($_POST['deletefiets'])) {
              $deleteFiets = "DELETE FROM fiets WHERE (model, merk, type, kleur)";
              $stmt= $db_conn->prepare($deleteFiets);
              $stmt->execute($deleteFiets);
              header("refresh:0");
              
          }
            ?>
        <button name="maakfiets">maak de reparatie</button>
        <br>
        <button name="deletefiets">verwijder de reparatie</button>
        </form>
                </table>
            </div>
        </body>
</html>