<!--
    Name: Ron Navalez
    Date: November 16, 2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tri Builders Corp - Services</title>
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
         <section id="services">
            <h2>Our Services</h2>
            <div class="service">
                <h3>Renovation</h3>
                <img src="images/minibar.jpg" alt="minibar">
                <img src="images/minibar2.jpg" alt="minibar2">
                <p>Transform your living space with our expert renovation services. Whether it's updating a kitchen, remodeling a bathroom, or renovating your entire home, our skilled team is here to bring your vision to life. From concept to completion, we'll handle every detail with care and precision, ensuring your renovation project exceeds your expectations.</p>

            </div>
            <div class="service">
                <h3>Landscaping</h3>
                <img src="images/landscaping3.jpg" alt="landscape3">
                <img src="images/landscaping4.jpg" alt="landscape4">
                <p>Create your own outdoor oasis with our professional landscaping services. From lush gardens to inviting outdoor living spaces, we'll work with you to design and implement a landscape that reflects your style and enhances your property's beauty. With attention to detail and a focus on sustainability, we'll create a landscape that you'll love coming home to.</p>
            </div>
            <div class="service">
                <h3>Deck & Fencing</h3>
                <img src="images/deck2.jpg" alt="deck">
                <img src="images/fence.jpg" alt="fence">
                <p>At Tri Builders Corp, we understand that your outdoor space is more than just a backyard – it's an extension of your home, a place where memories are made, and where moments are cherished. That's why we're proud to offer our expert deck and fencing services, designed to transform your outdoor area into a welcoming haven that reflects your unique style and personality.</p>
                <p>Your home is your sanctuary, and our custom fencing solutions are designed to provide the security, privacy, and peace of mind you deserve. Whether you're looking for a classic picket fence to add charm and character to your property or a sleek modern design to complement your contemporary aesthetic, we have the expertise and creativity to bring your vision to life. With durable materials, expert craftsmanship, and attention to detail, our fences not only define and protect your outdoor space but also enhance its beauty and value for years to come.</p>
                <a href="contact.php" class="btn">Get in Touch</a>
            </div>
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
            <a href="https://www.instagram.com/tribuilderscorp"><img src="images/instagram-icon.png" alt="Instagram"></a>
        </div>

        <p>&copy; 2024 Tri Builders Corp. All rights reserved.</p>
    </footer>
</body>
</html>
