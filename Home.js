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