<?php
$responseMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    $to = 'winniegatex@gmail.com';
    $subject = "New Contact Form Submission from $name";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    if (mail($to, $subject, $body, $headers)) {
        $responseMessage = "<div class='alert success'>Thank you, $name! Your message has been sent.</div>";
    } else {
        $responseMessage = "<div class='alert error'>Sorry, something went wrong. Please try again later.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact | Winfred Wambui</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    .alert { padding: 1rem; border-radius: 5px; margin-bottom: 1rem; }
    .alert.success { background: #d4edda; color: #155724; }
    .alert.error { background: #f8d7da; color: #721c24; }
  </style>
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo">Winfred</div>
      <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="skills.html">Skills</a></li>
        <li><a href="projects.html">Projects</a></li>
        <li><a href="experience.html">Experience</a></li>
        <li><a href="contact.php" class="active">Contact</a></li>
      </ul>
    </nav>
  </header>

  <section class="contact-section">
    <div class="container">
      <h1 class="section-title">Let's Connect</h1>
      <p class="section-intro">I'd love to hear from you — whether it’s a project, collaboration, or just to say hi.</p>
      <?php echo $responseMessage; ?>
      <form action="contact.php" method="POST" class="contact-form">
        <div class="form-group">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" placeholder="Full Name" required />
        </div>
        <div class="form-group">
          <label for="email">Your Email</label>
          <input type="email" id="email" name="email" placeholder="Email Address" required />
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="6" placeholder="Write your message here..." required></textarea>
        </div>
        <button type="submit" class="btn">Send Message</button>
      </form>
      <div class="contact-details">
        <p><i class="fas fa-envelope"></i> <strong>Email:</strong> <a href="mailto:winniegatex@gmail.com">winniegatex@gmail.com</a></p>
        <p><i class="fas fa-phone"></i> <strong>Phone:</strong> <em>+254-740691004</em></p>
        <p><i class="fab fa-linkedin"></i> <strong>LinkedIn:</strong> <a href="#">winniegatex</a></p>
        <p><i class="fab fa-github"></i> <strong>GitHub:</strong> <a href="https://winniegatex.github.io/">winniegatex</a></p>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Winfred Wambui. All rights reserved.</p>
  </footer>
</body>
</html>
