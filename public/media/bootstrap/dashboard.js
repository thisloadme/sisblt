/* globals Chart:false, feather:false */

// Icon Sidebar
(function () {
  'use strict'

  feather.replace()
}())

// Untuk Dropdown
var dropdown = document.getElementsByClassName("nav-link text-white");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

$(document).ready(function(){
  $("#search-pasien").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table-pasien tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
  });
});

$(document).ready(function(){
  $("#search-terlayani").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table-terlayani tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
  });
});