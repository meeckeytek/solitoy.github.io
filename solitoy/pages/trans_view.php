<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
 $query = 'SELECT *, FIRST_NAME, LAST_NAME, PHONE_NUMBER, EMPLOYEE, ROLE
              FROM transaction T
              JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
              JOIN transaction_details tt ON tt.`TRANS_D_ID`=T.`TRANS_D_ID`
              WHERE TRANS_ID ='.$_GET['id'];
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        while ($row = mysqli_fetch_assoc($result)) {
          $fname = $row['FIRST_NAME'];
          $lname = $row['LAST_NAME'];
          $pn = $row['PHONE_NUMBER'];
          $date = $row['DATE'];
          $tid = $row['TRANS_D_ID'];
          $cash = $row['CASH'];
          $sub = $row['SUBTOTAL'];
          $less = $row['LESSVAT'];
          $net = $row['NETVAT'];
          $add = $row['ADDVAT'];
          $grand = $row['GRANDTOTAL'];
          $role = $row['EMPLOYEE'];
          $roles = $row['ROLE'];
        }
?>
<script>
function printContent(el){
  var restorepage= document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>
         <div id="area"> 
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                <h5>
                 <div>
                  <div>
                  <img src="../img/logo.png" alt="" style="width:120px;height:120px;"></div>
                  <div style="margin-top: -130px;margin-left: 134px;">
                   <strong style="font-size:79px;">SOLITOY</strong><br/><b style="font-size:29px;"> NIGERIA ENTERPRISES</b>
                   </div> 
                   <br>
                   <center>
                   <h2 style="margin-right:-400px">Importer & Distributor of Flat Trucks, Man Diessel, Daf 95, ATI, IVECO Spares &nbsp&nbsp; <br>Parts, Wheel Rim & Tyres,
                    Howo, Faw, Shacman, Sinotruck.
                   </h2></center>
              </div>
                </div>
                <div class="col-sm-3 py-1">
                  <strong>
                    Date: <?php echo $date; ?>
                  </strong>
                </div>
             </div>
<hr>
<div class="col-md-12">
    <table>
        <thead style="color:red;">
        <th width="35%">CORPORATE HEAD OFFICE</th>
        <th width="41%">CONTACT INFO</th>
        <th width="50%">BRANCH OFFICE</th>
    </thead>
    <tbody>
    <td style="
    font-size: 23px">
      17, Emmanuel Street, Isale-Ijagba,<br> Ogunstate,<br> Nigeria  
    </td>
    <td style="
    font-size: 23px">
        solitoy@outlook.com<br>solitoy1976@gmail.com<br>08027353333, 08093114484
    </td>
    <td style="
    font-size: 23px">
        Wazobia Road, Lagos-Ibadan Express Road, Ogere-Remo, Ogun State.
    </td>
    </tbody>
    </table>
    <hr>
</div> 
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h5 class="font-weight-bold">
                    <?php echo $fname; ?> <?php echo $lname; ?>
                  </h5>
                  <h5>
                    Phone: <?php echo $pn; ?>
                  </h5>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h5  class="font-weight-bold">
                    Transaction ID:#<?php echo $tid; ?>
                  </h5>
                  <h6 class="font-weight-bold">
                    Encoder: <?php echo $role; ?>
                  </h6>
                  <h6>
                    <?php echo $roles; ?>
                  </h6>
                </div>
              </div>
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
                <th width="8%">Qty</th>
                <th width="20%">Price</th>
                <th width="20%">Subtotal</th>
              </tr>
            </thead>
            <tbody>
<?php  
           $query = 'SELECT *
                     FROM transaction_details
                     WHERE TRANS_D_ID ='.$tid;
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {
              $Sub =  $row['QTY'] * $row['PRICE'];
                echo '<tr>';
                echo '<td>'. $row['PRODUCTS'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $Sub.'</td>';
                echo '</tr> ';
                        }
?>
            </tbody>
          </table>
            <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h4>
                    Cash Amount: ₦ <?php echo ($cash); ?>
                  </h4>
                  <table width="100%">
                    <tr>
                      <td class="font-weight-bold">Subtotal</td>
                      <td class="text-right">₦ <?php echo $sub; ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Less VAT</td>
                      <td class="text-right">₦ <?php echo $less; ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Net of VAT</td>
                      <td class="text-right">₦ <?php echo $net; ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Add VAT</td>
                      <td class="text-right">₦ <?php echo $add; ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="font-weight-bold text-right text-primary">₦ <?php echo $grand; ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
            <hr>
            <?php
//simple class to convert number to words in php based on http://www.karlrixon.co.uk/writing/convert-numbers-to-words-with-php/
if ( !class_exists('NumbersToWords') ){
  /**
  * NumbersToWords
  */
  class NumbersToWords{
    
    public static $hyphen      = '-';
    public static $conjunction = ' and ';
    public static $separator   = ', ';
    public static $negative    = 'negative ';
    public static $decimal     = ' point ';
    public static $dictionary  = array(
      0                   => 'Zero',
      1                   => 'One',
      2                   => 'Two',
      3                   => 'Three',
      4                   => 'Four',
      5                   => 'Five',
      6                   => 'Six',
      7                   => 'Seven',
      8                   => 'Eight',
      9                   => 'Nine',
      10                  => 'Ten',
      11                  => 'Eleven',
      12                  => 'Twelve',
      13                  => 'Thirteen',
      14                  => 'Fourteen',
      15                  => 'Fifteen',
      16                  => 'Sixteen',
      17                  => 'Seventeen',
      18                  => 'Eighteen',
      19                  => 'Nineteen',
      20                  => 'Twenty',
      30                  => 'Thirty',
      40                  => 'Fourty',
      50                  => 'Fifty',
      60                  => 'Sixty',
      70                  => 'Seventy',
      80                  => 'Eighty',
      90                  => 'Ninety',
      100                 => 'Hundred',
      1000                => 'Thousand',
      1000000             => 'Million',
      1000000000          => 'Billion',
      1000000000000       => 'Trillion',
      1000000000000000    => 'Quadrillion',
      1000000000000000000 => 'Quintillion'
    );

    public static function convert($number){
      if (!is_numeric($number) ) return false;
      $string = '';
      switch (true) {
        case $number < 21:
            $string = self::$dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = self::$dictionary[$tens];
            if ($units) {
                $string .= self::$hyphen . self::$dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = self::$dictionary[$hundreds] . ' ' . self::$dictionary[100];
            if ($remainder) {
                $string .= self::$conjunction . self::convert($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = self::convert($numBaseUnits) . ' ' . self::$dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? self::$conjunction : self::$separator;
                $string .= self::convert($remainder);
            }
            break;
      }
      return $string;
    }
  }//end class
}//end if
/**
 * usage:
 */?>
 
<h5 style="font-weight:bold;">&nbsp&nbsp;Amount in words: <u> <?php
echo NumbersToWords::convert($cash); ?>  Naira Only.</u> </h5>
           <hr>
           <br>
            <table>
            <tr>
            <td style="font-weight: bold;">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;________________________________________________ <br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;Customer's Signature
            </td>
            <td style="float:right; font-weight: bold;">
           ________________________________________________&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp; <br>
           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;Manager's Signature&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
            </td>
            </tr>
            </table>
            <br>
            <div>
            <img src="../img/jac.jpg" alt="" style="width:125px;height:125px;">
            <img src="../img/cnntc.png" alt="" style="width:125px;height:125px;">
            <img src="../img/deutz.jpg" alt="" style="width:175px;height:125px;">
            <img src="../img/shacman.png" alt="" style="width:125px;height:125px;">
            <img src="../img/wcichai.jpg" alt="" style="width:125px;height:125px;">
            <img src="../img/perkins.png" alt="" style="width:185px;height:125px;">
            <img src="../img/foton.jpg" alt="" style="width:125px;height:125px;">
            <img src="../img/faw.jpeg" alt="" style="width:125px;height:125px;">
            </div>
            <br>
            </div>
        </div>
          <center>
          <button class="btn btn-primary" onclick="printContent('area')">Print Receipt</button>
</center>
 
<?php
include'../includes/footer.php';
?>
