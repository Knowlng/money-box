<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money box</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<!-- Medium: duotas masyvas su prekėmis. Atvaizduojant visas prekes masyve ir jų kainas,
bei pridėti įvertinimą ar galime jas įpirkti ar ne. Pinigų suma saugoma sausainėlyje. -->
<?php 


    // checks if the cookie is created if not creates one
    if(!isset($_COOKIE['suma'])) {
        setcookie("suma", 0, time() + (86400*30), "money-box.php" );
        $_COOKIE['suma'] = 0;
    }

  $items = [
    [
      'name' => 'Playstation 5',
      'price' => 849.99
    ],
    [
      'name' => 'Iphone 13',
      'price' => 999.99
    ],
    [
      'name' => 'Bulviu tarkavimo masina migris',
      'price' => 89.99
    ],
    [
      'name' => 'Mikrobangų krosnelė DOMO DO2342CG',
      'price' => 253
    ]
  ];
?>
<div class="container">
    <h1 class="text-center">Money bank</h1>
    <div class="row">
        <div class="col">
            <p class="mb-0">Kiek pinigų dėsime į taupyklę?</p>
            <form method="GET" action="money-box.php">
                <input name="moneyIN" class="w-100">
                <button name="ideti" class="btn btn-primary" type="submit">Įdėti</button>
            </form>
            <?php echo "Taupyklėje yra: ".$_COOKIE['suma']."€";
                 if(isset($_GET['ideti'])){
                    $prideti = $_GET['moneyIN'];
                    if(is_numeric($prideti)) {
                        $prideti = $prideti + $_COOKIE['suma'];
                        setcookie("suma", $prideti, time() + (86400*30), "money-box.php" );
                    }
                }
            ?>
        </div>
        <div class="col">

        </div>
    </div> 
</div>

<?php

    // adds money to cookie

    if(isset($_GET['ideti'])){
        $prideti = $_GET['moneyIN'];
        if(is_numeric($prideti)) {
            $prideti = $prideti + $_COOKIE['suma'];
            setcookie("suma", $prideti, time() + (86400*30), "money-box.php" );
        }
    }
?>
    
</body>
</html>