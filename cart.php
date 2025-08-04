<?php 
$conn = new mysqli("localhost" , "root" , "" , "QLSHOPDH");

     
$showData = "SELECT * FROM Products";
$result = $conn->query($showData);


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
      <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <form method="post" action="cart.php"  name="formCart">
        <div class="wrapper" id="showForm">
          <header>
              <div class="nameShop">
                <i class="fa-solid fa-arrow-left back" onclick="back(this)"></i>
                <img src="./Image/brand.png" alt="">
                 <h2>Royal Time</h2>
              </div>
             <div class="navBar">
               <ul>
                <li><a href="#">XU HƯỚNG 2025</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Nam</a></li>
                <li><a href="#">Nữ</a></li>
                <li><a href="#">Luxury</a></li>
                <li><a href="#">Cũ cao cấp</a></li>
                <li><a href="#">Treo tường</a></li>
                 <li id="search">
                  <i class='bx  bx-search icon-search'></i> 
                  <input type="text" name="searh" id="" size="45  ">
                 </li>
                <li><i class='bx  bx-user-circle account-icon'  ></i> </li>
               </ul>
             </div>
            </header>
            <table   class="cart">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Loại sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Đơn giá</th>
                  <th>Số lượng</th>
                   <th>Thành tiền</th>
                </tr>
              </thead>
              <tbody>
               <?php 
         $total = NULL;
             if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $total += $row['PRICE'] * $row['AMOUNT'];
       echo "<tr>";
       echo "<td>" . $row['IDP'] . "</td>";
       echo "<td>" . $row['TYPEP'] . "</td>";
       echo "<td>" . $row['NAMEP'] . "</td>";
       echo "<td>". "$"  . $row['PRICE'] . "</td>";
       echo "<td>" . $row['AMOUNT'] . "</td>";
       echo "<td>". "$" . $row['PRICE'] * $row['AMOUNT'] . "</td>";
        echo "<td> <i class='fa-solid fa-minus minus-product'></i> </td>";
       echo "</tr>";
    }
      echo "<tr>";
      echo "<td colspan ='7' style='text-align:center ; font-weight:bold ; color:red'>" . "Tổng thanh toán : " . $total . "</td>";
       echo "</tr>";
}
               ?>

              </tbody>
            </table>
        </div>
     </form>
     <script src="cart.js"></script>
</body>
</html>

