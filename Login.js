let clickEye = document.querySelectorAll(".eye-close");
let changeType = document.querySelectorAll('[name="userpass"]')
clickEye.forEach(function(icon){
     icon.addEventListener("click" , function(){
     this.classList.toggle("click");
     changeType.forEach(function(input){
         if(input.type === "password"){
            input.type = "text";
         }else{
            input.type = "password";
         }
     });
    });
});
function showRegister(){
   document.getElementById("loginForm").classList.remove("active");
   document.getElementById("registerForm").classList.add("active");
}
function showLogin(){
   document.getElementById("loginForm").classList.add("active");
   document.getElementById("registerForm").classList.remove("active");
}