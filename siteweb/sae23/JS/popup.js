var popup;
function openPopup (btn, targetPopup) {
    popup = document.getElementById(targetPopup);
    popup.style.display = "block";
}

window.onclick = function(event) {
    if (event.target == popup) {popup.style.display = "none";}
}