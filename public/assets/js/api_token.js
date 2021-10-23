/******************************** API TOKEN COPY *********************************/
for(let i = 0; i < document.getElementsByClassName("api_button").length; i++) {
    document.getElementsByClassName("api_button")[i].addEventListener("click", function () {
        var copyText = document.getElementsByClassName("api_button")[i].value;
        navigator.clipboard.writeText(copyText);
    });
}
