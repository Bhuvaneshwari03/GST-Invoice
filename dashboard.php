<?php
include('header.php');
include('functions.php');
include_once("includes/config.php");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row" style="background-color: lightgray;padding-top: 10px;">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php 
                
                $result = mysqli_query($mysqli, 'SELECT SUM(subtotal) AS value_sum FROM invoices WHERE status = "paid"'); 
                $row = mysqli_fetch_assoc($result); 
                $sum = $row['value_sum'];
                if($sum){
                  echo $sum;
                } else {
                  echo 0;
                }
                
                ?></h3>

              <p>Sales Amount</p>
            </div>
            <div class="icon">
              <i class="fa fa-inr"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="invoice-list.php" style="text-decoration: none;">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php 
                
                $sql = "SELECT * FROM invoices";
                $query = $mysqli->query($sql);

                echo "$query->num_rows";
                ?></h3>

              <p>Total Invoices</p>
            </div>
            <div class="icon">
              <i class="ion ion-printer"></i>
            </div>
            
          </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="invoice-list.php?type=open" style="text-decoration: none;">
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3><?php 
                
                $sql = "SELECT * FROM invoices WHERE status = 'open'";
                $query = $mysqli->query($sql);

                echo "$query->num_rows";
                ?></h3>

              <p>Pending Bills</p>
            </div>
            <div class="icon">
              <i class="ion ion-load-a"></i>
            </div>
            
          </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <h3><?php 
                
                $result = mysqli_query($mysqli, 'SELECT SUM(subtotal) AS value_sum FROM invoices WHERE status = "open"'); 
                $row = mysqli_fetch_assoc($result); 
                $sum = $row['value_sum'];
                echo $sum;
                ?></h3>

              <p>Due Amount</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


      <!-- 2nd row -->
      <div class="row" style="background-color: lightgray;">
        <div class="col-lg-3 col-xs-6">
        <a href="product-list.php" style="text-decoration: none;">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php 
                
                $sql = "SELECT * FROM products";
                $query = $mysqli->query($sql);

                echo "$query->num_rows";
                ?></h3>

              <p>Total Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-social-dropbox"></i>
            </div>
            
          </div>
        </a>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="customer-list.php" style="text-decoration: none;">
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php 
                
                $sql = "SELECT * FROM store_customers";
                $query = $mysqli->query($sql);

                echo "$query->num_rows";
                ?></h3>

              <p>Total Customers</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            
          </div>
          </a>
        </div>

        <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <a href="invoice-list.php?type=paid" style="text-decoration: none;">
        <div class="small-box bg-olive">
            <div class="inner">
                <h3><?php 
                    $sql = "SELECT * FROM invoices WHERE status = 'paid'";
                    $query = $mysqli->query($sql);
                    echo "$query->num_rows";
                    ?></h3>
                <p>Paid Bills</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-paper"></i>
            </div>
        </div>
    </a>
</div>

      </div>
       <div class="row">
        <div class="col-lg-6">
            <div class="card" style="background-color: lightgray;">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center;padding-top: 10px;">Invoice Pie Chart</h3>
                </div>
                <div class="card-body" style="padding-bottom: 32px;">
                    <!-- HTML Canvas Element for the smaller Chart -->
                    <canvas id="myPieChart" width="300" height="300"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card" style="background-color: lightgray;">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center;padding-top: 10px;">Invoice Graph Chart</h3>
                </div>
                <div class="card-body" style="padding-bottom: 32px;">
                    <!-- HTML Canvas Element for the smaller Chart -->
                    <canvas id="myLineChart" width="300" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
    </section>
<?php
	include('footer.php');
?>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- 
<script>
    // Function to show the SweetAlert dialog
    function showAlertDialog() {
        Swal.fire({
            title: 'Alert Message',
            text: 'You Have a Pending Invoices.!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Click to view',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'invoice-pending.php';
            }
        });
    }

    // Call the function when the page is loaded
    window.onload = function() {
        showAlertDialog();
    };
</script>
 -->

 <?php


 $whereClause = '';
$todayDate = date("Y-m-d");
$whereClause = "AND STR_TO_DATE(i.invoice_due_date, '%d/%m/%Y') <= '$todayDate' AND i.status = 'open'";
$sql = "SELECT * 
            FROM invoices i
            JOIN customers c ON c.invoice = i.invoice
            WHERE i.invoice = c.invoice $whereClause
            ORDER BY i.invoice";
$result = $mysqli->query($sql);
$pendingCount = $result->num_rows;
// $row = $result->fetch_assoc();
// $pendingCount = $row['pending_count'];
// $pendingCount = 0;
if($pendingCount){

echo "<script>";
echo "function showAlertDialog() {";
echo "Swal.fire({";
echo "title: 'Alert Message',";
echo "text: 'You have " . $pendingCount . " pending invoices!',";
echo "icon: 'warning',";
echo "showCancelButton: true,";
echo "confirmButtonText: 'Click to view',";
echo "cancelButtonText: 'Cancel'";
echo "}).then((result) => {";
echo "if (result.isConfirmed) {";
echo "window.location.href = 'invoice-pending.php';";
echo "}";
echo "});";
echo "}";
echo "window.onload = function() {";
echo "showAlertDialog();";
echo "};";
echo "</script>";
    
}
?>

