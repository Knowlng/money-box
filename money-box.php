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
      setcookie("suma", 0, time() + (86400*30), "money-box.php");
      $_COOKIE['suma'] = 0;
    }
    // sets $prideti value so it displays below input
    $suma1 = $_COOKIE['suma'];

    // adds cash to money bank and stores the value in cookie
    if(isset($_GET['ideti'])){
      $prideti = $_GET['moneyIN'];
      if(is_numeric($prideti) && $prideti > 0 && strlen(substr(strrchr($prideti, "."), 1)) <3) {
        $suma1 = $prideti + $_COOKIE['suma'];
        setcookie("suma", $suma1, time() + (86400*30), "money-box.php");
      }
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
    <h1 class="text-center mb-5">Money bank</h1>
    <?php 
      if(isset($_GET['ideti'])){
        $prideti = $_GET['moneyIN'];
        if(!is_numeric($prideti) || $prideti <= 0 || strlen(substr(strrchr($prideti, "."), 1)) >=3) {
          echo '<div class="alert alert-danger w-100">Please input a positive intager with only two decimal places!</div>';
        }
      }
    ?>
      
    <div class="row">
        <div class="col">
            <p class="mb-0">Kiek pinigų dėsime į taupyklę?</p>
            <form method="GET" action="money-box.php">
                <input name="moneyIN" class="w-100" value="<?php echo isset($_GET["moneyIN"]) ? $_GET["moneyIN"] : ""  ; ?>">
                <button name="ideti" class="btn btn-primary" type="submit">Įdėti</button>
            </form>
            <?php echo "Taupyklėje yra: ".$suma1."€";?>
        </div>
        <div class="col">
          <ul>
            <?php
              foreach($items as $things) {
                echo '<li>'.$things['name'].' ', '('.$things['price'].'€) ';
                echo $things['price'] <= $suma1 ? '<span class="badge bg-success">Įperkama</span></li>' : '<span class="badge bg-danger">Neįperkama</span></li>';
              }
            ?>
          </ul>
        </div>
    </div> 
</div>   
</body>
</html>