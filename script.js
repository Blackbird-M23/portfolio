// for navigation bar
document.querySelectorAll('nav ul li a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
  
      const targetId = this.getAttribute('href').substring(1);
      const targetSection = document.getElementById(targetId);
  
      // Smooth scroll to the target section
      targetSection.scrollIntoView({
        behavior: 'smooth'
      });
  
      document.querySelectorAll('nav ul li a').forEach(anchor => {
        anchor.classList.remove('active-section');
      });
      this.classList.add('active-section');
    });
  });


// for scroll to top button

const scrollToTopBtn = document.getElementById("scrollToTopBtn");

window.addEventListener("scroll", () => {
  // Show button when user scrolls down 300px
  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
    scrollToTopBtn.style.display = "block";
  } else {
    scrollToTopBtn.style.display = "none";
  }
});

scrollToTopBtn.addEventListener("click", () => {
  // Scroll to the top smoothly
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
});

// contact form

$('.form-class').submit(function (event) {
  event.preventDefault();

  var name = $('input[name=name]').val().trim();
  var email = $('input[name=email]').val().trim();

  if (name === '' || email === '') {
      alert('Please fill in the required fields (Name and Email).');
      return;
  }

  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
      alert('Please enter a valid email address.');
      return;
  }

  var formData = {
      name: name,
      email: email,
      subject: $('input[name=subject]').val(),
      message: $('textarea[name=message]').val()
  };

  $.ajax({
      type: 'POST',
      url: './datainfo.php',
      data: formData,
      success: function (response) {
          alert(response.message);
          $('.contact form')[0].reset();
      },
      error: function (error) {
          console.error('Error:', error);
      }
  });
});

  