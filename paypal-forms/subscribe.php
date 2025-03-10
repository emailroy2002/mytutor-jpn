
<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- sweet popup alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://www.paypal.com/sdk/js?client-id=ATYj-7ZzewIea9u9_RULBGM3Esdwjd-4bIx0BY0BSJ43iSPzU9BLwwMXkDmwlRmDqC4mmNAR0ZjEFyEK&currency=JPY&intent=subscription&vault=true&components=buttons"></script>
</head>
<body>

  <div>
      <div id="paypal-subscribe-button-<?php $_GET['price'] ?>" data-plan-price="<?php echo $_GET['price'] ?>" data-plan-id="<?php echo $_GET['plan-id'] ?>" id style="margin-bottom:7px"></div>                                   
  </div>   





  <script src="../js/paypal-subscribe-app.js"></script>
  
</body>
</html>
