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
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='category'>
        <option disabled selected>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$opt .= "</select>";

  $query = 'SELECT *, FIRST_NAME, LAST_NAME
  FROM transaction T
  JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
  WHERE TRANS_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $A = $row['TRANS_D_ID'];
      $zz = $row['TRANS_ID'];
      $zzz = $row['FIRST_NAME'].' '. $row['LAST_NAME'];
      $B = number_format($row['GRANDTOTAL']);
      $C = $row['CASH'];
      $D = $row['PAID'];
      }
      $id = $_GET['id'];
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Payment for : <?php echo $zzz ?></h4>
            </div>
            <a type="button" class="btn btn-primary bg-gradient-primary" href="oustandings.php?action=edit & id='<?php echo $zzz; ?>'"><i class="fas fa-fw fa-flip-horizontal fa-share"></i> Back</a>
                
            <div class="card-body">

            <form role="form" method="POST" action="inv_edit2.php">
              <input type="hidden" name="idd" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Transaction ID:
                </div>
                <div class="col-sm-4">
                  <input class="form-control" value="<?php echo $A; ?>" readonly>
                </div>
              </div>
             <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Total Payment:
                </div>
                <div class="col-sm-4">
                  <input class="form-control" placeholder="Quantity" name="qty" value="<?php echo $B; ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Paid:
                </div>
                <div class="col-sm-4">
                  <input class="form-control" placeholder="On Hand" name="oh" value="<?php echo $C; ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Oustanding:
                </div>
                <div class="col-sm-4">
                  <input class="form-control" value="<?php echo $D; ?>" name="outstanding" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 New Payment:
                </div>
                <div class="col-sm-4">
                  <input class="form-control" name="new" require>
                </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>