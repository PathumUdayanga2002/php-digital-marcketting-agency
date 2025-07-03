<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Creation - Boostify Digital</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../images/logo.svg" alt="Boostify Digital Logo" />
                <span>Boostify Digital</span>
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../index.php#services">Services</a></li>
                <li><a href="../index.php#about">About</a></li>
                <li><a href="../index.php#blog">Blog</a></li>
                <li><a href="../index.php#contact">Contact</a></li>
            </ul>
            <div class="auth-buttons">
                <?php if (isset($_SESSION["username"])): ?>
                    <span class="welcome-text">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</span>
                    <a href="../index.php?logout=1" class="btn-secondary">Logout</a>
                <?php else: ?>
                    <a href="../login.php" class="btn-secondary">Login</a>
                    <a href="../register.php" class="btn-primary">Sign Up</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <main>
        <section class="section service-detail">
            <div class="service-hero">
                <img src="../images/icons/content.svg" alt="Content Icon" class="service-icon-large" />
                <h1>Content Creation</h1>
                <p class="service-subtitle">Eye-catching graphics, blogs, and videos designed to convert.</p>
            </div>

            <div class="service-content">
                <div class="service-description">
                    <h2>Compelling Content That Converts</h2>
                    <p>Our content creation services help you tell your brand story through engaging visuals, compelling copy, and strategic messaging. We create content that not only looks great but drives action and conversions.</p>
                    
                    <h3>What We Offer:</h3>
                    <ul class="service-features">
                        <li>Blog Writing & SEO Content</li>
                        <li>Graphic Design & Branding</li>
                        <li>Video Production & Editing</li>
                        <li>Social Media Content</li>
                        <li>Website Copy & Landing Pages</li>
                        <li>Email Marketing Content</li>
                        <li>Content Strategy & Planning</li>
                        <li>Infographic Design</li>
                        <li>Content Optimization</li>
                    </ul>

                    <h3>Our Creative Process:</h3>
                    <p>We start by understanding your brand, audience, and goals. Then we create content that resonates with your target market and drives the results you need.</p>
                    
                    <h3>Content Types We Excel At:</h3>
                    <p>From compelling blog posts that rank on Google to eye-catching social media graphics that drive engagement, we create diverse content formats including:</p>
                    <ul class="service-features">
                        <li>SEO-optimized blog articles and web copy</li>
                        <li>Professional product photography</li>
                        <li>Animated videos and motion graphics</li>
                        <li>Interactive presentations and case studies</li>
                    </ul>
                </div>

                <div class="service-sidebar">
                    <div class="service-cta">
                        <h3>Ready to Create Amazing Content?</h3>
                        <p>Let's bring your brand story to life!</p>
                        <?php if (isset($_SESSION["username"])): ?>
                            <a href="../index.php#signup" class="btn-primary">Get Started</a>
                        <?php else: ?>
                            <a href="../login.php" class="btn-primary">Login to Get Started</a>
                        <?php endif; ?>
                    </div>

                    <div class="service-stats">
                        <h4>Content Results</h4>
                        <div class="stat">
                            <span class="stat-number">1000+</span>
                            <span class="stat-label">Content Pieces Created</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">250%</span>
                            <span class="stat-label">Average Engagement Boost</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Brands Served</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Boostify Digital. All rights reserved.</p>
        <div class="social-links">
            <a href="#" aria-label="Facebook"><img src="../images/icons/facebook.svg" alt="Facebook" /></a>
            <a href="#" aria-label="Instagram"><img src="../images/icons/instagram.svg" alt="Instagram" /></a>
            <a href="#" aria-label="LinkedIn"><img src="../images/icons/linkedin.svg" alt="LinkedIn" /></a>
            <a href="#" aria-label="YouTube"><img src="../images/icons/youtube.svg" alt="YouTube" /></a>
        </div>
    </footer>
</body>
</html>
