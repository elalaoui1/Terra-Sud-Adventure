<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tour Request Canceled</title>
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
      color: #e74c3c;
      margin-bottom: 20px;
    }
    .content p {
      font-size: 16px;
      line-height: 1.6;
      margin: 10px 0;
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
      <img src="{{ asset('logo.jpeg') }}" alt="Terra Sud Adventures">
    </div>
    <div class="content">
      <h2>Tour Request Canceled</h2>
      <p>Dear {{ $tourRequest->name }},</p>
      <p>We regret to inform you that your recent tour request has been canceled.</p>
      <p>If this was a mistake or if you would like to reschedule or request a new tour, please feel free to contact us at any time. We’d be happy to help you plan your next adventure.</p>
      <p>We apologize for any inconvenience and thank you for considering Terra Sud Adventures.</p>
      <p>Warm regards,<br><strong>The Terra Sud Adventures Team</strong></p>
    </div>
    <div class="footer">
      &copy; {{ date('Y') }} Terra Sud Adventures. All rights reserved.
    </div>
  </div>
</body>
</html>
