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
  