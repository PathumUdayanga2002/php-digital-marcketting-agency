// Simple form handling for signup and contact forms

document.addEventListener('DOMContentLoaded', () => {
  const signupForm = document.getElementById('signup-form');
  const signupMessage = document.getElementById('signup-message');

  if (signupForm && signupMessage) {
    signupForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      // Check if user is logged in
      if (!window.isLoggedIn) {
        alert('You must be logged in to request a consultation. Redirecting to login page...');
        window.location.href = 'login.php';
        return;
      }
      
      signupMessage.textContent = 'Thanks for reaching out to Boostify Digital! A strategist will contact you shortly.';
      signupMessage.classList.add('show');
      signupForm.reset();
    });
  }

  const contactForm = document.getElementById('contact-form');

  if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      
      // Check if user is logged in
      if (!window.isLoggedIn) {
        alert('You must be logged in to send a message. Redirecting to login page...');
        window.location.href = 'login.php';
        return;
      }

      const formData = new FormData(contactForm);
      
      try {
        const response = await fetch('handle_contact.php', {
          method: 'POST',
          body: formData,
          credentials: 'same-origin',
          headers: {
            'Accept': 'application/json'
          }
        });

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        
        if (data.success) {
          alert(data.success);
          contactForm.reset();
        } else if (data.error) {
          alert('Error: ' + data.error);
        }
      } catch (error) {
        alert('An error occurred while sending your message. Please try again.');
        console.error('Error:', error);
      }
    });
  }

  // Register form validation (only on register page)
  const registerForm = document.querySelector('form[method="post"]');
  
  if (registerForm && document.getElementById('username') && document.getElementById('password') && document.getElementById('email') && document.getElementById('contact')) {
    registerForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      const username = document.getElementById('username').value.trim();
      const password = document.getElementById('password').value;
      const email = document.getElementById('email').value.trim();
      const contact = document.getElementById('contact').value.trim();
      
      let isValid = true;
      let errorMessage = '';
      
      // Username validation - more than 3 characters, alphanumeric and underscores only
      if (username.length < 3) {
        isValid = false;
        errorMessage += 'Username must be at least 3 characters long.\n';
      } else if (username.length > 20) {
        isValid = false;
        errorMessage += 'Username must be no more than 20 characters long.\n';
      } else if (!/^[a-zA-Z0-9_]+$/.test(username)) {
        isValid = false;
        errorMessage += 'Username can only contain letters, numbers, and underscores.\n';
      }
      
      // Password validation - at least 8 characters
      if (password.length < 8) {
        isValid = false;
        errorMessage += 'Password must be at least 8 characters long.\n';
      }
      
      // Email validation
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        isValid = false;
        errorMessage += 'Please enter a valid email address.\n';
      }
      
      // Contact number validation - 10 to 15 digits only
      const contactRegex = /^[0-9]{10,15}$/;
      if (!contactRegex.test(contact)) {
        isValid = false;
        errorMessage += 'Contact number must be 10-15 digits only.\n';
      }
      
      if (isValid) {
        // If all validations pass, submit the form
        registerForm.submit();
      } else {
        // Show error messages
        alert('Please fix the following errors:\n\n' + errorMessage);
      }
    });
  }

  // Initialize simple animations
  initScrollAnimations();
  initStatCounters();
  initServicesSlider();
});

// Simple scroll-triggered animations
function initScrollAnimations() {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const delay = entry.target.dataset.delay || 0;
        setTimeout(() => {
          entry.target.classList.add('visible');
        }, delay);
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe all fade-in elements
  document.querySelectorAll('.fade-in-up').forEach(el => {
    observer.observe(el);
  });
}

// Simple stat counters
function initStatCounters() {
  const statItems = document.querySelectorAll('.stat-item');
  let countersStarted = false;

  const startCounters = () => {
    if (countersStarted) return;
    countersStarted = true;

    statItems.forEach(item => {
      const target = parseInt(item.dataset.stat);
      const counter = item.querySelector('.stat-number');
      const duration = 2000; // 2 seconds
      const increment = target / (duration / 16); // 60fps
      let current = 0;

      const updateCounter = () => {
        current += increment;
        if (current < target) {
          counter.textContent = Math.floor(current);
          requestAnimationFrame(updateCounter);
        } else {
          counter.textContent = target;
        }
      };

      updateCounter();
    });
  };

  // Observer for stats section
  const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        startCounters();
        statsObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  const statsContainer = document.querySelector('.stats-container');
  if (statsContainer) {
    statsObserver.observe(statsContainer);
  }
}

