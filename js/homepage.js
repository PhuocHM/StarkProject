var settingsmenu = document.querySelector(".settings-menu");

function settingMenuToggle() {
  settingsmenu.classList.toggle("settings-menu-height");
}
function hideChat(){
  document.getElementById('chatbox').innerHTML='';
}
function changeLike(x){
  document.getElementById(`like-button-${x}`).src="./img/SourceHomePage/like-blue.png";
}