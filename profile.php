<?php
session_start();
 if(isset($_SESSION['customerID'])) {
  require('./config/db.php');
 
  $customerID=$_SESSION['customerID']; 

  $stmt= $pdo -> prepare ('SELECT * from customeraccount WHERE customerID=?');
  $stmt -> execute ([$customerID]);

  $customer =-$stmt -> fetch();

  if( $customer->role === 'guest') {
    $message =" Your role is a guest";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Font-Awesome css file link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- custom css file link  -->
    
    <link rel="stylesheet" href="css/styles.css">
</head>


<body>
    
    <nav class="navbar"></nav>

    </header>

    <!-----Product Containers------>

    <section class="product">
    <h2 style=" text-align: center">Welcome to Profile Page </h2>
        <h2 class="productCategory">Products On Sale </h2>

        <div class="productContainer">
            <button class="nxt-btn"><img src="images/ArrowRight.png" alt=""></button>
            <button class="pre-btn"><img src="images/ArrowRight.png" alt=""></button>

            <div class="productWindow">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <a href="product.html">
                        <img src="images/Product1.jpeg" class="productThumb" alt="">
                    </a>
                    <button class="cardBtn">add to cart</button>
                </div>

                <div class="productInfo">
                    <h2 class="productBrand">Strapped Bennies</h2>
                    <p class="productShortDes">– 100% wool with fleece liners</p>
                    <span class="price">$19.99</span><span class="actualPrice">$39.99</span>
                </div>
            </div>
            <div class="productWindow">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <a href="product2.html">
                        <img src="images/Product2.jpeg" class="productThumb" alt="">
                    </a>
                    <button class="cardBtn">add to cart</button>
                </div>

                <div class="productInfo">
                    <h2 class="productBrand">Earcuff Bennies</h2>
                    <p class="productShortDes">– 100% wool with fleece liners</p>
                    <span class="price">$34.99</span><span class="actualPrice">$59.99</span>
                </div>
            </div>

            <div class="productWindow">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/Product3.jpeg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>

                <div class="productInfo">
                    <h2 class="productBrand">Flower Prints</h2>
                    <p class="productShortDes">– 100% wool with fleece liners</p>
                    <span class="price">$19.99</span><span class="actualPrice">$39.99</span>
                </div>
            </div>

            <div class="productWindow">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/Product4.jpeg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>

                <div class="productInfo">
                    <h2 class="productBrand">Foot-Warmer</h2>
                    <p class="productShortDes">– 100% wool with fleece liners</p>
                    <span class="price">$29.99</span><span class="actualPrice">$59.99</span>
                </div>
            </div>

            <div class="productWindow">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/Product4.jpeg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>

                <div class="productInfo">
                    <h2 class="productBrand">Foot-Warmer</h2>
                    <p class="productShortDes">– 100% wool with fleece liners</p>
                    <span class="price">$29.99</span><span class="actualPrice">$59.99</span>
                </div>
            </div>

            <div class="productWindow">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/Product5.jpeg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>

                <div class="productInfo">
                    <h2 class="productBrand">Hand-Warmer</h2>
                    <p class="productShortDes">– 100% wool with fleece liners</p>
                    <span class="price">$24.99</span><span class="actualPrice">$49.99</span>
                </div>
            </div>

            <div class="productWindow">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/Product6.jpeg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>

                <div class="productInfo">
                    <h2 class="productBrand">Strapped Foot-warmer</h2>
                    <p class="productShortDes">– 100% wool with fleece liners</p>
                    <span class="price">$39.99</span><span class="actualPrice">$99.99</span>
                </div>
            </div>

            <div class="productWindow">
                <div class="productImage">
                    <span class="discountTag">40% off</span>
                    <img src="images/Product7.jpeg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>

                <div class="productInfo">
                    <h2 class="productBrand">Kids Foot-warmer</h2>
                    <p class="productShortDes">– 100% wool with fleece liners</p>
                    <span class="price">$19.99</span><span class="actualPrice">$39.99</span>
                </div>
            </div>

            

        </div>

        </div>
    </div>

    </section>

    <footer>
    </footer>
    <script src="js/nav2.js"></script>
    <script src="js/home.js"></script>
    <script src="js/footer.js"></script>

    <script src="js/main.js"></script>
</body>

</html>