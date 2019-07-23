<!DOCTYPE html>
<html>
<?php
// session_start();
include('head.php');
include('head.php');
include('header.php');
include('configdb.php'); 
?>
<style>
  .h-form .form-body .h-form-label {
    height: auto !important;
  }
</style>

<body>
  <?php
  if ($_SESSION['user_id'] == "") {
    echo "<script>window.location = './admin_login.php';</script>";
    exit();
  }
  $query = "SELECT * FROM answers order by id desc";
  $result = mysqli_query($conn, $query);
  ?>

  <div style="padding:10px;" align="right">
    <button id="exportExcel_Button" type="button" class="btn btn-success" onclick="exportExcel()">Export Excel</button>
    <a href="admin_login.php" id="logout_Button" value="submit"  class="btn btn-outline-success">Logout</a>
  </div>

  <div style="overflow-x:auto;padding:10Px;">
    <table class="table table-hover table-striped table-bordered table-sm" id="dtHorizontalVerticalExample">
      <!-- หัวข้อตาราง -->
      <tr align='center' bgcolor='#CCCCCC'>
      <td>id</td>
            <td>เวลาที่กรอกข้อมูล</td>
            <td>ชื่อบริษัท</td>
            <td>ชื่อ</td>
            <td>ตำแหน่ง</td>
            <td>เบอร์โทรศัพท์</td>
            <td>Email</td>
            <td>ข้อ 1.1</td>
            <td>ข้อ 1.2</td>
            <td>ข้อ 1.3</td>
            <td>ข้อ 1.4</td>
            <td>ข้อ 1.5</td>
            <td>ข้อ 2.1</td>
            <td>ข้อ 2.2</td>
            <td>ข้อ 2.3</td>
            <td>ข้อ 2.4</td>
            <td>ข้อ 2.5</td>
            <td>ข้อ 3.1</td>
            <td>ข้อ 3.2</td>
            <td>ข้อ 3.3</td>
            <td>ข้อ 3.4</td>
            <td>ข้อเสนอแนะ</td>
            <td>ลบข้อมูล</td>
      </tr>

      <?php
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] .  "</td> ";
        echo "<td>" . $row["date_time"] .  "</td> ";
        echo "<td>" . $row["company_name"] .  "</td> ";
        echo "<td>" . $row["customer_name"] .  "</td> ";
        echo "<td>" . $row["customer_position"] .  "</td> ";
        echo "<td>" . $row["customer_telephone"] .  "</td> ";
        echo "<td>" . $row["customer_email"] .  "</td> ";
        echo "<td>" . $row["q1_1"] .  "</td> ";
        echo "<td>" . $row["q1_2"] .  "</td> ";
        echo "<td>" . $row["q1_3"] .  "</td> ";
        echo "<td>" . $row["q1_4"] .  "</td> ";
        echo "<td>" . $row["q1_5"] .  "</td> ";
        echo "<td>" . $row["q2_1"] .  "</td> ";
        echo "<td>" . $row["q2_2"] .  "</td> ";
        echo "<td>" . $row["q2_3"] .  "</td> ";
        echo "<td>" . $row["q2_4"] .  "</td> ";
        echo "<td>" . $row["q2_5"] .  "</td> ";
        echo "<td>" . $row["q3_1"] .  "</td> ";
        echo "<td>" . $row["q3_2"] .  "</td> ";
        echo "<td>" . $row["q3_3"] .  "</td> ";
        echo "<td>" . $row["q3_4"] .  "</td> ";
        echo "<td>" . $row["suggestions_detail"] .  "</td> ";
        //ลบข้อมูล
        echo "<td style='text-align: center;'><a href='admin_del.php?id=$row[0]' onclick=\"return confirm('คุณต้องการลบข้อมูลแถวนี้ใช่หรือไม่? !!!')\"><img src='assets/images/bin.png' style='width:25px;heigth:25px;' /></a></td> ";
        echo "</tr>";
      }
      echo "</table>";
      mysqli_close($conn);
      ?>
  </div>
  <script>
    $(document).ready(function() {
      $('#dtHorizontalExample').DataTable({
        "scrollX": true
      });
      $('.dataTables_length').addClass('bs-select');
    });
  </script>

  <style>
    .dtHorizontalExampleWrapper {
      max-width: 600px;
      margin: 0 auto;
    }

    #dtHorizontalExample th,
    td {
      white-space: nowrap;
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
      bottom: .5em;
    }
  </style>
</body>

</html>






<script type="text/javascript">
function exportExcel()
{
  window.location = './exportExcel.php';
}
</script>


