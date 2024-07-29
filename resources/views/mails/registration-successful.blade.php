<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #007bff;
        }
        .content {
            padding: 20px 0;
        }
        .content p {
            margin: 10px 0;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #888;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>ANT Horizon 2024 Registration</h1>
    </div>
    <div class="content">
        <p>Dear {{ $name }},</p>
        <p>Thank you for registering for ANT Horizon 2024!</p>
        <p>We are excited to have you join us for this event. Stay tuned for more updates and information.</p>
        <p>Best regards,</p>
        <p>ANT Horizon Team</p>
    </div>
    <div class="footer">
        <p>If you have any questions, feel free to <a href="mailto:{{ config('mail.from.address') }}">contact us</a>.</p>
        <p>&copy; 2024 ANT Horizon. All rights reserved.</p>
    </div>
</div>
</body>
</html>
