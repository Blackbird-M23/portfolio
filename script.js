document.querySelectorAll('nav ul li a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
  
      const targetId = this.getAttribute('href').substring(1);
      const targetSection = document.getElementById(targetId);
  
      // Smooth scroll to the target section
      targetSection.scrollIntoView({
        behavior: 'smooth'
      });
  
      // Highlight active section
      document.querySelectorAll('nav ul li a').forEach(anchor => {
        anchor.classList.remove('active-section');
      });
      this.classList.add('active-section');
    });
  });

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

  