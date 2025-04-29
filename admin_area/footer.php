<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:white;
            color:;
            margin: 0;
            padding: 20px;
        
           /*background-color:rgb(0, 0, 0);*/
        }
        footer {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #222;
        }
        .footer-section {
            width: 50%;
        }
        .footer-section h4 {
            margin: 0 0 10px 0;
        }
        .social-icons {
            list-style-type: none;
            padding: 0;
        }
        .social-icons li {
            display: inline;
            margin-right: 10px;
        }
        .social-icons a {
            color: white;
            text-decoration: none;
        }
        .search-input {
            width: 100%;
            padding: 5px;
        }
        .footer-bottom {
            text-align: center;
            margin-top: 0px;
        }
    </style>
</head>
<body>

<footer class=bg-info >
    <div class="footer-section">
        <h4>ABOUT COMPANY</h4>
        <p>Fashion Rules - Your go-to destination for trendy, high-quality fashion. 
            Explore stylish and affordable clothing for men, women, and kids. Fast 
            shipping, hassle-free returns, and exclusive deals. Dress with confidence,
            shop with ease!</p>
        <ul class="social-icons">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
        </ul>
    </div>

    <div class="footer-section">
        <h4>SEARCH SOMETHING</h4>
        <input type="text" class="search-input" placeholder="Search">
        --------------------------------------------------------------------------------
        <p>Fashion Rules, Shop No 7, Chandare Complex, Near HP Petrol 
               Pump, Sus Gaon, Pune, Maharashtra 411021</p>
               
        <p>Email: <a href="fashionrules@gmail.com">fashionrules@gmail.com</a></p>
        <p>7499550149 / 0000000000</p>
    </div>

    <div class="footer-section">
        <h4>OPENING HOURS</h4>
        <p>Mon - Thu: 8am - 9pm</p>
        <p>Fri - Sat: 8am - 1am</p>
        <p>Sunday: 9am - 10pm</p>
    </div>
    
</footer>
<div class="footer-bottom bg-info">
    <p>&copy; 2020 Copyright:fashionrules@gmail.com</p>
</div>


</body>
</html>