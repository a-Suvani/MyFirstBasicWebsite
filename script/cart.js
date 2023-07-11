let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

document.querySelector('#close-edit').onclick = () =>{
    document.querySelector('.edit-form-container').computedStyleMap.display = 'none';
    window.location.href = 'admin.php';
}

document.querySelector('#close-edit').onclick = () =>{
    document.querySelector('.edit-form-container').style.display = 'none';
    window.location.href = 'admin.php';
}