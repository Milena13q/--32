send = function(){

    var dat = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        lang: document.getElementById("select").value
    }

    const data = JSON.stringify(dat);

    console.log(data);

    localStorage.setItem("Данные", data);

}

receive = function(){

    var returnObj = localStorage.getItem("Данные");
    
    alert(returnObj);

}