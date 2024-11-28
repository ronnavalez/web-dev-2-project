<!--
    Name: Ron Navalez
    Date: November 16, 2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tri Builders Corp - About Us</title>
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
         <section id="about">
            <h2>About Us</h2>
            <p>Welcome to Tri Builders Corp! We're more than just a construction company - we're a team of passionate individuals dedicated to turning dreams into reality. Our journey began with a vision to create beautiful spaces that enhance the lives of our clients and their communities.</p>

            <p>At Tri Builders Corp, integrity, quality, and excellence are at the core of everything we do. With years of experience in the industry, our skilled professionals bring expertise, creativity, and dedication to every project we undertake. Whether it's renovating a home, constructing a new building, or designing outdoor landscapes, we approach each task with enthusiasm and a commitment to exceeding expectations.</p>

            <p>But beyond the projects we complete, it's the relationships we build that truly define us. We believe in open communication, collaboration, and transparency every step of the way. From the initial consultation to the final walkthrough, we work closely with our clients to understand their vision, address their concerns, and deliver results that inspire.</p>

            <p>As a locally-owned and operated company, we take pride in being part of the communities we serve. Giving back is an integral part of our ethos, and we actively support local initiatives and organizations that make a positive impact.</p>

            <p>Thank you for considering Tri Builders Corp for your next project. We look forward to the opportunity to work with you and bring your vision to life!</p>
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
