// Get the projects tab and flyout menu
var projectsTab = document.getElementById("projects-tab");
var flyoutMenu = document.getElementById("flyout-menu");

// Display flyout menu on hover
projectsTab.addEventListener("mouseover", function() {
  flyoutMenu.style.display = "block";
});

// Hide flyout menu when mouse leaves the projects tab or flyout menu
projectsTab.addEventListener("mouseout", function() {
  flyoutMenu.style.display = "none";
});

flyoutMenu.addEventListener("mouseout", function() {
  flyoutMenu.style.display = "none";
});
