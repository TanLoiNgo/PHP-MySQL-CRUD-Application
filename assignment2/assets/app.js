let loginBtn1= document.getElementById('loginBtn1');
let loginBtn2= document.getElementById('loginBtn2');
var body = document.querySelector('body');
var burger = document.getElementById('burger-nav');
var leftMenu = document.getElementById('sub-nav');
var ExitBtn = document.getElementById('ExitBtn');


burger.addEventListener("click", function(){
    leftMenu.style.display = 'flex';
    body.style.overflow = 'hidden';
})
ExitBtn.addEventListener("click", function(){
    leftMenu.style.display = 'none';
    body.style.overflow = 'initial';
})


function active(page, color){
    pageActive = document.getElementById(page);
    
    pageActive.classList.add(color);
}

loginBtn1.addEventListener("click", function showPanel(){
    login.style.display = 'flex';
    body.style.overflow = 'hidden';
});

loginBtn2.addEventListener("click", function showPanel(){
    login.style.display = 'flex';
    body.style.overflow = 'hidden';
});

function myFunction(id) {
    var r = confirm("You are about deleting the item. Are you sure?!");
    if (r == true) {
        window.location.href = './delete-item.php?item-id=' + id + '';
    }else{
        window.location.href = 'view-item-admin.php?cat-id=all';
    }
}