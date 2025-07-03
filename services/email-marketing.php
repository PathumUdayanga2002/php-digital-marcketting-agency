<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Marketing - Boostify Digital</title>
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
                <img src="../images/icons/email.svg" alt="Email Marketing Icon" class="service-icon-large" />
                <h1>Email Marketing</h1>
                <p class="service-subtitle">Nurture leads with personalized campaigns that boost engagement.</p>
            </div>

            <div class="service-content">
                <div class="service-description">
                    <h2>Build Relationships Through Email</h2>
                    <p>Our email marketing services help you stay connected with your audience, nurture leads, and drive conversions. We create personalized email campaigns that deliver the right message to the right person at the right time.</p>
                    
                    <h3>What We Offer:</h3>
                    <ul class="service-features">
                        <li>Email Strategy & Planning</li>
                        <li>List Building & Segmentation</li>
                        <li>Email Design & Templates</li>
                        <li>Automation & Drip Campaigns</li>
                        <li>Newsletter Management</li>
                        <li>A/B Testing & Optimization</li>
                        <li>Performance Analytics & Reporting</li>
                    </ul>

                    <h3>Types of Email Campaigns:</h3>
                    <p>Welcome series, promotional campaigns, newsletters, abandoned cart recovery, re-engagement campaigns, and more. We tailor each campaign to your specific business goals.</p>
                </div>

                <div class="service-sidebar">
                    <div class="service-cta">
                        <h3>Ready to Connect with Your Audience?</h3>
                        <p>Start building relationships through email marketing!</p>
                        <?php if (isset($_SESSION["username"])): ?>
                            <a href="../index.php#signup" class="btn-primary">Get Started</a>
                        <?php else: ?>
                            <a href="../login.php" class="btn-primary">Login to Get Started</a>
                        <?php endif; ?>
                    </div>

                    <div class="service-stats">
                        <h4>Email Marketing Results</h4>
                        <div class="stat">
                            <span class="stat-number">45%</span>
                            <span class="stat-label">Average Open Rate</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">12%</span>
                            <span class="stat-label">Average Click Rate</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">320%</span>
                            <span class="stat-label">ROI Improvement</span>
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
