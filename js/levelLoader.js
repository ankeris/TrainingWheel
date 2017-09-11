const loader = document.querySelector("#sketch");
const title = document.querySelector("#levelName");

window.onload = function loading() {
  title.style.display = "none";
}
setTimeout(function() {
  loader.style.display = "none";
  title.style.display = "block";

}, 700);
