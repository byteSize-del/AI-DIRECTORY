<?php
// Step 1: Get the form data that user submitted
$username = $_POST['username'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

// Step 2: Connect to database
$conn = new mysqli("localhost", "root", "", "contacts");

// Step 3: Check if connection worked
if ($conn->connect_error) {
    $error_message = "Cannot connect to database!";
    $success = false;
} else {
    // Step 4: Save data to database
    $sql = "INSERT INTO contact_form (username, email, feedback) VALUES ('$username', '$email', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        $success = true;
    } else {
        $success = false;
        $error_message = $conn->error;
    }

    // Step 5: Close database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Thank you for contacting AI Directory. Your message has been received.">
    <meta name="author" content="AI Directory Team">
    <meta name="robots" content="noindex, nofollow">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../images/ai.png">
    <meta name="theme-color" content="#6366f1">

    <title><?php echo $success ? 'Thank You!' : 'Error'; ?> - AI Directory</title>

    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="../css/contact.css">
</head>

<body>
    <!-- HEADER SECTION: Modern navigation bar with hamburger menu -->
    <header class="header">
        <nav class="navbar">
            <a href="../index.html" class="logo-link">
                <img class="logo-1" src="../images/ai.png" alt="AI Directory Logo">
            </a>

            <!-- Hamburger Menu for mobile -->
            <button class="hamburger" id="hamburger" aria-label="Toggle navigation menu">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navigation Links -->
            <ul class="nav-links" id="navLinks">
                <li><a href="../index.html" class="nav-link">HOME</a></li>
                <li><a href="../pages/about.html" class="nav-link">ABOUT</a></li>
                <li><a href="../pages/services.html" class="nav-link">SERVICES</a></li>
                <li><a href="../pages/update.html" class="nav-link">UPDATES</a></li>
                <li><a href="../pages/contact.html" class="nav-link active">CONTACT</a></li>
            </ul>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-content">
                <?php if ($success): ?>
                    <div class="success-message">
                        <i class="fas fa-check-circle" style="font-size: 4rem; color: #10b981; margin-bottom: 1rem;"></i>
                        <h1 class="hero-title">
                            <span class="gradient-text">Thank You, <?php echo htmlspecialchars($username); ?>!</span>
                        </h1>
                        <p class="hero-description">
                            Your message has been successfully received. We'll get back to you as soon as possible.
                        </p>
                        <div style="margin-top: 2rem;">
                            <a href="../pages/contact.html" class="service-btn" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 1rem 2rem; background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white; text-decoration: none; border-radius: 0.75rem; font-weight: 600; transition: all 0.3s;">
                                <i class="fas fa-arrow-left"></i>
                                <span>Back to Contact</span>
                            </a>
                            <a href="../index.html" class="service-btn" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 1rem 2rem; background: linear-gradient(135deg, #10b981, #059669); color: white; text-decoration: none; border-radius: 0.75rem; font-weight: 600; transition: all 0.3s; margin-left: 1rem;">
                                <i class="fas fa-home"></i>
                                <span>Go Home</span>
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle" style="font-size: 4rem; color: #ef4444; margin-bottom: 1rem;"></i>
                        <h1 class="hero-title">
                            <span class="gradient-text">Oops! Something Went Wrong</span>
                        </h1>
                        <p class="hero-description">
                            <?php echo htmlspecialchars($error_message); ?>
                        </p>
                        <div style="margin-top: 2rem;">
                            <a href="../pages/contact.html" class="service-btn" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 1rem 2rem; background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white; text-decoration: none; border-radius: 0.75rem; font-weight: 600; transition: all 0.3s;">
                                <i class="fas fa-arrow-left"></i>
                                <span>Try Again</span>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <h4 class="footer-title">About Us</h4>
                <p class="footer-description">
                    We are a team of passionate individuals dedicated to providing the best AI tools and resources
                    to help you succeed in your projects.
                </p>

                <!-- Social Media Icons using Font Awesome -->
                <div class="social-icons">
                    <a href="#" class="social-link" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>

                <p class="footer-copyright">
                    Made with <span class="heart">❤️</span> by AI Directory Team © 2026
                </p>
            </div>
        </div>
    </footer>
</body>

</html>