function addProduct(event , button){
    // event.preventDefault();
    if(!button){
        return false;
    }

     let type , name , price , product;
    product = button.closest(".product");
    type = product.querySelector(".type").innerText;
    name = product.querySelector(".name").innerText;
    price = product.querySelector(".price").innerText;
    
    let form = document.getElementById("A");
    form.typeProduct.value = type;
    form.nameProduct.value = name;
    form.priceProduct.value = price;
    form.submit();
    
}
//  function ScrollRight(event){
//     event.preventDefault();
//        let container =  document.querySelector(".line-Product");
//       container.scrollBy({
//             left: 300,
//            behavior: "smooth"
//         });
//         setTimeout(()=>{
//            localStorage.setItem("scrollPos" , container.scrollLeft);
//         } , 300 );
     
// }


function ScrollRight(event){
   event.preventDefault();
   let container = document.querySelector(".line-Product");
   container.scrollBy({
      left: 300,
      behavior:"smooth"
   });
  
   setTimeout(()=>{
    localStorage.setItem("scrollPos" , container.scrollLeft);
   }, 500);
}
function ScrollLeft(event){
    event.preventDefault();
     let container =   document.querySelector(".line-Product");
    container.scrollBy({
            left: -300,
           behavior: "smooth"
    });
   setTimeout(()=>{
     localStorage.setItem("scrollPos" , container.scrollLeft);
   }, 500);
  
}
   window.addEventListener("load",()=>{
    let container = document.querySelector(".line-Product");
    let scrollPos = localStorage.getItem("scrollPos");
     if (scrollPos !== null) {
    container.scrollLeft = scrollPos;
     }
  });
let heart = document.querySelectorAll(".heart");
heart.forEach(function(heart){
  heart.addEventListener("click" , function(){
        this.classList.toggle("liked");
  });
});

function showProduct(event, show){
   event.preventDefault();
   const form = document.getElementById("A");
  const formData = new FormData(form);
   formData.append("show", "Xem giỏ hàng");
   fetch("index.php",{
       method: "POST",
       body: formData
   })
   .then(res=>res.text())
   .then(data=>{
     document.getElementById("homeForm").classList.remove("active");
     document.getElementById("showForm").classList.add("active");
       document.getElementById("homeForm").innerHTML = data;
   });
   
}
function back(event){
    event.preventDefault();
    document.getElementById('homeForm').classList.add('active');
    document.getElementById('showForm').classList.remove('active');
}