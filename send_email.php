<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $to = "You'r e-mail or G-mail goes here!"; // (replace with your own email sending code)
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  $subject = "New Message from Contact Form";

  //HTML content for the email body
  $htmlContent = '
<html>
<head>
  <title>Contact Form Submission</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo img {
      max-width: 200px;
    }

    .message {
      margin-bottom: 20px;
    }

    .button-container {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .button-container a {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      margin-right: 10px;
    }

    .button-container a:hover {
      background-color: #45a049;
    }

    .social-icons {
      text-align: center;
    }

    .social-icons a {
      display: inline-block;
      margin-right: 10px;
    }

    .social-icons img {
      max-width: 30px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>New Message from Contact Form</h2>
    <div class="logo">
      <img src="logo.png" alt="Logo">
    </div>
    <div class="message">
      <p><strong>Name:</strong> ' . $name . '</p>
      <p><strong>Email:</strong> ' . $email . '</p>
      <p><strong>Message:</strong> ' . $message . '</p>
    </div>
    <div class="button-container">
      <a href="https://www.example.com" target="_blank">Visit our Website</a>
      <a href="https://www.facebook.com" target="_blank">Follow us on Facebook</a>
    </div>
    <div class="social-icons">
      <a href="https://www.facebook.com" target="_blank"><img src="facebook.png" alt="Facebook"></a>
      <a href="https://www.twitter.com" target="_blank"><img src="twitter.png" alt="Twitter"></a>
      <a href="https://www.instagram.com" target="_blank"><img src="instagram.png" alt="Instagram"></a>
    </div>
  </div>
</body>
</html>
';


  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email" . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  
  if (mail($to, $subject, $htmlContent, $headers)) {
    // Email sent successfully, display the success message
    echo '
      <!DOCTYPE html>
      <html>
      <head>
        <title>Contact Form Success</title>
        <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 20px;
          }
          
          .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          }
          
          .success-message {
            color: #356ba2;
            font-weight: bold;
            text-align: center;
            animation-name: fade-in;
            animation-duration: 0.5s;
            animation-fill-mode: both;
          }

          @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
          }

          .return-home-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
          }

          .return-home-button a {
            padding: 10px 20px;
            background-color: #356ba2;
            color: white;
            text-decoration: none;
            border-radius: 4px;
          }

          .return-home-button a:hover {
            background-color: #45a049;
          }
        </style>
      </head>
      <body>
        <div class="container">
          <p class="success-message">Thank you for your message! Well get back to you soon.</p>
          <div class="return-home-button">
            <a href="index.html">Return Home</a>
          </div>
        </div>
      </body>
      </html>
    ';
  } else {
    // Email failed to send, display an error message
    echo '<p>Error: Failed to send the email.</p>';
  }
}
?>
