<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Display</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
        text-align: center;

}
.product-display {
    text-align: center;
}
.product-box {
    display: inline-block;
    width: 300px;
    height: 360px;
    padding: 16px;
    margin: 12px;
    border: 2px solid #2b84d77f;
    background-color: #f0ecec;
    border-radius: 12px;
   
}

.product-box h3 {
    font-size: 1em;
    font-weight: bold;
    color: goldenrod;
    text-align: left;

}

.product-box h2 {
    font-size: 1.2em;
    margin: 8px 0;
}

.product-box a {
    display: inline-block;
    margin-top: 8px;
    color: #fff;
    background: #4a90e2;
    padding: 6px 16px;
    font-weight: bold;
}
.product-box :hover {
    background: #6ca3d4;

}

</style>


<body>
    <h1>Packages</h1>
    <div class="product-display">
        <h2>Wedding</h2>
        <div class="product-box">
            
            <img src="/webtech/project/project_pic/package-wedding.jpg" width="310" height="200" alt="Wedding picture">
            <h3>Wedding Exclusive</h3>
            <p>Lightweight, powerful laptop for daily use.</p>
            <p>$200</p>
            <a href="webtech/project/Controller/bookEvent.php?event=Wedding Exclusive">
                Book Now
            </a>

        </div>
        <div class="product-box">
            
            <img src="/webtech/project/project_pic/signin.avif" width="310" height="200" alt="Wedding picture">
            <h3>Wedding Signature</h3>
            <p>Lightweight, powerful laptop for daily use.</p>
            <p>$300</p>
            <a href="../Controller/bookEvent.php?event=Wedding Signature">
                Book Now
            </a>
        </div>
       <div class="product-box">
            
            <img src="/webtech/project/project_pic/wedding.jpg" width="310" height="200" alt="Wedding picture">
            <h3>Wedding Premium</h3>
            <p>Lightweight, powerful laptop for daily use.</p>
            <p>$400</p>
            <a href="../Controller/bookEvent.php?event=Wedding Premium">
                Book Now
            </a>
        </div>


        <h2>Birthday</h2>
          <div class="product-box">
            
            <img src="/webtech/project/project_pic/package-birthday.jpg" width="310" height="200" alt="Birthday picture">
            <h3>Birthday Exclusive</h3>
            <p>Lightweight, powerful laptop for daily use.</p>
            <p>$200</p>
            <a href="../Controller/bookEvent.php?event=Birthday Exclusive">
                Book Now
            </a>
        </div>
       <div class="product-box">
            
            <img src="/webtech/project/project_pic/package-party.jpg" width="310" height="200" alt="Birthday picture">
            <h3>Birthday Signature</h3>
            <p>Lightweight, powerful laptop for daily use.</p>
            <p>$300</p>
            <a href="../Controller/bookEvent.php?event=Birthday Signature">
                Book Now
            </a>
        </div>
        <div class="product-box">
            
            <img src="/webtech/project/project_pic/birth.jpg" width="310" height="200" alt="Birthday picture">
            <h3>Birthday Premium</h3>
            <p>Lightweight, powerful laptop for daily use.</p>
            <p>$400</p>
            <a href="../Controller/bookEvent.php?event=Birthday Premium">
                Book Now
            </a>
        </div>
        


        <h2>Conference</h2>
          <div class="product-box">
            
            <img src="/webtech/project/project_pic/con3.webp" width="310" height="200" alt="Conference picture">
            <h3>Conference Exclusive</h3>
            <p>Lightweight, powerful laptop for daily use.</p>
            <p>$200</p>
            <a href="../Controller/bookEvent.php?event=Conference Exclusive">
                Book Now
            </a>
        </div>
         <div class="product-box">
            
            <img src="/webtech/project/project_pic/con1.jpeg" width="310" height="200" alt="Conference picture">
            <h3>Conference Signature</h3>
            <p>Lightweight, powerful laptop for daily use.</p>
            <p>$300</p>
            <a href="../Controller/bookEvent.php?event=Conference Signature">
                Book Now
            </a>
        </div>
        <div class="product-box">
            
            <img src="/webtech/project/project_pic/con2.jpg" width="310" height="200" alt="Seminar picture">
            <h3>Conference Premium</h3>
            <p>Lightweight, powerful laptop for daily use.</p>
            <p>$400</p>
            <a href="../Controller/bookEvent.php?event=Conference Premium">
                Book Now
            </a>
        </div>
       

    </div>
     <footer>
        &copy; 2025 Online Store. All rights reserved.
    </footer>
</body>
</html>
