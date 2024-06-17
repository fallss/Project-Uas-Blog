<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post | TeknoBlog</title>
    <link rel="stylesheet" href="../css/styles.css">
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
            <article>
                <h2>Exploring the Future of Artificial Intelligence</h2>
                <img src="../images/post2.jpg" alt="AI">
                <p>Artificial Intelligence (AI) continues to be a transformative force in many industries. From automation to complex data analysis, AI technologies are reshaping the way businesses operate. In this post, we dive deep into the latest trends and future prospects of AI.</p>
                <p>Published on: <?php echo date("F j, Y"); ?></p>
            </article>
            <aside>
                <h3>Share this Post</h3>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">LinkedIn</a></li>
                </ul>
            </aside>
            <section class="comments">
                <h3>Comments</h3>
                <div class="comment">
                    <p><strong>Jane Doe:</strong> Great article! Really excited to see where AI technology will go in the next few years.</p>
                </div>
                <form action="post_comment.php" method="POST">
                    <label for="comment">Your Comment:</label>
                    <textarea id="comment" name="comment"></textarea>
                    <button type="submit">Post Comment</button>
                </form>
            </section>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>© 2024 TeknoBlog. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
