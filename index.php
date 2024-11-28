<!-- 
    November 16, 2024
    Ron Navalez
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tri Builders Corp - Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <a href="index.php"><img src="images/tbcheader.jpg" alt="Tri Builders Corp Logo"></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="reviews.php">Reviews</a></li>
            </ul>
        </nav>
        <div class="login-register">
            <a href="login.php">Login</a> | <a href="register.php">Register</a>
        </div>
        <form action="search.php" method="GET" style="display: inline;
                                                      padding: 0px">
            <input type="text" name="query" placeholder="Search links here.." required style="padding: 5px; width: 300px;">
            <button type="submit" style="padding: 9px;
                                         width: 70px;
                                         background-color: #ffc107;
                                         color: gray;">Search</button>
        </form>

    </header>

    <main>
        <section id="hero">
            <div class="hero-content">
                <h2>Welcome to Tri Builders Corp</h2>
                <p>At Tri Builders Corp, we pride ourselves on delivering high-quality construction, renovation, and landscaping services tailored to your needs. With a commitment to excellence and attention to detail, we strive to exceed your expectations with every project. From transforming your living space with innovative renovations to creating stunning outdoor landscapes, our skilled team is dedicated to bringing your vision to life. Explore our range of services below and discover how we can help you turn your dreams into reality.</p>
            </div>
        </section>

        <section id="about">
            <h2>About Us</h2>
            <p>Welcome to Tri Builders Corp, your premier destination for top-notch construction and renovation solutions. With over a decade of dedicated service, we've built a solid reputation for reliability, quality craftsmanship, and client satisfaction.</p>

            <p>At Tri Builders Corp, we take pride in our collaborative approach, working closely with each client to bring their vision to life. From concept to completion, our experienced team delivers innovative solutions, attention to detail, and personalized service, ensuring that every project exceeds expectations.</p>
            <a href="about.php" class="btn">Learn More</a>
        </section>

        <section id="contact">
            <h2>Contact Us</h2>
            <p>We're here to hear from you! Reach out to Tri Builders Corp today and let us turn your dreams into reality. Whether you have questions, ideas, or are ready to start your next project, our friendly team is standing by to assist you every step of the way. Get in touch now and discover the difference with Tri Builders Corp.</p>
            <a href="contact.php" class="btn">Get in Touch</a>
        </section>
    </main>

    <footer>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="reviews.php">Reviews</a></li>
            </ul>
        </nav>
        <div class="social-icons">
            <a href="https://www.facebook.com/TriBuildersCorp/"><img src="images/facebook-icon.png" alt="Facebook"></a>
            <a href="https://www.instagram.com/tribuilderscorp/"><img src="images/instagram-icon.png" alt="Instagram"></a>
        </div>

        <p>&copy; 2024 Tri Builders Corp. All rights reserved.</p>
    </footer>

</body>
</html>
