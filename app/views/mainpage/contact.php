<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Contact US</title>
    <?php include APP_DIR . 'views/templates/mainheader.php'; ?>
</head>

<body>
    <?php include APP_DIR . 'views/templates/main_nav.php'; ?>
    <main>
        <div class="container">
            <h1><b>Contact Us</b></h1>

            <div class="contact-info">
                <div class="contact-item">
                    <i>📍</i>
                    <p>Dulangan, Baco, Oriental Mindoro</p>
                </div>
                <div class="contact-item">
                    <i>📞</i>
                    <p>+6392222nogyan</p>
                </div>
                <div class="contact-item">
                    <i>✉️</i>
                    <p>aristoncordero@kupal.com</p>
                </div>
            </div>

            <div class="contact-form">
                <h2>Contact Form</h2>
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">SUBMIT</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>