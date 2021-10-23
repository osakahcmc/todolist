function CheckOne() {
    let CheckOne = document.getElementsByClassName('CheckOne');
    let UsernameArray = [];
    for(let i = 0; i <= CheckOne.length; i++) {
        if (CheckOne[i].checked === true) {
            CheckOne[i].setAttribute('checked', '');
            UsernameArray.push(CheckOne[i].value);
            document.getElementById("GetValueDelete").value = UsernameArray;
        } else {
            CheckOne[i].removeAttribute('checked');
            document.getElementById("GetValueDelete").value = UsernameArray;
        }
    }
}

function CheckAll() {
    let CheckOne = document.getElementsByClassName('CheckOne');
    let CheckAll = document.getElementsByClassName('CheckAll');
    let UsernameArray = [];
    if(CheckAll[0].checked === true) {
        CheckAll[0].setAttribute('checked', '');
        for (let i = 0; i <= CheckOne.length; i++) {
            CheckOne[i].setAttribute('checked', '');
            CheckOne[i].checked = true;
            UsernameArray.push(CheckOne[i].value);
            document.getElementById("GetValueDelete").value = UsernameArray;
        }
    }
    else{
        CheckAll[0].removeAttribute('checked');
        for (let i = 0; i <= CheckOne.length; i++) {
            CheckOne[i].removeAttribute('checked');
            CheckOne[i].checked = false;
            document.getElementById("GetValueDelete").value = UsernameArray;
        }
    }
}

function ChangeStatus() {
    let CheckOne = document.getElementsByClassName("CheckOne");
    let WorkStatus = document.getElementsByClassName("EditStatus");
    for(let i = 0; i <= CheckOne.length; i++) {
        if (CheckOne[i].checked === true) {
            WorkStatus[i].removeAttribute('disabled');
            WorkStatus[i].style.border = '1px solid';
            CheckOne[i].setAttribute('checked', '');
        } else {
            WorkStatus[i].setAttribute('disabled','');
            WorkStatus[i].style.border = '0px';
            CheckOne[i].removeAttribute('checked');
        }
    }
}

function ChooseStatus() {
    let CheckOne = document.getElementsByClassName('CheckOne');
    let ChooseStatus = document.getElementsByClassName('EditStatus');
    let UsernameArray = [];
    for(let i = 0; i < ChooseStatus.length; i++) {
        for(let j = 0; j < ChooseStatus[i].getElementsByTagName('option').length; j++){
            if(ChooseStatus[i].getElementsByTagName('option')[j].selected  === true){
                ChooseStatus[i].getElementsByTagName('option')[j].setAttribute("selected","");
                if(CheckOne[i].checked === true){
                    UsernameArray.push(CheckOne[i].value);
                    UsernameArray.push(ChooseStatus[i].value,' ');
                    document.getElementById("GetValueEdit").value = UsernameArray;
                }
            }else{
                ChooseStatus[i].getElementsByTagName('option')[j].removeAttribute("selected");
            }
        }
    }
}
