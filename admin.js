$(document).ready(function() {
    $('.rep a').click(function(event) {
      event.preventDefault(); // Prevent default anchor tag behavior (navigation)
      var href = $(this).attr('href'); // Get the target URL from the link's href attribute
      window.location.href = href; // Redirect the browser to the target URL
    });
  });