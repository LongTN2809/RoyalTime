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
const forms = document.querySelectorAll("form");

forms.forEach(function(form){
   form.addEventListener("submit" , function(event){
      let isnotvalid = false;
    const nameInput = form.querySelector('[name="username"]');
const passInput = form.querySelector('[name="userpass"]') ;
const emailInput = form.querySelector('[name="useremail"]');
const notices = form.querySelectorAll(".notice");
   form.querySelectorAll(".warning").forEach(function(element){
    element.classList.remove("warning");
});
notices.forEach(function(notice){
   notice.innerText = "";
});
if(!isNaN(nameInput.value) && nameInput.value !== ""){
   nameInput.classList.add("warning");
   notices[0].innerText = "Name is not valid!";
   isnotvalid = true;
}else if(passInput.value.length < 10 && passInput.value !== ""){
   passInput.classList.add("warning");
   notices[1].innerText = "Password must be at least 10 characters long";
   notices[1].style.top = 55 + "px";
   isnotvalid = true;
}
if(isnotvalid){
   event.preventDefault();
}

   });
});
