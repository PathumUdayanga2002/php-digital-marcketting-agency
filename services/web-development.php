<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Design & Development - Boostify Digital</title>
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
                <img src="../images/icons/webdev.svg" alt="Web Development Icon" class="service-icon-large" />
                <h1>Website Design & Development</h1>
                <p class="service-subtitle">Stunning, responsive websites that generate leads.</p>
            </div>

            <div class="service-content">
                <div class="service-description">
                    <h2>Professional Websites That Convert</h2>
                    <p>Our web design and development services create beautiful, functional websites that not only look great but also drive results. We build responsive, fast-loading websites optimized for conversions and user experience.</p>
                    
                    <h3>What We Offer:</h3>
                    <ul class="service-features">
                        <li>Custom Website Design</li>
                        <li>Responsive Development</li>
                        <li>E-commerce Solutions</li>
                        <li>Content Management Systems</li>
                        <li>Website Optimization</li>
                        <li>Website Maintenance & Support</li>
                        <li>Landing Page Development</li>
                    </ul>

                    <h3>Technologies We Use:</h3>
                    <p>HTML5, CSS3, JavaScript, PHP, WordPress, React, and more. We choose the right technology stack based on your specific needs and goals.</p>
                </div>

                <div class="service-sidebar">
                    <div class="service-cta">
                        <h3>Ready for a New Website?</h3>
                        <p>Let's create a website that drives results for your business!</p>
                        <?php if (isset($_SESSION["username"])): ?>
                            <a href="../index.php#signup" class="btn-primary">Get Started</a>
                        <?php else: ?>
                            <a href="../login.php" class="btn-primary">Login to Get Started</a>
                        <?php endif; ?>
                    </div>

                    <div class="service-stats">
                        <h4>Web Development Results</h4>
                        <div class="stat">
                            <span class="stat-number">200+</span>
                            <span class="stat-label">Websites Built</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">99%</span>
                            <span class="stat-label">Uptime Guarantee</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">3s</span>
                            <span class="stat-label">Average Load Time</span>
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
