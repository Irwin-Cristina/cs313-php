function myClick() {
            alert("Clicked");
}

function changeColor() {
    var textbox_id = "newtxtColor";
    var textbox = document.getElementById(textbox_id);
    
    var div_id ="pink";
    var div = document.getElementById(div_id);
    
    var color = textbox.value;
    div.style.backgroundColor = color;
}