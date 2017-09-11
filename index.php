<?php
  include("includes/header.php");
?>
    
  <div class="container">
    <div class="jumbotron text-center background">
      <h1>Product Stocks <small>RK Tutorials</small></h1>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-3"> 
      </div>
      <div class="col-md-6">
        
              <?php
                if(isset($_GET["update"])) {
                  $id = $_GET["id"] ?? null;
                  $where = array("id" => $id);
                  $row = $obj->select_record("tbl_products",$where);

                  ?>
            <div class="panel panel-primary">
              <div class="panel-heading">Update Product</div>
                <div class="panel-body">
                  <form method="post" action="includes/action.php">
                    <table class="table table-hover">
                        <tr hidden>
                          <td><input type="input" name="id" value="<?php echo $row["id"]; ?>" hidden></td>
                        </tr>
                        <tr>
                          <td>Product Name</td>
                          <td><input type="input" name="name" placeholder="Enter Medecine Name" value="<?php echo $row["prod_name"]; ?>" required></td>
                        </tr>
                        <tr>
                          <td>Quantity</td>
                          <td><input type="number" name="qty" placeholder="Enter Quantity" value="<?php echo $row["prod_qty"]; ?>" required></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="edit" value="Update"></td>
                        </tr>
                    </table>
                  </form>
                </div>
              </div>
            </div>
                  <?php

                } else {

                  ?>

            <div class="panel panel-primary">
              <div class="panel-heading">Add Product</div>
                <div class="panel-body">
                  <form method="post" action="includes/action.php">
                    <table class="table table-hover">
                        <tr>
                          <td>Product Name</td>
                          <td><input type="input" name="name" placeholder="Enter Medecine Name" required></td>
                        </tr>
                        <tr>
                          <td>Quantity</td>
                          <td><input type="number" name="qty" placeholder="Enter Quantity" required></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="submit" value="Store"></td>
                        </tr>
                    </table>
                  </form>
                </div>
             </div>
           </div>

                  <?php

                }

              ?>
      <div class="col-md-3"> 
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-2"> 
      </div>
      <div class="col-md-8">
        <table class="table table-bordered">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Available Stocks</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>

          <?php
          $myrow = $obj->fetch_record('tbl_products');
          foreach($myrow as $row) {
            //breaking point
            ?>

          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["prod_name"]; ?></td>
            <td><?php echo $row["prod_qty"]; ?></td>
            <td><a href="index.php?update=1&id=<?php echo $row["id"] ?>" class="btn btn-info">Edit</a></td>
            <td><a href="includes/action.php?delete=1&id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete</a></td>
          </tr>

            <?php

          }

          ?>

        </table>
      </div>
      <div class="col-md-2"> 
      </div>
    </div>
  </div>



<?php
  include("includes/footer.php");
?>
    