<?php
// Fetch data for total invoices, total paid amount, and total due amount from MySQL
$totalInvoicesResult = mysqli_query($mysqli, 'SELECT SUM(subtotal) AS total_invoices FROM invoices');
$totalInvoicesRow = mysqli_fetch_assoc($totalInvoicesResult);
$totalInvoices = $totalInvoicesRow['total_invoices'];

$totalPaidAmountResult = mysqli_query($mysqli, 'SELECT SUM(subtotal) AS total_paid_amount FROM invoices WHERE status = "paid"');
$totalPaidAmountRow = mysqli_fetch_assoc($totalPaidAmountResult);
$totalPaidAmount = $totalPaidAmountRow['total_paid_amount'];

$totalDueAmountResult = mysqli_query($mysqli, 'SELECT SUM(subtotal) AS total_due_amount FROM invoices WHERE status = "open"');
$totalDueAmountRow = mysqli_fetch_assoc($totalDueAmountResult);
$totalDueAmount = $totalDueAmountRow['total_due_amount'];

// Pass data to JavaScript
echo "<script>";
echo "var totalInvoices = " . $totalInvoices . ";";
echo "var totalPaidAmount = " . $totalPaidAmount . ";";
echo "var totalDueAmount = " . $totalDueAmount . ";";
echo "</script>";
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Create a pie chart
var ctx = document.getElementById('myPieChart').getContext('2d');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Total Invoices Amount', 'Total Paid Amount', 'Total Due Amount'],
        datasets: [{
            data: [totalInvoices, totalPaidAmount, totalDueAmount],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>
<?php 
// Initialize arrays to store data for each month
$totalInvoicesData = [];
$totalPaidAmountData = [];
$totalDueAmountData = [];

// Loop through each month to fetch data
for ($i = 1; $i <= 12; $i++) {
    // Get the first day of the current month
    $firstDayOfMonth = date('Y-m-01', strtotime(date('Y') . '-' . $i . '-01'));

    // Get the last day of the current month
    $lastDayOfMonth = date('Y-m-t', strtotime($firstDayOfMonth));

    // Fetch data for total invoices, total paid amount, and total due amount for the current month
    $totalInvoicesResult = mysqli_query($mysqli, "SELECT SUM(subtotal) AS total_invoices FROM invoices WHERE STR_TO_DATE(invoice_date, '%d/%m/%Y') >= '$firstDayOfMonth' AND STR_TO_DATE(invoice_date, '%d/%m/%Y') <= '$lastDayOfMonth'");
    $totalInvoicesRow = mysqli_fetch_assoc($totalInvoicesResult);
    $totalInvoicesData[] = isset($totalInvoicesRow['total_invoices']) ? $totalInvoicesRow['total_invoices'] : 0;


    $totalPaidAmountResult = mysqli_query($mysqli, "SELECT SUM(subtotal) AS total_paid_amount FROM invoices WHERE status = 'paid' AND STR_TO_DATE(invoice_date, '%d/%m/%Y') >= '$firstDayOfMonth' AND STR_TO_DATE(invoice_date, '%d/%m/%Y') <= '$lastDayOfMonth'");
    $totalPaidAmountRow = mysqli_fetch_assoc($totalPaidAmountResult);
    // $totalPaidAmountData[] = $totalPaidAmountRow['total_paid_amount'] ?? 0;
    $totalPaidAmountData[] = isset($totalPaidAmountRow['total_paid_amount']) ? $totalPaidAmountRow['total_paid_amount'] : 0;


    $totalDueAmountResult = mysqli_query($mysqli, "SELECT SUM(subtotal) AS total_due_amount FROM invoices WHERE status = 'open' AND STR_TO_DATE(invoice_date, '%d/%m/%Y') >= '$firstDayOfMonth' AND STR_TO_DATE(invoice_date, '%d/%m/%Y') <= '$lastDayOfMonth'");
    $totalDueAmountRow = mysqli_fetch_assoc($totalDueAmountResult);
    // $totalDueAmountData[] = $totalDueAmountRow['total_due_amount'] ?? 0;
    $totalDueAmountData[] = isset($totalDueAmountRow['total_due_amount']) ? $totalDueAmountRow['total_due_amount'] : 0;
}

// Pass data to JavaScript
echo "<script>";
echo "var totalInvoicesData = " . json_encode($totalInvoicesData) . ";";
echo "var totalPaidAmountData = " . json_encode($totalPaidAmountData) . ";";
echo "var totalDueAmountData = " . json_encode($totalDueAmountData) . ";";
echo "</script>";
?>
<script>
// Create a line chart
var ctx = document.getElementById('myLineChart').getContext('2d');
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Total Invoices',
            data: totalInvoicesData,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }, {
            label: 'Total Paid Amount',
            data: totalPaidAmountData,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'Total Due Amount',
            data: totalDueAmountData,
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

<!-- HTML Canvas Element for the Chart -->
