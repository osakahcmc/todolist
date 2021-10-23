/***************************** CAPTCHA ****************************/
window.addEventListener('load', () => {
    let string_alpha = "7YyWLlRrnOoJpZ!@#Ee^DcbP3zUwXxIiCNmjSsBM4&*q$%GgHhFf5dTtVvKkQ89Aau0126";
    let random_alpha = "";

    for(let i = 0; i < 6; i++){
        random_alpha += string_alpha.charAt(Math.floor(Math.random() * string_alpha.length));
    }

    document.getElementById("Captcha").value = random_alpha;
    document.getElementById("ResultsCaptcha").value = document.getElementById("Captcha").value;
});


document.getElementById("CaptchaRefresh").addEventListener("click",function(){
    let string_alpha = "7YyWLlRrnOoJpZ!@#Ee^DcbP3zUwXxIiCNmjSsBM4&*q$%GgHhFf5dTtVvKkQ89Aau0126";
    let random_alpha = "";

    for(let i = 0; i < 6; i++){
        random_alpha += string_alpha.charAt(Math.floor(Math.random() * string_alpha.length));
    }

    document.getElementById("Captcha").value = random_alpha;
    document.getElementById("ResultsCaptcha").value = document.getElementById("Captcha").value;
});
