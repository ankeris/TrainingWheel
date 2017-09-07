const loader = document.querySelector("#sketch");
const title = document.querySelector("#levelName");

window.onload = function loading() {
	title.style.display = "none";
}
setTimeout(function(){
	title.style.display = "block";
	loader.style.display = "none";
	}, 700);