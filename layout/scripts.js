const toggleBtn = document.querySelector('.toggle_btn')
const toggleBtnIcon = document.querySelector('.toggle_btn i')
const dropdown = document.querySelector('.dropdown')

const main = document.querySelector('.main')



// Function to open and close the navbar dropdown
function toggleOpen() {
  dropdown.classList.toggle('open')
  main.classList.toggle('open')
  const isOpen = dropdown.classList.contains('open')
  if (isOpen) {
    toggleBtnIcon.classList = 'fa-solid fa-xmark'
  }
  else {
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

// Function to upload diary posts
// function submitForm() {
//   var title = document.getElementById("title").value;
//   var mainText = document.getElementById("main-text").value;

//   var xhr = new XMLHttpRequest();
//   xhr.open("POST", "JournalEntry/db_write.php", true);
//   xhr.withCredentials = true;
//   if (xhr.readyState == 1) {
//     alert("XHR opened successfully.");
//   } else {
//     console.error("Failed to open XHR.");
//   }
//   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

//   xhr.onreadystatechange = function () {
//     alert(xhr.status);
//     if (xhr.readyState == 4) {
//       if (xhr.status == 200) {
//         console.log("Data saved successfully!");
//         // You can perform additional actions after successful data submission
//       } else {
//         console.error("Error: " + xhr.responseText);
//         // Handle errors or provide feedback to the user
//       }
//     }
//   };

//   // Prepare data for POST request
//   var formData = "title=" + encodeURIComponent(title) + "&main-text=" + encodeURIComponent(mainText);

//   // Send the request
//   xhr.send(formData);
// }

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