<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEO Optimization - Boostify Digital</title>
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
                <img src="../images/icons/seo.svg" alt="SEO Icon" class="service-icon-large" />
                <h1>SEO Optimization</h1>
                <p class="service-subtitle">Get discovered with top-ranking strategies tailored to your niche.</p>
            </div>

            <div class="service-content">
                <div class="service-description">
                    <h2>Drive Organic Traffic with Expert SEO</h2>
                    <p>Our comprehensive SEO optimization services help your business rank higher on search engines, driving more qualified traffic to your website. We use proven strategies and the latest SEO techniques to improve your online visibility.</p>
                    
                    <h3>What We Offer:</h3>
                    <ul class="service-features">
                        <li>Comprehensive SEO Audit</li>
                        <li>Keyword Research & Strategy</li>
                        <li>On-Page Optimization</li>
                        <li>Technical SEO</li>
                        <li>Link Building</li>
                        <li>Local SEO</li>
                        <li>SEO Reporting & Analytics</li>
                    </ul>

                    <h3>Why Choose Our SEO Services?</h3>
                    <p>With years of experience and a proven track record, we help businesses of all sizes achieve their online goals. Our data-driven approach ensures measurable results and long-term success.</p>
                </div>

                <div class="service-sidebar">
                    <div class="service-cta">
                        <h3>Ready to Boost Your Rankings?</h3>
                        <p>Get a free SEO audit and consultation today!</p>
                        <?php if (isset($_SESSION["username"])): ?>
                            <a href="../index.php#signup" class="btn-primary">Get Free Audit</a>
                        <?php else: ?>
                            <a href="../login.php" class="btn-primary">Login to Get Started</a>
                        <?php endif; ?>
                    </div>

                    <div class="service-stats">
                        <h4>SEO Results</h4>
                        <div class="stat">
                            <span class="stat-number">150%</span>
                            <span class="stat-label">Average Traffic Increase</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">90%</span>
                            <span class="stat-label">Client Retention Rate</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Keywords Ranked</span>
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
