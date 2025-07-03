<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Marketing - Boostify Digital</title>
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
                <img src="../images/icons/social.svg" alt="Social Media Icon" class="service-icon-large" />
                <h1>Social Media Marketing</h1>
                <p class="service-subtitle">Build your brand across platforms like Instagram, Facebook & LinkedIn.</p>
            </div>

            <div class="service-content">
                <div class="service-description">
                    <h2>Grow Your Brand on Social Media</h2>
                    <p>Our social media marketing services help you connect with your audience, build brand awareness, and drive engagement across all major social platforms. We create compelling content and strategic campaigns that convert followers into customers.</p>
                    
                    <h3>What We Offer:</h3>
                    <ul class="service-features">
                        <li>Social Media Strategy Development</li>
                        <li>Content Creation & Curation</li>
                        <li>Community Management</li>
                        <li>Social Media Advertising</li>
                        <li>Influencer Marketing</li>
                        <li>Social Media Analytics</li>
                        <li>Brand Reputation Management</li>
                    </ul>

                    <h3>Platforms We Cover:</h3>
                    <p>Facebook, Instagram, LinkedIn, Twitter, TikTok, YouTube, and more. We tailor our approach to each platform's unique audience and best practices.</p>
                </div>

                <div class="service-sidebar">
                    <div class="service-cta">
                        <h3>Ready to Go Social?</h3>
                        <p>Let's create a social media strategy that drives results!</p>
                        <?php if (isset($_SESSION["username"])): ?>
                            <a href="../index.php#signup" class="btn-primary">Get Started</a>
                        <?php else: ?>
                            <a href="../login.php" class="btn-primary">Login to Get Started</a>
                        <?php endif; ?>
                    </div>

                    <div class="service-stats">
                        <h4>Social Media Results</h4>
                        <div class="stat">
                            <span class="stat-number">300%</span>
                            <span class="stat-label">Average Engagement Increase</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">50K+</span>
                            <span class="stat-label">Followers Generated</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">25+</span>
                            <span class="stat-label">Platforms Managed</span>
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
