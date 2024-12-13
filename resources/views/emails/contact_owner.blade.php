<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Message for Your Apartment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius: 6px 6px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        .content {
            padding: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Message for Your Apartment</h1>
        </div>
        <div class="content">
            <p><strong>Apartment Title:</strong> {{ $lead->property }}</p>
            <p><strong>Sender Email:</strong> {{ $lead->email }}</p>
            <p><strong>Message:</strong></p>
            <blockquote style="border-left: 4px solid #ddd; margin: 10px 0; padding-left: 10px; color: #555;">
                {{ $lead->message }}
            </blockquote>
        </div>
        <div class="footer">
            <p>This message was sent via your Boolbnb contact form.</p>
        </div>
    </div>
</body>
</html>