// Services slider functionality
function initServicesSlider() {
  const sliderContent = document.getElementById('slider-content');
  const sliderDescription = document.getElementById('slider-description');
  const prevBtn = document.getElementById('prev-service');
  const nextBtn = document.getElementById('next-service');
  const indicators = document.querySelectorAll('.slide-indicator');
  const stat1 = document.getElementById('slider-stat1');
  const stat2 = document.getElementById('slider-stat2');
  
  if (!sliderContent || !prevBtn || !nextBtn) return;

  const services = [
    {
      title: 'SEO Optimization',
      subtitle: 'Boost Your Rankings',
      description: 'Drive organic traffic with data-driven SEO strategies that get your website noticed by search engines and customers alike.',
      stat1: '500+',
      stat2: '95%',
      icon: '🔍'
    },
    {
      title: 'Social Media Marketing',
      subtitle: 'Engage Your Audience',
      description: 'Build meaningful connections with your customers through strategic social media campaigns across all major platforms.',
      stat1: '2M+',
      stat2: '87%',
      icon: '📱'
    },
    {
      title: 'Paid Advertising',
      subtitle: 'Maximize Your ROI',
      description: 'Generate immediate results with targeted ad campaigns that convert prospects into paying customers efficiently.',
      stat1: '300%',
      stat2: '92%',
      icon: '💰'
    },
    {
      title: 'Content Marketing',
      subtitle: 'Tell Your Story',
      description: 'Create compelling content that resonates with your audience and establishes your brand as an industry authority.',
      stat1: '1K+',
      stat2: '89%',
      icon: '📝'
    },
    {
      title: 'Web Design',
      subtitle: 'Create Stunning Websites',
      description: 'Design beautiful, responsive websites that not only look amazing but also convert visitors into customers.',
      stat1: '250+',
      stat2: '98%',
      icon: '🎨'
    },
    {
      title: 'Email Marketing',
      subtitle: 'Connect Directly',
      description: 'Nurture relationships and drive sales with personalized email campaigns that deliver results to your inbox.',
      stat1: '50K+',
      stat2: '85%',
      icon: '📧'
    },
    {
      title: 'Analytics & Reporting',
      subtitle: 'Track Your Success',
      description: 'Make informed decisions with comprehensive analytics and detailed reports that show your marketing performance.',
      stat1: '100+',
      stat2: '99%',
      icon: '📊'
    },
    {
      title: 'Brand Strategy',
      subtitle: 'Build Your Identity',
      description: 'Develop a strong brand identity that differentiates you from competitors and connects with your target audience.',
      stat1: '150+',
      stat2: '94%',
      icon: '🚀'
    }
  ];

  let currentServiceIndex = 0;
  let autoChangeInterval;

  function updateIndicators() {
    indicators.forEach((indicator, index) => {
      if (index === currentServiceIndex) {
        indicator.style.background = '#58a6ff';
        indicator.style.transform = 'scale(1.2)';
      } else {
        indicator.style.background = 'rgba(88, 166, 255, 0.3)';
        indicator.style.transform = 'scale(1)';
      }
    });
  }

  function showService(index) {
    const service = services[index];
    const storyIcon = document.querySelector('.story-icon');
    
    // Update content with fade effect
    sliderContent.style.opacity = '0';
    sliderDescription.style.opacity = '0';
    
    setTimeout(() => {
      sliderContent.innerHTML = `${service.title}<br><span style="font-size: 1.2rem; color: #00d4aa;">${service.subtitle}</span>`;
      sliderDescription.textContent = service.description;
      stat1.textContent = service.stat1;
      stat2.textContent = service.stat2;
      if (storyIcon) storyIcon.textContent = service.icon;
      
      sliderContent.style.opacity = '1';
      sliderDescription.style.opacity = '1';
    }, 200);
    
    updateIndicators();
  }

  function changeService(direction) {
    currentServiceIndex += direction;
    if (currentServiceIndex < 0) currentServiceIndex = services.length - 1;
    if (currentServiceIndex >= services.length) currentServiceIndex = 0;
    showService(currentServiceIndex);
  }

  function resetAutoChange() {
    clearInterval(autoChangeInterval);
    autoChangeInterval = setInterval(() => changeService(1), 2000);
  }

  // Initialize
  showService(currentServiceIndex);
  autoChangeInterval = setInterval(() => changeService(1), 2000);

  // Event listeners
  prevBtn.addEventListener('click', () => {
    changeService(-1);
    resetAutoChange();
  });

  nextBtn.addEventListener('click', () => {
    changeService(1);
    resetAutoChange();
  });

  // Indicator click events
  indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
      currentServiceIndex = index;
      showService(currentServiceIndex);
      resetAutoChange();
    });
  });

  // Add CSS transitions
  sliderContent.style.transition = 'opacity 0.3s ease';
  sliderDescription.style.transition = 'opacity 0.3s ease';
}
