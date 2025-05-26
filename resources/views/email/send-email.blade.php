<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$subject}}</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f6f6f6;
    }
    .container {
      width: 100%;
      padding: 20px 0;
      background-color: #f6f6f6;
    }
    .content {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 6px;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .header {
      padding: 0;
    }
    .header img {
      display: block;
      width: 100%;
      height: auto;
    }
    .body {
      padding: 20px;
      color: #333333;
    }
    .body h1 {
      font-size: 20px;
      margin: 0 0 15px;
      color: #333333;
    }
    .body p {
      font-size: 14px;
      line-height: 1.6;
      margin: 0 0 10px;
    }
    .body a.button {
      display: inline-block;
      margin-top: 20px;
      background-color: #28a745;
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 4px;
      font-weight: bold;
    }
    .footer {
      text-align: center;
      padding: 15px;
      font-size: 12px;
      color: #999999;
    }
    .footer a {
      color: #007bff;
      text-decoration: none;
    }
    .social-icons {
      padding: 10px 0;
    }
    .social-icons img {
      margin: 0 5px;
      width: 24px;
      height: 24px;
    }
    @media screen and (max-width: 600px) {
      .body h1 {
        font-size: 18px;
      }
      .body p {
        font-size: 13px;
      }
    }
  </style>
</head>
<body>
  

  <div class="container">
    <div class="content">
      <div class="body">
            {!! $body !!}
      </div>
      <div class="footer">
        <p>For any technical issues faced, please contact <a href="#">Customer Support</a>.</p>
        <div class="social-icons">
          <a href="#"><img src="https://i.ibb.co/8Ltr5T6f/facebook.png" alt="Facebook"></a>
          <a href="#"><img src="https://i.ibb.co/WNvY5Z6F/twitter.png" alt="Twitter"></a>
          <a href="#"><img src="https://i.ibb.co/DP8X8GTb/linkedin.png" alt="linkedin+"></a>
          <a href="#"><img src="https://i.ibb.co/JN1N7V7/instagram.png" alt="Medium"></a>
          <a href="#"><img src="https://i.ibb.co/Nd4j9fD1/youtube.png" alt="Medium"></a>
        </div>
        <p><a href="#">here</a>.</p>
        <p>If you wish to unsubscribe from all future emails, please click <a href="#">here</a>.</p>
      </div>
    </div>
  </div>
</body>
</html>
