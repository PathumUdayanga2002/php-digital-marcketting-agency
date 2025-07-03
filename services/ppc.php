<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay-Per-Click Advertising - Boostify Digital</title>
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
                <img src="../images/icons/ppc.svg" alt="PPC Icon" class="service-icon-large" />
                <h1>Pay-Per-Click Advertising</h1>
                <p class="service-subtitle">Drive instant traffic with cost-effective Google & Meta Ads.</p>
            </div>

            <div class="service-content">
                <div class="service-description">
                    <h2>Get Immediate Results with PPC</h2>
                    <p>Our pay-per-click advertising services deliver immediate, targeted traffic to your website. We create and manage high-converting ad campaigns that maximize your ROI and drive qualified leads to your business.</p>
                    
                    <h3>What We Offer:</h3>
                    <ul class="service-features">
                        <li>Google Ads Campaign Management</li>
                        <li>Facebook & Instagram Ads</li>
                        <li>Keyword Research & Bidding Strategy</li>
                        <li>Ad Copy Creation & Testing</li>
                        <li>Landing Page Optimization</li>
                        <li>Conversion Tracking & Analytics</li>
                        <li>Remarketing Campaigns</li>
                    </ul>

                    <h3>Why Choose Our PPC Services?</h3>
                    <p>We focus on driving quality traffic that converts. Our certified PPC specialists continuously optimize your campaigns to ensure maximum return on ad spend (ROAS).</p>
                </div>

                <div class="service-sidebar">
                    <div class="service-cta">
                        <h3>Ready to Scale Your Business?</h3>
                        <p>Start generating leads with targeted PPC campaigns!</p>
                        <?php if (isset($_SESSION["username"])): ?>
                            <a href="../index.php#signup" class="btn-primary">Get Free Consultation</a>
                        <?php else: ?>
                            <a href="../login.php" class="btn-primary">Login to Get Started</a>
                        <?php endif; ?>
                    </div>

                    <div class="service-stats">
                        <h4>PPC Results</h4>
                        <div class="stat">
                            <span class="stat-number">400%</span>
                            <span class="stat-label">Average ROAS</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">$2M+</span>
                            <span class="stat-label">Ad Spend Managed</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">85%</span>
                            <span class="stat-label">Cost Reduction</span>
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
