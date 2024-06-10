document.getElementById('application-form').addEventListener('submit', function(event) {
  event.preventDefault();
  
  let formData = new FormData(this);

  fetch('process.php', {
      method: 'POST',
      body: formData
  })
  .then(response => response.text())
  .then(data => {
      alert(data);
  })
  .catch(error => {
      console.error('Error:', error);
  });
});





document.getElementById('same-as-communication-address').addEventListener('click', function() {
  var communicationAddressFields = [
    document.getElementById('communication-address'),
    document.getElementById('communication-address-1'),
    document.getElementById('communication-address-2')
  ];
  var permanentAddressFields = [
    document.getElementById('permanent-address'),
    document.getElementById('permanent-address-1'),
    document.getElementById('permanent-address-2')
  ];
  if (this.checked) {
    permanentAddressFields.forEach(function(field, index) {
      field.value = communicationAddressFields[index].value;
      field.disabled = true;
    });
  } else {
    permanentAddressFields.forEach(function(field) {
      field.value = '';
      field.disabled = false;
    });
  }
});

document.addEventListener("DOMContentLoaded", function() {
  // Function to fetch department and course data
  function fetchCourses() {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'fetch.php', true);
      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
      xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  var data = JSON.parse(xhr.responseText);
                  populateDropdowns(data.courses);
              } else {
                  console.error('Error fetching data:', xhr.status);
              }
          }
      };
      xhr.send();
  }

  // Function to populate dropdowns with department and course data
  function populateDropdowns(courses) {
      var departmentDropdown = document.getElementById('programme-applied');
      var courseDropdown = document.getElementById('select-programme');

      // Clear previous options
      departmentDropdown.innerHTML = '<option value="">Select degree</option>';
      courseDropdown.innerHTML = '<option value="">Select programme</option>';

      // Populate department dropdown
      var departments = {};
      courses.forEach(function(course) {
          departments[course.department] = departments[course.department] || [];
          departments[course.department].push(course.course);
      });

      for (var department in departments) {
          var option = document.createElement('option');
          option.value = department;
          option.textContent = department;
          departmentDropdown.appendChild(option);
      }

      // Update course dropdown when department changes
      departmentDropdown.addEventListener('change', function() {
          var selectedDepartment = this.value;
          courseDropdown.innerHTML = '<option value="">Select  programme</option>';
          if (selectedDepartment !== '') {
              departments[selectedDepartment].forEach(function(course) {
                  var option = document.createElement('option');
                  option.value = course;
                  option.textContent = course;
                  courseDropdown.appendChild(option);
              });
          }
      });
  }

  // Fetch courses when the page loads
  fetchCourses();
});

