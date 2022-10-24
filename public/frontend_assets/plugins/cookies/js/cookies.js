const allowButton = document.querySelector(".cookies__btn--allow");
const declineButton = document.querySelector(".cookies__btn--decline");
const cookiesElement = document.querySelector(".cookies");
let cookiesStatus = localStorage.getItem("cookies");
const cookiesShowTimeDelay = 1500;

// Enable Cookies Function
const disableCookies = () =>{
    // Add the class disable to the cookies Element
    cookiesElement.classList.remove("show");
    // Update cookiesStatus in the localStorage
    localStorage.setItem("cookies", "disable");
};

// Check localStorage cookiesStatus value
window.addEventListener("load", function(){
    if(cookiesStatus !== "disable"){
        setTimeout(
            function(){
                cookiesElement.classList.add("show");
            },
            cookiesShowTimeDelay
        );
    }
});

allowButton.addEventListener("click", function(){
    cookiesStatus = localStorage.getItem("cookies");
    if(cookiesStatus !== "disable"){
        disableCookies();
    }
});

declineButton.addEventListener("click", function(){
    cookiesElement.classList.remove("show");
});