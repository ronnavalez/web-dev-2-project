<!--
    Name: Ron Navalez
    Date: November 16, 2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>

        <div id="logo">
            <a href="index.php"><img src="images/tbcheader.jpg" alt="Tri Builders Corp Logo"></a>
        </div>
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
    
    <div class="container">
        <h1>Contact Us</h1>
        <form id="contactForm">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone">
            </div>
            <div>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
            </div>
            <div>
                <label for="service">Type of Service:</label>
                <select id="service" name="service">
                    <option>Renovation</option>
                    <option>Landscaping</option>
                    <option>Deck & Fencing</option>
                </select>
            </div>
            <div>
                <label for="comments">Comments:</label>
                <textarea id="comments" name="comments" rows="4"></textarea>
            </div>

            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
            <p id="errorMessage" class="error-message"></p>
        </form>
    </div>

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


    <script src="script.js"></script>
</body>
</html>
