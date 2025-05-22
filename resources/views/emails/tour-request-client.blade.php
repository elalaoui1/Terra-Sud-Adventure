<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thank You</title>
  <style>
    body {
      background-color: #f0f4f8;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
    }
    .email-wrapper {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }
    .header {
      background-color: #ffffff;
      padding: 20px;
      text-align: center;
      border-bottom: 1px solid #e0e0e0;
    }
    .header img {
      max-width: 150px;
      height: auto;
    }
    .content {
      padding: 30px 40px;
      color: #333;
    }
    .content h2 {
      color: #2c3e50;
      margin-bottom: 20px;
    }
    .content p {
      font-size: 16px;
      line-height: 1.6;
      margin: 10px 0;
    }
    .content .dear {
      font-weight: bold;
      color: #555;
    }
    .footer {
      text-align: center;
      padding: 20px;
      font-size: 12px;
      color: #888;
      background-color: #fafafa;
      border-top: 1px solid #e0e0e0;
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <div class="header">
    <img src="{{ asset('logo.jpeg') }}" alt="Terra Sud Adventures" style="max-width: 150px; height: auto;">
    </div>
    <div class="content">
      <h2>Thank You for Your Request</h2>
      <p class="dear">Dear {{ $tourRequest->name }},</p>
      <p>Thanks for contacting us about a tour. Our team is reviewing your request and will get back to you soon.</p>
      <p>Best regards,<br><strong>The Terra Sud Adventures Team</strong></p>
    </div>
    <div class="footer">
      &copy; {{ date('Y') }} Terra Sud Adventures. All rights reserved.
    </div>
  </div>
</body>
</html>
