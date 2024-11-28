<!--
    Name: Ron Navalez
    Date: November 16, 2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tri Builders Corp - Gallery</title>
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
        <section id="gallery">

            <div class="gallery-item">
                <img src="images/basement2.jpg" alt="Construction Project 2">
                <div class= "gallery-caption">Basement: Before</div>
            </div>
            <div class="gallery-item">
                <img src="images/basement1.jpg" alt="basement1">
                <div class= "gallery-caption">Basement: After</div>
            </div>
            <div class="gallery-item">
                <img src="images/minibar.jpg" alt="minibar">
                <div class= "gallery-caption">Mini Bar: Before</div>
            </div>
             <div class="gallery-item">
                <img src="images/minibar2.jpg" alt="minibar2">
                <div class= "gallery-caption">Mini Bar: After</div>
            </div>
            <div class="gallery-item">
                <img src="images/fence.jpg" alt="fence1">
                <div class= "gallery-caption">Lakeview home fencing project</div>
            </div>
            <div class="gallery-item">
                <img src="images/fence2.jpg" alt="fenc2">
                <div class= "gallery-caption">Suburban Fencing Project</div>
            </div>
            <div class="gallery-item">
                <img src="images/landscaping3.jpg" alt="landscaping3">
                <div class= "gallery-caption">Landscape Project</div>
            </div>
            <div class="gallery-item">
                <img src="images/landscaping4.jpg" alt="landscaping3">
                <div class= "gallery-caption">Landscape Project</div>
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
