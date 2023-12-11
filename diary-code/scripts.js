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


// Function to toggle open and close a form using the + button in the pill monitoring section
function toggleForm(className){
  const form = document.querySelector('.'+className);

	form.classList.toggle('openedForm')
	const isOpen = form.classList.contains('openedForm')
  var forms = document.getElementsByClassName(className);
	if (isOpen){
      for (i = 0; i < forms.length; i++) {
        forms[i].style.display = "block";
      }
	}
	else{
      for (i = 0; i < forms.length; i++) {
        forms[i].style.display = "none";
      }
	}
}

// Function to ask for confirmation before canceling form 
function confirmCancel(formName) {
      // Check if any form field has content
      var formHasContent = Array.from(document.getElementById(formName).elements).some(element => {
        return element.type !== 'submit' && element.value.trim() !== '';
      });
      // If the form has content, show the SweetAlert confirmation dialog
      if (formHasContent) {
         Swal.fire({
          title: 'Are you sure you want to cancel?',
          text: 'You will lose your entered data.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, cancel.',
          cancelButtonText: 'No! Don\'t cancel.',
        }).then((result) => {
          // If the user clicks OK, reset the form
          if (result.isConfirmed) {
            document.getElementById(formName).reset();
          }
        });
      }
    }


//This part adds conditions to the date fields in the forms
const today = new Date().toISOString().split('T')[0]; //getting today's date
document.getElementById('dateTaken').setAttribute('max', today);
document.getElementById('entryDate').setAttribute('max', today);


//Function to delete rows from the database
function deleteRow(rowId, phpFile) {
    Swal.fire({
        title: 'Are you sure you want to delete this entry?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // User confirmed deletion
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                // Reload the page or update the container after successful deletion
                location.reload();
              }
            };
            //refer to a php file that has the query to delete a row from an sql table
            xhttp.open("GET", phpFile + "?id=" + rowId, true);
            xhttp.send();
        }
    });
}

