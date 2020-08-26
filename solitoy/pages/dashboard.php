<?php
include'../includes/connection.php';
include'../includes/usidebar.php';
?>
                 <div class="card shadow mb-4">
            <div class="card-header py-1 danger">
              <h4 class="m-2 font-weight-bold text-danger">Low Qty Products</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                   <th>Product Image</th>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>Left Qty</th>
                     <th>Price</th>
                     <th>DATE_STOCK_IN</th>
                   </tr>
               </thead>
          <tbody>
          <?php                  
    $query = 'SELECT DISTINCT PRODUCT_ID, img, PRODUCT_CODE,ON_HAND,NAME, PRICE, DATE_STOCK_IN FROM product where ON_HAND < 10';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo "<td><img src='".$row['img']."' height='100' width='100' id=imgss></td>";
                echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['ON_HAND'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
                echo '</tr> ';
                        }
?>


                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
<?php
include'../includes/footer.php';
?>