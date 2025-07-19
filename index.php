<?php 
   session_start();
  $conn = new mysqli("localhost" , "root" , "" , "QLSHOPDH");
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
          $type = $_POST['typeProduct'];
         $name = $_POST['nameProduct'];
         $cost = $_POST['priceProduct'];
         $cost = (int)str_replace("$" , "" , $cost);
         $dataProduct = "SELECT NAMEP , AMOUNT FROM Products WHERE LOWER(NAMEP) = LOWER('$name')"; // Tạo chuỗi truy vấn
         $result = $conn->query($dataProduct); // Chuyển chuỗi thành câu truy vấn và gán vào biến
         if($result->num_rows > 0){ // Nếu có kết quả trùng
          while ($rows = $result->fetch_assoc()) { //Duyệt và update
               if(strtolower($name) === strtolower($rows['NAMEP'])){
                    $update = "UPDATE Products SET AMOUNT = AMOUNT + 1 WHERE LOWER(NAMEP) = LOWER('$name')";
                    $conn->query($update);
                    break;
               }
             }
      }else{
           $count = 1; 
       $sqlInsert = "INSERT INTO Products (TYPEP , NAMEP , PRICE , AMOUNT) VALUES ('$type' , '$name' ,'$cost' , '$count')"; // Thêm sản phẩm nếu không trùng
        $conn->query($sqlInsert);
      }
    }  

?>  
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Royal Time</title>
      <link rel="stylesheet" href="Home.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  </head>
  <body>
       <form action="index.php" method="post" name="A" id="A">
            <div class="wrapper">
            <header>
              <h2>Royal Time</h2>
            </header>
              <div class="line-Product">
                  <div class="product">
                <div class="product-image">
                  <img src="./Image/apple-watch-ultra-2-remove.png" alt="">
                </div>
                <div class="infor">
                    <p class="type">Smart Watch</p>
                   <h3 class="name">Apple Watch<br>Ultra 2</h3>
                   <p class="price">$200</p>
                   <i class="fa-regular fa-heart heart"></i>
                   <input type="button" name="add" id="" value="Add" onclick="addProduct(event , this)">
                </div>
              </div>

                <div class="product">
                <div class="product-image">
                  <img src="./Image/Hublot_Big_Bang-removebg.png" alt="">
                </div>
                   <div class="infor">
                    <p class="type">Quartz Watch </p>
                   <h3 class="name">Hublot Big<br>Bang</h3>
                   <p class="price">$200</p>
                   <i class="fa-regular fa-heart heart"></i>
                    <input type="button" name="add" id="" value="Add" onclick="addProduct(event , this)">
                </div>

              </div>
                <div class="product">
                <div class="product-image">
                  <img src="./Image/xiaomi remove.png" alt="">
                </div>
                   <div class="infor">
                    <p class="type">Smart Watch</p>
                   <h3 class="name">Xiaomi Redmi<br>Watch 4</h3>
                   <p class="price">$200</p>
                   <i class="fa-regular fa-heart heart"></i>
                    <input type="button" name="add" id="" value="Add" onclick="addProduct(event , this)">
                </div>
              </div>

                  <div class="product">
                <div class="product-image">
                  <img src="./Image/Omega_De_Vilee-removebg.png" alt="">
                </div>
                   <div class="infor">
                    <p class="type">Quartz Watch</p>
                   <h3 class="name">Omega De<br>Ville</h3>
                   <p class="price">$200</p>
                   <i class="fa-regular fa-heart heart"></i>
                   <input type="button" name="add" id="" value="Add" onclick="addProduct( event ,this)">
                </div>
              </div> 
              
                <div class="product">
                <div class="product-image">
                  <img src="./Image/hublot-removebg.png" alt="">
                </div>
                   <div class="infor">
                    <p class="type">Mechanic Watch</p>
                   <h3 class="name">Hublot Classic <br> Funsion</h3>
                   <p class="price">$9000</p>
                   <i class="fa-regular fa-heart heart"></i>
                   <input type="button" name="add" id="" value="Add" onclick="addProduct( event ,this)">
                </div>
              </div> 
              <div class="product">
                <div class="product-image">
                  <img src="./Image/rolex-removebg.png" alt="">
                </div>
                   <div class="infor">
                    <p class="type">Mechanic Watch</p>
                   <h3 class="name">Rolex Datejust</h3>
                   <p class="price">$50000</p>
                   <i class="fa-regular fa-heart heart"></i>
                   <input type="button" name="add" id="" value="Add" onclick="addProduct( event ,this)">
                </div>
              </div> 
   <div class="product">
                <div class="product-image">
                  <img src="./Image/chopard remove.png" alt="">
                </div>
                   <div class="infor">
                    <p class="type">Automatic Watch</p>
                   <h3 class="name">Chopard Happy Stars</h3>
                   <p class="price">$3000</p>
                   <i class="fa-regular fa-heart heart"></i>
                   <input type="button" name="add" id="" value="Add" onclick="addProduct( event ,this)">
                </div>
              </div> 
               <div class="product">
                <div class="product-image">
                   <img src="./Image/epos remove.png" alt="">
                </div>
                   <div class="infor">
                    <p class="type">Automatic Watch</p>
                   <h3 class="name">SEPOS SWISS <br> E</h3>
                   <p class="price">$500</p>
                   <i class="fa-regular fa-heart heart"></i>
                   <input type="button" name="add" id="" value="Add" onclick="addProduct( event ,this)">
                </div>
              </div>  
             <div class="Next">
                <button onclick="ScrollRight(event)" class="rightMouse"><i class="fa-solid fa-chevron-right angleRight"></i></button>
               <button onclick="ScrollLeft(event)" class="leftMouse"><i class="fa-solid fa-chevron-left angleLeft"></i></button>
              </div>
              </div>
              <div class="Actions">
                 <input type="submit" name="show" id="Show" value="Xem giỏ hàng">
              <input type="submit" name="delete" id="Delete" value="Xóa sản phẩm">
              <input type="submit" name="pay" id="Pay" value="Thanh toán">
              </div>
                   <input type="hidden" name="typeProduct" id="">
                  <input type="hidden" name="nameProduct">
                  <input type="hidden" name="priceProduct">
                    <div class="bars">
                <i class="fa-solid fa-bars icon-bars"></i>
             </div>
      </div>
     </form>
      <script src="./Home.js"></script>
  </body>
  </html>