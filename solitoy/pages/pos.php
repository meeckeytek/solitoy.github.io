<head>
  <style type="text/css">
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Solitoy</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" href="cart.css" />
</head>
<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
//include'../includes/topp.php';
// session_start();

$product_ids = array();
//session_destroy();

//check if Add to Cart button has been submitted
if(filter_input(INPUT_POST, 'addpos')){
    if(isset($_SESSION['pointofsale'])){
        
        //keep track of how mnay products are in the shopping cart
        $count = count($_SESSION['pointofsale']);
        
        //create sequantial array for matching array keys to products id's
        $product_ids = array_column($_SESSION['pointofsale'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['pointofsale'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );   
        }
        else { //product already exists, increase quantity
            //match array key to id of the product being added to the cart
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing product in the array
                    $_SESSION['pointofsale'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
        
    }
    else { //if shopping cart doesn't exist, create first product with array key 0
        //create array using submitted form data, start from key 0 and fill it with values
        $_SESSION['pointofsale'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['pointofsale'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
            unset($_SESSION['pointofsale'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['pointofsale'] = array_values($_SESSION['pointofsale']);
}

//pre_r($_SESSION);

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
                ?>
                <div class="row">
                <div class="col-lg-12">
                  <div class="card shadow mb-0">
                  <div class="card-header py-2">
                    <h4 class="m-1 text-lg text-primary">Product category</h4>
                  </div>
                        <!-- /.panel-heading -->
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#A" data-toggle="tab">A</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#B" data-toggle="tab">B</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#C" data-toggle="tab">C</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#D" data-toggle="tab">D</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#E" data-toggle="tab">E</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#F" data-toggle="tab">F</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#G" data-toggle="tab">G</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#H" data-toggle="tab">H</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#I" data-toggle="tab">I</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#J" data-toggle="tab">J</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#K" data-toggle="tab">K</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#L" data-toggle="tab">L</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#M" data-toggle="tab">M</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#N" data-toggle="tab">N</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#O" data-toggle="tab">O</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#P" data-toggle="tab">P</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#Q" data-toggle="tab">Q</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#R" data-toggle="tab">R</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#S" data-toggle="tab">S</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#T" data-toggle="tab">T</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#U" data-toggle="tab">U</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#V" data-toggle="tab">V</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#W" data-toggle="tab">W</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#X" data-toggle="tab">X</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#Y" data-toggle="tab">Y</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#Z" data-toggle="tab">Z</a>
                              </li>
                            </ul>

<!-- TAB PANE AREA - ANG UNOD KA TABS ARA SA TABPANE.PHP -->
<?php include 'postabpane.php'; ?>
<!-- END TAB PANE AREA - ANG UNOD KA TABS ARA SA TABPANE.PHP -->

        <div style="clear:both"></div>  
        <br />  
        <div class="card shadow mb-4 col-md-12">
        <div class="card-header py-3 bg-white">
          <h4 class="m-2 font-weight-bold text-primary">Point of Sale</h4>
        </div>
        
      <div class="row">    
      <div class="card-body col-md-9">
        <div class="table-responsive">

        <!-- trial form lang   -->
<form role="form" method="post" action="pos_transac.php?action=add">
  <input type="hidden" name="employee" value="<?php echo $_SESSION['FIRST_NAME']; ?>">
  <input type="hidden" name="role" value="<?php echo $_SESSION['JOB_TITLE']; ?>">
 
        <table class="table">    
        <tr>  
        <th width="55%">Product Name</th> 
        <th></th>
            <th width="10%">Quantity</th>  
             <th width="15%">Price</th>  
             <th width="15%">Total</th>  
             <th width="5%">Action</th>  
        </tr>  
        <?php  

        if(!empty($_SESSION['pointofsale'])):  
            
             $total = 0;  
        
             foreach($_SESSION['pointofsale'] as $key => $product): 
        ?>  
        <tr>  
          <td>
            <input type="hidden" name="name[]" value="<?php echo $product['name']; ?>">
            <?php echo $product['name']; ?>
          </td>  
          <td>
          <input type="hidden" name="id[]" value="<?php echo $product['id']; ?>">
        </td>
           <td>
            <input type="hidden" name="quantity[]" value="<?php echo $product['quantity']; ?>">
            <?php echo $product['quantity']; ?>
          </td>  

           <td>
            <input type="hidden" name="price[]" value="<?php echo $product['price']; ?>">
            ₦ <?php echo number_format($product['price']); ?>
          </td>  

           <td>
            <input type="hidden" name="total" value="<?php echo $product['quantity'] * $product['price']; ?>">
            ₦ <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
           <td>
               <a href="pos.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn bg-gradient-danger btn-danger"><i class="fas fa-fw fa-trash"></i></div>
               </a>
           </td>  
        </tr>
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);
             endforeach;  
        ?>


        <?php  
        endif;
        ?>  
        </table> 
         </div>
     </div>
<?php
include 'posside.php';
include'../includes/footer.php';
?>