var tabs = document.getElementsByClassName("tab-item");
var i,tablinks,tabcontent;
for(i=0;i<tabs.length;i++){
tabs[i].onclick=function(){
var tabu = this.getAttribute("data-tab");
var tabr = document.getElementById(tabu);
tabcontent = document.getElementsByClassName("tab-content");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tab-item");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  tabr.style.display = "block";
  this.classList.add("active");
}
}
window.onload = function(){
	document.getElementById('DefaultClicked').click();
}