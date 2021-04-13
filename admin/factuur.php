<?php
require "../include/config.php";
if (!empty($_SESSION['user_type'])) {
  if ($_SESSION['user_type'] == 'klant') {
    echo '<script type="text/javascript">window.location.href = "'.$srv_url.'account.php";</script>';
    exit;
  } elseif ($_SESSION['user_type'] !== 'admin') {
    session_destroy();
    echo '<script type="text/javascript">window.location.href = "'.$srv_url.'login.php/";</script>';
    exit;
  }
} else {
  echo '<script type="text/javascript">window.location.href = "'.$srv_url.'login.php/";</script>';
  exit;
}
require "../include/class/FactuurClass.php";
?>
<title>Factuur - Wok & Roll</title>
<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<body class="d-flex flex-column h-100" onload="window.print()">
<?php $factuur = (new FactuurClass())->GetFacatuurByNR($_GET['user'], $_GET['nr']);
$totaal = array();
?>
<br>
<div class="container">
  <div class="row">
    <div class="col float-start">
      <a class="navbar-brand c-yellow" href="<?php echo $url.'admin'; ?>"> <img style="height: 200px;" src="<?php echo $url; ?>/img/logo.png" alt=""> </a>
    </div>
    <div class="col float-end">
      <p>
          <h3>Wok & Roll</h3><h5> Nederland, Harderwijk, Westeinde 33 <br>KvK: 00987</h5>
      </p>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <h6><?php echo $factuur['user']['voornaam'].' '.$factuur['user']['tussenvoegsel'].' '.$factuur['user']['achternaam']; ?></h6>
      <h6><?php echo $factuur['user']['straatnaam'].' '.$factuur['user']['huisnummer']; ?></h6>
      <h6><?php echo $factuur['user']['postcode'].' '.$factuur['user']['woonplaats']; ?></h6>
    </div>
  </div>
  <br>
  <h2>Factuur</h2>
  <div class="row">
    <div class="col-6">
      <table class="table" style="border-style: none !important;">
          <tbody>
          <tr class="c-border">
              <th scope="col" style="border-style: none !important;"><?php echo $arraytekst['factuur_nummer']; ?> </th>
              <th scope="col" style="border-style: none !important;"><?php echo $arraytekst['factuur_datum']; ?></th>
          </tr>
            <tr>
            <th scope="col" style="border-style: none !important;"><?php echo $factuur['factuur'][0]['factuur_nr']; ?> </th>
            <th scope="col" style="border-style: none !important;"><?php echo $factuur['factuur'][0]['factuur_datum']; ?></th>
            </tr>

          </tbody>
      </table>

    </div>
  </div>
  <table class="table">
      <tbody>
      <tr class="c-border">
          <th scope="col"><?php echo $arraytekst['product']; ?></th>
          <th scope="col"><?php echo $arraytekst['prijs']; ?></th>
          <th scope="col" ><?php echo $arraytekst['aantal']; ?> </th>
          <th scope="col"><?php echo $arraytekst['totaal']; ?></th>
          <th scope="col">BTW</th>
      </tr>

      <?php foreach ($factuur['factuur'] as $product): ?>
        <tr>
        <th scope="col"><?php echo $product['naam']; ?></th>
        <th scope="col"><?php echo '€ '.$product['prijs']; ?></th>
        <th scope="col" ><?php echo $product['product_aantal']; ?> </th>
        <th scope="col"><?php echo '€ '.$product['prijs'] * $product['product_aantal']; $totaal[] = $product['prijs'] * $product['product_aantal'];?></th>
        <th scope="col"><?php echo $product['btw'].'%'; ?></th>
        </tr>
      <?php endforeach; ?>

      </tbody>
  </table>
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
    </div>
    <div class="col">
       <h6><?php echo $arraytekst['verzend'].': € '.$factuur['factuur'][0]['verzend_kosten'];  $totaal[] = $factuur['factuur'][0]['verzend_kosten']; ?></h6>
      <h6><?php echo $arraytekst['totaal_1'].' € '.array_sum($totaal) ; ?></h6>
    </div>
  </div>
</div>

</body>
