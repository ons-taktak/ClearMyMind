const toggleBtn = document.querySelector('.toggle_btn')
const toggleBtnIcon = document.querySelector('.toggle_btn i')
const dropdown = document.querySelector('.dropdown')

const main = document.querySelector('.main')



// Function to open and close the navbar dropdown
function toggleOpen(){
	dropdown.classList.toggle('open')
	main.classList.toggle('open')
	const isOpen = dropdown.classList.contains('open')
	if (isOpen){
		toggleBtnIcon.classList = 'fa-solid fa-xmark'
	}
	else{
		toggleBtnIcon.classList = 'fa-solid fa-bars'
	}
}

// Function to switch between tabs
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

// This is the same function again, to control another set of tabs on the page
function openTab2(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent2");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks2");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

//Click on the tab with the class "defaultOpen" to make it open by default when website is opened
document.getElementById("defaultOpen").click();
document.getElementById("defaultOpen2").click();