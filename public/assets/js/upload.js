let add_product_image = document.getElementById("image");
let add_product_album = document.getElementById("album");
let button_upload_image = document.querySelector("#button_upload_image");
let button_upload_album = document.querySelector("#button_upload_album");

add_product_image.addEventListener("change", (event)=>{
    button_upload_image.innerHTML = add_product_image.files[0].name;
});
add_product_album.addEventListener("change", (event)=>{
    button_upload_album.innerHTML = '';
    for(let i = 0; i < add_product_album.files.length; i++){
        button_upload_album.innerHTML += add_product_album.files[i].name + '<br/>';
    }
});
