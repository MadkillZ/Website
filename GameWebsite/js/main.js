if (getCookie("theme")=="Dark"){
  document.cookie = "theme=Light";
  //document.documentElement.setAttribute('data-theme', 'dark');
  //alert("Light");
}
else{
  document.cookie = "theme=Dark";
  //document.documentElement.setAttribute('data-theme', 'light');
  //alert("Dark"); 
}
var btnClicker = document.getElementById("togglebtn");
btnClicker.onclick = function(){
    if (getCookie("theme")==""){
        document.cookie = "theme=Light";
        document.documentElement.setAttribute('data-theme', 'dark');
        //alert("Light");
    }
    else if (getCookie("theme")=="Dark"){
        document.cookie = "theme=Light";
        document.documentElement.setAttribute('data-theme', 'dark');
        //alert("Light");
    }
    else{
        document.cookie = "theme=Dark";
        document.documentElement.setAttribute('data-theme', 'light');
        //alert("Dark"); 
    }
  };

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  
