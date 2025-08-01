function back(){
    window.location.href = "index.php";
}
let minus = document.querySelectorAll(".minus-product");
minus.forEach((eachMinus)=>{
   eachMinus.addEventListener("click" ,()=>{
       this.submit();
   });
});