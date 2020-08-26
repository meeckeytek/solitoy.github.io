<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $pc = $_POST['prodcode'];
              $name = $_POST['name'];
              $desc = $_POST['description'];
              $qty = $_POST['quantity'];
              $oh = $_POST['onhand'];
              $pr = $_POST['price']; 
              $cat = $_POST['category'];
              $supp = $_POST['supplier'];
              $dats = $_POST['datestock'];
             

              
        
              switch($_GET['action']){
                case 'add':  
               // for($i=0; $i < $qty; $i++){
            /*    $filename=$_FILES["imgs"]["name"];
                $tempname=$_FILES["imgs"]["tmp_name"];
                $folder= "../images/".$filename;
                move_uploaded_file($tempname,$folder);*/

              $permited=array('jpg','jpeg','png');
               $file_name = $_FILES['imgs']['name'];
               $file_size = $_FILES['imgs']['size'];
               $file_temp = $_FILES['imgs']['tmp_name'];
               $div = explode('.',$file_name);
               $file_ext =strtolower(end($div));
               $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
               $uploaded_image = "../images/".$unique_image;

               move_uploaded_file($file_temp,$uploaded_image); 
                
                    $query = "INSERT INTO product
                              (PRODUCT_ID, img, PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, ON_HAND, PRICE, CATEGORY_ID, SUPPLIER_ID, DATE_STOCK_IN)
                              VALUES (Null,'{$uploaded_image}','{$pc}','{$name}','{$desc}',{$qty},{$oh},{$pr},{$cat},{$supp},'{$dats}')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                   // }
                break;
              }
            ?>
              <script type="text/javascript">window.location = "product.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>