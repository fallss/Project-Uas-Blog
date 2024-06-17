<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | TeknoBlog</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="index.php">TeknoBlog</a></h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <section class="contact-info">
                <h2>Contact Us</h2>
                <p>If you have any questions, just fill in the contact form, and we will answer you shortly. If you are living nearby, come visit TeknoBlog in our comfortable office.</p>
            </section>
            <div class="contact-methods">
                <div class="email-contact">
                    <h3>Email Us</h3>
                    <form action="send_email.php" method="POST">
                        <input type="text" placeholder="Your Name" name="name" required>
                        <input type="email" placeholder="Your Email" name="email" required>
                        <textarea placeholder="Your Message" name="message" required></textarea>
                        <button type="submit">Send Message</button>
                    </form>
                </div>
                <div class="phone-socials">
                    <h3>Call Us</h3>
                    <p><i class="fas fa-phone"></i> +123 456 7890</p>
                    <h3>Follow Us</h3>
                    <p>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </p>
                </div>
            </div>
            <section class="map">
                <h3>Visit Our Office</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.698750168164!2d-122.40564048434404!3d37.786835679758594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858064c6f88d97%3A0x3e92666fd9571e8f!2sTwitter%20HQ!5e0!3m2!1sen!2sus!4v1587415685704!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </section>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>© 2024 TeknoBlog. All rights reserved.</p>
        </div>
    </footer>

    <!-- Menambahkan JavaScript di sini -->
    <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        var isValid = true;
        document.querySelectorAll('input[required], textarea[required]').forEach(function(input) {
            if (!input.value) {
                input.style.borderColor = 'red';
                isValid = false;
            } else {
                input.style.borderColor = '#ccc';
            }
        });

        if (!isValid) {
            event.preventDefault(); // Stop form submission
            alert('Please fill in all required fields.');
        }
    });
    </script>
    
</body>
</html>
