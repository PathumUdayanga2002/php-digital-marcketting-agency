<?php
session_start();

// Handle logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Boostify Digital - Digital Marketing Agency</title>
  <link rel="stylesheet" href="css/styles.css" />
  <script defer src="js/scripts.js"></script>
  <script>
    // Pass PHP session data to JavaScript
    window.isLoggedIn = <?php echo isset($_SESSION["username"]) ? 'true' : 'false'; ?>;
  </script>
</head>
<body class="index-page">
  <header>
    <nav class="navbar">
      <div class="logo">
        <img src="images/logo.svg" alt="Boostify Digital Logo" />
        <span>Boostify Digital</span>
      </div>
      <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#blog">Blog</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <div class="auth-buttons">
        <?php if (isset($_SESSION["username"])): ?>
          <span class="welcome-text">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</span>
          <a href="index.php?logout=1" class="btn-secondary">Logout</a>
        <?php else: ?>
          <a href="login.php" class="btn-secondary">Login</a>
          <a href="register.php" class="btn-primary">Sign Up</a>
        <?php endif; ?>
      </div>
    </nav>

    <div class="flex-bar">
      <div>SEO Optimization</div>
      <div>Social Media Marketing</div>
      <div>Pay-Per-Click</div>
      <div>Content Creation</div>
      <div>Email Marketing</div>
      <div>Web Development</div>
    </div>
  </header>

  <main>
    <!-- Hero Section -->
    <section id="home" class="hero-section">
      <div class="hero-text">
        <h1>Grow Your Business with Boostify</h1>
        <p>ROI-Focused SEO, Social Media, Paid Ads & More</p>
        <a href="#signup" class="btn-primary btn-large">Get Your Free Audit</a>
      </div>
      <div class="hero-image">
        <img src="images/hero-bg.jpg" alt="Digital marketing illustration" />
      </div>
    </section>

    <!-- Services Slider Section -->
    <section class="section fade-in-up">
      <div class="about-header">
        <h2 class="section-title">What We Offer</h2>
        <p class="section-subtitle">Discover our comprehensive digital solutions</p>
      </div>
      
      <div class="story-block" id="services-slider" style="max-width: 800px; margin: 0 auto; padding: 3rem; min-height: 250px; position: relative;">
        <div class="story-icon">🚀</div>
        <div id="slider-content" style="font-size: 1.8rem; font-weight: 600; color: #58a6ff; margin-bottom: 1.5rem; min-height: 80px; display: flex; align-items: center; justify-content: center;">Loading...</div>
        <div id="slider-description" style="color: #cbd7ff; font-size: 1.1rem; line-height: 1.6; margin-bottom: 2rem; min-height: 60px;">Comprehensive solutions tailored to your business needs</div>
        
        <div class="stats-container" style="grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem; padding: 1.5rem;">
          <div class="stat-item">
            <span class="stat-number" id="slider-stat1">500+</span>
            <span class="stat-label">Projects</span>
          </div>
          <div class="stat-item">
            <span class="stat-number" id="slider-stat2">99%</span>
            <span class="stat-label">Success Rate</span>
          </div>
        </div>
        
        <div style="display: flex; justify-content: center; align-items: center; gap: 3rem;">
          <button class="btn-secondary" id="prev-service" style="width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold;">&#8592;</button>
          
          <div style="display: flex; gap: 0.5rem;">
            <div class="slide-indicator" data-slide="0" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(88, 166, 255, 0.3); cursor: pointer; transition: all 0.3s ease;"></div>
            <div class="slide-indicator" data-slide="1" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(88, 166, 255, 0.3); cursor: pointer; transition: all 0.3s ease;"></div>
            <div class="slide-indicator" data-slide="2" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(88, 166, 255, 0.3); cursor: pointer; transition: all 0.3s ease;"></div>
            <div class="slide-indicator" data-slide="3" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(88, 166, 255, 0.3); cursor: pointer; transition: all 0.3s ease;"></div>
            <div class="slide-indicator" data-slide="4" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(88, 166, 255, 0.3); cursor: pointer; transition: all 0.3s ease;"></div>
            <div class="slide-indicator" data-slide="5" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(88, 166, 255, 0.3); cursor: pointer; transition: all 0.3s ease;"></div>
            <div class="slide-indicator" data-slide="6" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(88, 166, 255, 0.3); cursor: pointer; transition: all 0.3s ease;"></div>
            <div class="slide-indicator" data-slide="7" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(88, 166, 255, 0.3); cursor: pointer; transition: all 0.3s ease;"></div>
          </div>
          
          <button class="btn-secondary" id="next-service" style="width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold;">&#8594;</button>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section services-section">
      
      <h2>Our Services</h2>
      <div class="services-container">
        <div class="service-card">
          <img src="images/icons/seo.svg" alt="SEO Icon" />
          <h3><a href="services/seo.php" style="color: inherit; text-decoration: none;">SEO Optimization</a></h3>
          <p>Get discovered with top-ranking strategies tailored to your niche.</p>
          <a href="services/seo.php" class="btn-secondary" style="margin-top: 1rem; display: inline-block;">Learn More</a>
        </div>
        <div class="service-card">
          <img src="images/icons/social.svg" alt="Social Media Icon" />
          <h3><a href="services/social-media.php" style="color: inherit; text-decoration: none;">Social Media Marketing</a></h3>
          <p>Build your brand across platforms like Instagram, Facebook & LinkedIn.</p>
          <a href="services/social-media.php" class="btn-secondary" style="margin-top: 1rem; display: inline-block;">Learn More</a>
        </div>
        <div class="service-card">
          <img src="images/icons/ppc.svg" alt="PPC Icon" />
          <h3><a href="services/ppc.php" style="color: inherit; text-decoration: none;">Pay-Per-Click Advertising</a></h3>
          <p>Drive instant traffic with cost-effective Google & Meta Ads.</p>
          <a href="services/ppc.php" class="btn-secondary" style="margin-top: 1rem; display: inline-block;">Learn More</a>
        </div>
        <div class="service-card">
          <img src="images/icons/content.svg" alt="Content Icon" />
          <h3><a href="services/content-creation.php" style="color: inherit; text-decoration: none;">Content Creation</a></h3>
          <p>Eye-catching graphics, blogs, and videos designed to convert.</p>
          <a href="services/content-creation.php" class="btn-secondary" style="margin-top: 1rem; display: inline-block;">Learn More</a>
        </div>
        <div class="service-card">
          <img src="images/icons/email.svg" alt="Email Marketing Icon" />
          <h3><a href="services/email-marketing.php" style="color: inherit; text-decoration: none;">Email Marketing</a></h3>
          <p>Nurture leads with personalized campaigns that boost engagement.</p>
          <a href="services/email-marketing.php" class="btn-secondary" style="margin-top: 1rem; display: inline-block;">Learn More</a>
        </div>
        <div class="service-card">
          <img src="images/icons/webdev.svg" alt="Web Development Icon" />
          <h3><a href="services/web-development.php" style="color: inherit; text-decoration: none;">Website Design & Development</a></h3>
          <p>Stunning, responsive websites that generate leads.</p>
          <a href="services/web-development.php" class="btn-secondary" style="margin-top: 1rem; display: inline-block;">Learn More</a>
        </div>
      </div>
    </section>

    <!-- About Us -->
    <section id="about" class="section about-section">
      <div class="about-header">
        <h2 class="section-title animated-title">About Boostify Digital</h2>
        <div class="section-subtitle">Your Digital Growth Partners Since 2020</div>
      </div>
      
      <div class="about-content">
        <div class="about-story">
          <div class="story-block fade-in-up" data-delay="0">
            <div class="story-icon">🚀</div>
            <h3>Our Story</h3>
            <p>Boostify Digital is a full-service digital marketing agency dedicated to helping small and medium-sized businesses achieve sustainable online growth. Founded with a passion for innovation and results-driven strategies.</p>
          </div>
          
          <div class="story-block fade-in-up" data-delay="200">
            <div class="story-icon">🎯</div>
            <h3>Our Mission</h3>
            <p>Our mission is to provide honest, data-backed digital strategies that drive measurable results. We believe in transparency, creativity, and building long-term partnerships with our clients.</p>
          </div>
          
          <div class="story-block fade-in-up" data-delay="400">
            <div class="story-icon">🌟</div>
            <h3>Our Vision</h3>
            <p>We envision becoming the most trusted digital partner for businesses worldwide, helping them navigate the digital landscape and achieve unprecedented growth.</p>
          </div>
        </div>

        <!-- Stats Section -->
        <div class="stats-container fade-in-up" data-delay="600">
          <div class="stat-item" data-stat="150">
            <div class="stat-number">0</div>
            <div class="stat-label">Happy Clients</div>
          </div>
          <div class="stat-item" data-stat="500">
            <div class="stat-number">0</div>
            <div class="stat-label">Projects Completed</div>
          </div>
          <div class="stat-item" data-stat="95">
            <div class="stat-number">0</div>
            <div class="stat-label">Success Rate %</div>
          </div>
          <div class="stat-item" data-stat="5">
            <div class="stat-number">0</div>
            <div class="stat-label">Years Experience</div>
          </div>
        </div>

        <!-- Team Section -->
        <div class="team-section fade-in-up" data-delay="800">
          <h3 class="team-title">Meet Our Expert Team</h3>
          <p class="team-description">Our diverse team of digital marketing experts brings years of experience and passion to every project.</p>
          
          <div class="team-container">
            <div class="team-member" data-member="john">
              <div class="team-member-card">
                <div class="member-image-container">
                  <img src="images/team/john.jpg" alt="John Doe" />
                  <div class="member-overlay">
                    <div class="member-social">
                      <a href="#" aria-label="LinkedIn"><span>💼</span></a>
                      <a href="#" aria-label="Twitter"><span>🐦</span></a>
                    </div>
                  </div>
                </div>
                <div class="member-info">
                  <h4>John Doe</h4>
                  <p class="member-role">Founder & CEO</p>
                  <p class="member-bio">Serial entrepreneur with 10+ years in digital marketing. Passionate about helping businesses grow online.</p>
                  <div class="member-skills">
                    <span class="skill-tag">Strategy</span>
                    <span class="skill-tag">Leadership</span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="team-member" data-member="lisa">
              <div class="team-member-card">
                <div class="member-image-container">
                  <img src="images/team/lisa.svg" alt="Lisa Wong" />
                  <div class="member-overlay">
                    <div class="member-social">
                      <a href="#" aria-label="LinkedIn"><span>💼</span></a>
                      <a href="#" aria-label="Twitter"><span>🐦</span></a>
                    </div>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Lisa Wong</h4>
                  <p class="member-role">Head of Strategy</p>
                  <p class="member-bio">Data-driven strategist who loves turning analytics into actionable growth plans for our clients.</p>
                  <div class="member-skills">
                    <span class="skill-tag">Analytics</span>
                    <span class="skill-tag">Strategy</span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="team-member" data-member="ahmed">
              <div class="team-member-card">
                <div class="member-image-container">
                  <img src="images/team/ahmed.svg" alt="Ahmed Khan" />
                  <div class="member-overlay">
                    <div class="member-social">
                      <a href="#" aria-label="LinkedIn"><span>💼</span></a>
                      <a href="#" aria-label="Twitter"><span>🐦</span></a>
                    </div>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Ahmed Khan</h4>
                  <p class="member-role">Lead SEO Specialist</p>
                  <p class="member-bio">SEO wizard who has helped 100+ websites reach the top of Google search results.</p>
                  <div class="member-skills">
                    <span class="skill-tag">SEO</span>
                    <span class="skill-tag">Technical</span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="team-member" data-member="priya">
              <div class="team-member-card">
                <div class="member-image-container">
                  <img src="images/team/priya.svg" alt="Priya Sen" />
                  <div class="member-overlay">
                    <div class="member-social">
                      <a href="#" aria-label="LinkedIn"><span>💼</span></a>
                      <a href="#" aria-label="Twitter"><span>🐦</span></a>
                    </div>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Priya Sen</h4>
                  <p class="member-role">Social Media Manager</p>
                  <p class="member-bio">Creative storyteller who builds engaging communities and viral campaigns across all platforms.</p>
                  <div class="member-skills">
                    <span class="skill-tag">Social Media</span>
                    <span class="skill-tag">Content</span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="team-member" data-member="daniel">
              <div class="team-member-card">
                <div class="member-image-container">
                  <img src="images/team/daniel.svg" alt="Daniel Perera" />
                  <div class="member-overlay">
                    <div class="member-social">
                      <a href="#" aria-label="LinkedIn"><span>💼</span></a>
                      <a href="#" aria-label="Twitter"><span>🐦</span></a>
                    </div>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Daniel Perera</h4>
                  <p class="member-role">Head of Development</p>
                  <p class="member-bio">Full-stack developer who creates beautiful, fast, and conversion-optimized websites and apps.</p>
                  <div class="member-skills">
                    <span class="skill-tag">Development</span>
                    <span class="skill-tag">UX/UI</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="section blog-section">
      <h2>From Our Blog</h2>
      <article class="blog-post">
        <h3>Top 5 SEO Trends for 2025 You Shouldn’t Ignore</h3>
        <div class="post-meta">By Lisa Wong | June 10, 2025 | SEO, Marketing Trends</div>
        <p>AI, voice search, and E-E-A-T are taking SEO to the next level. Learn how to stay ahead and rank higher this year.</p>
        <a href="#" class="btn-secondary">Read More</a>
      </article>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section contact-section">
      <h2>Contact Us</h2>
      
      <div class="contact-container">
        <!-- Left Side: Contact Form -->
        <div class="contact-form-container">
          <?php if (!isset($_SESSION["username"])): ?>
            <div style="background: rgba(255, 107, 107, 0.1); border: 1px solid #ff6b6b; border-radius: 5px; padding: 2rem; margin-bottom: 1rem; text-align: center;">
              <h3 style="color: #ff6b6b; margin-bottom: 1rem;">Please Login to Send Us a Message</h3>
              <p style="color: #ff6b6b; margin-bottom: 1rem;">
                You must be logged in to contact us. Please <a href="login.php" style="color: #58a6ff; text-decoration: underline;">login</a> or <a href="register.php" style="color: #58a6ff; text-decoration: underline;">register</a> to get in touch.
              </p>
            </div>
          <?php endif; ?>
          
          <form id="contact-form" <?php if (!isset($_SESSION["username"])): ?>style="opacity: 0.5; pointer-events: none;"<?php endif; ?>>
            <h3>Send us a Message</h3>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Damintha Wijekoon" required <?php if (!isset($_SESSION["username"])): ?>disabled<?php endif; ?> />

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Damintha@example.com" required <?php if (!isset($_SESSION["username"])): ?>disabled<?php endif; ?> />

            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="Interested in SEO Services" required <?php if (!isset($_SESSION["username"])): ?>disabled<?php endif; ?> />

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="I'd like to schedule a call to discuss SEO needs." required <?php if (!isset($_SESSION["username"])): ?>disabled<?php endif; ?>></textarea>

            <button type="submit" class="btn-primary" <?php if (!isset($_SESSION["username"])): ?>disabled<?php endif; ?>>
              <?php if (isset($_SESSION["username"])): ?>
                Send Message
              <?php else: ?>
                Please Login to Send Message
              <?php endif; ?>
            </button>
          </form>
        </div>

        <!-- Right Side: Business Info and Map -->
        <div class="contact-info-container">
          <div class="business-info">
            <h3>Get in Touch</h3>
            <div class="contact-details">
              <div class="contact-item">
                <span class="contact-icon">📍</span>
                <div>
                  <strong>Address:</strong><br>
                  No. 123 Dalugama road<br>
                  Kelaniya, Sri Lanka
                </div>
              </div>
              
              <div class="contact-item">
                <span class="contact-icon">📞</span>
                <div>
                  <strong>Phone:</strong><br>
                  <a href="tel:+94771234567">+94 77 123 4567</a>
                </div>
              </div>
              
              <div class="contact-item">
                <span class="contact-icon">✉️</span>
                <div>
                  <strong>Email:</strong><br>
                  <a href="mailto:hello@boostifydigital.com">hello@boostifydigital.com</a>
                </div>
              </div>
              
              <div class="contact-item">
                <span class="contact-icon">🕒</span>
                <div>
                  <strong>Business Hours:</strong><br>
                  Mon - Fri: 9:00 AM - 6:00 PM<br>
                  Sat: 10:00 AM - 4:00 PM
                </div>
              </div>
            </div>
          </div>
          
          <div class="map-placeholder">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2871936739475!2d79.9155534!3d6.9754032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2597c8dde7e47%3A0x341e7e820c46d3ed!2sUniversity%20of%20Kelaniya!5e0!3m2!1sen!2slk!4v1751356310214!5m2!1sen!2slk" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade"
              title="Boostify Digital Office Location"
              aria-label="Google Maps showing Boostify Digital office location">
            </iframe>
          </div>
        </div>
      </div>
    </section>

    <!-- Signup Section -->
    <section id="signup" class="section signup-section">
      <h2>Get Your Free Consultation</h2>
      
      <?php if (!isset($_SESSION["username"])): ?>
        <div style="background: rgba(255, 107, 107, 0.1); border: 1px solid #ff6b6b; border-radius: 5px; padding: 2rem; margin-bottom: 1rem; text-align: center;">
          <h3 style="color: #ff6b6b; margin-bottom: 1rem;">Please Login to Get Your Free Consultation</h3>
          <p style="color: #ff6b6b; margin-bottom: 1rem;">
            You must be logged in to request a consultation. Please <a href="login.php" style="color: #58a6ff; text-decoration: underline;">login</a> or <a href="register.php" style="color: #58a6ff; text-decoration: underline;">register</a> to get started.
          </p>
        </div>
      <?php endif; ?>
      
      <form id="signup-form" <?php if (!isset($_SESSION["username"])): ?>style="opacity: 0.5; pointer-events: none;"<?php endif; ?>>
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" placeholder="Pathum Udayanga" required <?php if (!isset($_SESSION["username"])): ?>disabled<?php endif; ?> />

        <label for="email-signup">Email Address</label>
        <input type="email" id="email-signup" name="email-signup" placeholder="pathum@example.com" required <?php if (!isset($_SESSION["username"])): ?>disabled<?php endif; ?> />

        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="+94 77 555 8899" <?php if (!isset($_SESSION["username"])): ?>disabled<?php endif; ?> />

        <label for="company">Company Name</label>
        <input type="text" id="company" name="company" placeholder="CreativePulse" <?php if (!isset($_SESSION["username"])): ?>disabled<?php endif; ?> />

        <label for="services">Services Interested In</label>
        <select id="services" name="services" multiple <?php if (!isset($_SESSION["username"])): ?>disabled<?php endif; ?>>
          <option value="seo">SEO</option>
          <option value="smm">Social Media Marketing</option>
          <option value="ppc">Pay-Per-Click</option>
          <option value="email">Email Marketing</option>
        </select>

        <button type="submit" class="btn-primary" <?php if (!isset($_SESSION["username"])): ?>disabled<?php endif; ?>>
          <?php if (isset($_SESSION["username"])): ?>
            Get Free Consultation
          <?php else: ?>
            Please Login to Get Consultation
          <?php endif; ?>
        </button>
      </form>
      <div id="signup-message" class="signup-message"></div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Boostify Digital. All rights reserved.</p>
    <div class="social-links">
      <a href="#" aria-label="Facebook"><img src="images/icons/facebook.svg" alt="Facebook" /></a>
      <a href="#" aria-label="Instagram"><img src="images/icons/instagram.svg" alt="Instagram" /></a>
      <a href="#" aria-label="LinkedIn"><img src="images/icons/linkedin.svg" alt="LinkedIn" /></a>
      <a href="#" aria-label="YouTube"><img src="images/icons/youtube.svg" alt="YouTube" /></a>
    </div>
  </footer>
</body>
</html>
