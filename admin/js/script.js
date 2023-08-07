const tags = document.querySelectorAll(".tag");

const queryString = window.location.pathname;

const currentTag = queryString.split("/")[2];

tags.forEach((tag) => {
  if (tag.innerText.toLowerCase() === currentTag) {
    tag.classList.add("active");
  }
});

// Get the "Remove" links
var removeLinks = document.querySelectorAll(".link-secondary.remove");

// Add a click event listener to each link
removeLinks.forEach(function (link) {
  link.addEventListener("click", function (event) {
    // Prevent the link from being followed immediately
    event.preventDefault();

    // Show a confirmation dialog box
    var confirmed = confirm("Bạn có chắc muốn xoá?");

    // If the user confirmed, follow the link
    if (confirmed) {
      window.location.href = link.href;
    }
  });
});

// Get the "Chọn tất cả" button
var selectAllButton = document.getElementById("check-all");

// Add a click event listener to the button
selectAllButton.addEventListener("click", function (event) {
  // Get all the checkboxes in the table body
  var checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');

  // Check all the checkboxes
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = true;
  });
});

// Get the "Bỏ chọn tất cả" button
var unselectAllButton = document.getElementById("clear-all");

// Add a click event listener to the button
unselectAllButton.addEventListener("click", function (event) {
  // Get all the checkboxes in the table body
  var checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');

  // Uncheck all the checkboxes
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = false;
  });
});
