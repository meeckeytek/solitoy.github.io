<?php
include'../includes/connection.php';
session_start();

              $date = $_POST['date'];
              $id = $_POST['id'];
              $customer = $_POST['customer'];
              $subtotal = $_POST['subtotal'];
              $lessvat = $_POST['lessvat'];
              $netvat = $_POST['netvat'];
              $addvat = $_POST['addvat'];
              $total = $_POST['total'];
              $cash = $_POST['cash'];
              $emp = $_POST['employee'];
              $rol = $_POST['role'];
              //imma make it trans uniq id
              $today = date("mdGis"); 
              
              $countID = count($_POST['name']);
              // echo "<table>";
              switch($_GET['action']){
                case 'add':  
                for($i=1; $i<=$countID; $i++)
                  {
                  //  $quantity = $_POST['quantity'];

                  //  $query1="update product set"
                    // echo "'{$today}', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}' <br>";
                    

                    $query = "INSERT INTO `transaction_details`
                               (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`)
                               VALUES (Null, '{$today}', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}')";

                    mysqli_query($db,$query)or die (mysqli_error($db));



                    $new = $_POST['quantity'][$i-1];
                    $ids = $_POST['id'][$i-1];

                    $querys='UPDATE product set ON_HAND = ON_HAND-"'.$new.'" WHERE PRODUCT_ID ='.$ids;

                    mysqli_query($db,$querys)or die (mysqli_error($db));

                    }
                   // $cashs=number_format($_POST['cash'], 2);
                    $totals=$_POST['total']-$_POST['cash'];
                    $query111 = "INSERT INTO `transaction`
                               (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `PAID`, `DATE`, `TRANS_D_ID`)
                               VALUES (Null,'{$customer}','{$countID}','{$subtotal}','{$lessvat}','{$netvat}','{$addvat}','{$total}','{$cash}','{$totals}','{$date}','{$today}')";
                    mysqli_query($db,$query111)or die (mysqli_error($db));

                break;
              }
                    unset($_SESSION['pointofsale']);
               ?>
              <script type="text/javascript">
                alert("Success.");
                window.location = "pos.php";
              </script>
          </div>