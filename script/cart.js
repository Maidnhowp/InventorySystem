const basketBtn = document.getElementById("basket-btn");

basketBtn.addEventListener("click",(e)=>{
    e.preventDefault();
    const modal = document.getElementsByClassName("modal");
    modal[0].style.visibility = "visible";
    const closeBtn = document.getElementById("close-btn");
    closeBtn.addEventListener("click",()=>{
        modal[0].style.visibility = "hidden";
    })
}) 


