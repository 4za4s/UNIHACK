//very bad login but security isnt important right now

function login(){
    uname = document.getElementById("Uname").value;
    pass = document.getElementById("Pass").value;
    remember = document.getElementById("remember").checked;

    console.log(uname, pass, remember)
    if (uname == "Aaron" && pass == "1234"){
        if (remember) {
            localStorage.setItem("login", uname + pass)
        }
        window.location.href = "UserPage.html";
    }
}

function autologin() {
    if (localStorage.getItem("login") == "Aaron1234") {
        window.location.href = "UserPage.html";
    }
}

if (typeof window !== "undefined") {
    window.onload = () => {
      autologin();
    };
  }