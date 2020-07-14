
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <?php
  $val_id=urlencode($_POST['val_id']);
  $store_id=urlencode("chari5e08b9debf914");
  $store_passwd=urlencode("chari5e08b9debf914@ssl");
  $requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

  $handle = curl_init();
  curl_setopt($handle, CURLOPT_URL, $requested_url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
  curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

  $result = curl_exec($handle);

  $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

  if($code == 200 && !( curl_errno($handle)))
  {

      # TO CONVERT AS ARRAY
      # $result = json_decode($result, true);
      # $status = $result['status'];

      # TO CONVERT AS OBJECT
      $result = json_decode($result);

      # TRANSACTION INFO
      $status = $result->status;
      $tran_date = $result->tran_date;
      $tran_id = $result->tran_id;
      $val_id = $result->val_id;
      $amount = $result->amount;
      $store_amount = $result->store_amount;
      $bank_tran_id = $result->bank_tran_id;
      $card_type = $result->card_type;

      # EMI INFO
      $emi_instalment = $result->emi_instalment;
  $emi_amount = $result->emi_amount;
  $emi_description = $result->emi_description;
  $emi_issuer = $result->emi_issuer;

  # ISSUER INFO
  $card_no = $result->card_no;
  $card_issuer = $result->card_issuer;
  $card_brand = $result->card_brand;
  $card_issuer_country = $result->card_issuer_country;
  $card_issuer_country_code = $result->card_issuer_country_code;

  # API AUTHENTICATION
  $APIConnect = $result->APIConnect;
  $validated_on = $result->validated_on;
  $gw_version = $result->gw_version;
  echo "Your Donation is completed and your transaction id is ".$tran_id;
  $a=$amount;
$db=new mysqli("localhost","root","","final_project4");
$sql="select raised from events where tx_id='$tran_id'";
$read=$db->query($sql);
if($read){
  $result=$read->fetch_assoc();
  $amount+=$result['raised'];
}

$sql="select tk from donor_event where tx_id='$tran_id'";
$read=$db->query($sql);
if($read){
  $result=$read->fetch_assoc();
  $a+=$result['tk'];
}
 $ql="update events set raised='$amount' where tx_id='$tran_id'";
 $read=$db->query($ql);
$ql1="update donor_event set tk='$a' where tx_id='$tran_id'";
 $read=$db->query($ql1);
} else {

      echo "Failed to connect with SSLCOMMERZ";
  }
  ?>
  <a href="www.taifur.com/finalproject4/public/">Home</a>
</body>
</html>