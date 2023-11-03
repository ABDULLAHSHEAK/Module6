<?php
// ********** Database Connection ***********
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "module_6");

$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
if (!$conn) {
  echo die("" . mysqli_connect_error());
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MySQL Assignment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>

  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12 pt-4 mt-4">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h2 class="text-center">Module-6 Assignment</h2>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-10 mx-auto">
                <div class="table table-responsive">
                  <h2 class="bg-warning p-2">Task-1</h2>
                  <table class="table table table-primary table-striped table-hover table-bordered">
                    <tr>
                      <th>Customer ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Location</th>
                      <th>Total Order</th>
                    </tr>
                    <?php
                    $query1 = "SELECT c.cust_id , c.name , c.email ,  c.location, COUNT(o.order_id) AS total_orders FROM customers c LEFT JOIN orders o ON c.cust_id = o.customer_id GROUP BY c.cust_id , c.name , c.email , c.location ORDER BY total_orders DESC ";
                    $run1 = mysqli_query($conn, $query1);
                    while ($result1 = mysqli_fetch_assoc($run1)) {

                    ?>

                      <tr>
                        <td><?= $result1['cust_id'] ?></td>
                        <td><?= $result1['name'] ?></td>
                        <td><?= $result1['email'] ?></td>
                        <td><?= $result1['location'] ?></td>
                        <td><?= $result1['total_orders'] ?></td>
                      </tr>
                    <?php } ?>

                  </table>
                </div>
                <div class="table table-responsive">
                  <!-- ----------------------- task 2-------------------  -->
                  <h2 class="bg-warning p-2">Task-2</h2>
                  <table class="table table table-primary table-striped table-hover table-bordered">
                    <tr>
                      <th>Order ID</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Total Amount</th>
                    </tr>
                    <?php
                    $query2 = "SELECT i.order_id , p.name , i.quantity , i.unit_price FROM order_items i INNER JOIN products p ON i.product_id = p.product_id ORDER BY order_id ASC";
                    $run2 = mysqli_query($conn, $query2);
                    while ($result2 = mysqli_fetch_assoc($run2)) {
                    ?>
                      <tr>
                        <td><?= $result2['order_id'] ?></td>
                        <td><?= $result2['name'] ?></td>
                        <td><?= $result2['quantity'] ?></td>
                        <td><?= $result2['unit_price'] ?></td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
              <!-- --------- task ---------  -->
              <div class="col-10 mx-auto">
                <div class="table table-responsive">
                  <h2 class="bg-warning p-2">Task-3</h2>
                  <table class="table table-primary table-striped table-hover table-bordered">
                    <tr>
                      <th>Category Name</th>
                      <th>Total Revenue</th>
                    </tr>
                    <?php
                    $query3 = "SELECT c.name, SUM(i.unit_price) AS total_revenue FROM categories c LEFT JOIN order_items i ON c.cat_id = i.cat_id GROUP BY c.name ORDER BY total_revenue DESC";
                    $run3 = mysqli_query($conn, $query3);
                    while ($result3 = mysqli_fetch_assoc($run3)) {
                    ?>
                      <tr>
                        <td><?= $result3['name'] ?></td>
                        <td><?= $result3['total_revenue'] ?></td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
              <!-- --------- task 4---------  -->
              <!-- --------- task4 ---------  -->
              <div class="col-10 mx-auto">
                <div class="table table-responsive">
                  <h2 class="bg-warning p-2">Task-4</h2>
                  <table class="table table table-primary table-striped table-hover table-bordered">
                    <tr>
                      <th>Customer Name</th>
                      <th>Total Pucrches Amount</th>
                    </tr>
                    <?php
                    $query4 = "SELECT c.name , o.total_amount FROM orders o LEFT JOIN customers c ON o.customer_id = c.cust_id ORDER BY total_amount DESC limit 5 ";
                    $run4 = mysqli_query($conn, $query4);
                    while ($result4 = mysqli_fetch_assoc($run4)) {
                    ?>
                      <tr>
                        <td><?= $result4['name'] ?></td>
                        <td><?= $result4['total_amount'] ?></td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div />
</body>

</html>