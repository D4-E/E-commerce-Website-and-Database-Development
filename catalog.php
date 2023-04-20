<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            margin: 100px auto;
            max-width: 940px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            position: relative;
        }

        .cart-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 150px;
            height: 50px;
            border-radius: 5px;
            background-color: #ffd369;
            color: #fff;
            font-size: 24px;
            text-align: center;
            cursor: pointer;
        }

        .checkout {
            display: block;
            margin-top: 10px;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #ffce00;
            color: #fff;
            font-size: 20px;
            text-align: center;
            cursor: pointer;
        }

        .product {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            margin: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            width: calc((100% / 2) - 30px);
            height: 350px;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        .product-image {
            width: 100%;
            height: 70%;
            margin-bottom: 10px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: auto;
            margin-bottom: 10px;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            margin: 0 5px;
            background-color: #e0e0e0;
            border: none;
            border-radius: 50%;
            font-size: 16px;
            font-weight: bold;
            color: #555;
            cursor: pointer;
        }

        .quantity-btn:hover {
            background-color: #ccc;
        }

        .slick-slider {
            margin-top: 80px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }

        .slick-prev:before {
            content: '←';
            font-size: 40px;
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translate(0, -50%);
        z-index: 1;
        cursor: pointer;
    }

    .slick-next:before {
        content: '→';
        font-size: 40px;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translate(0, -50%);
        z-index: 1;
        cursor: pointer;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
</head>
<body>
    <div class="container">
        <div class="cart-icon">
            <span>&#x1F6D2;</span>
            <span>$0.00</span>
            <button class="checkout-btn">Оформить заказ</button>
        </div>
        <div class="slick-slider">
            <div class="product">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200x200?text=Product+1" alt="Product 1">
                </div>
                <div class="product-name">Product 1</div>
                <div class="product-price">$19.99</div>
                <div class="product-actions">
                    <button class="quantity-btn minus-btn">-</button>
                    <span class="product-quantity">0</span>
                    <button class="quantity-btn plus-btn">+</button>
                </div>
                <a href="#" class="checkout">Checkout</a>
            </div>
            <div class="product">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200x200?text=Product+2" alt="Product 2">
                </div>
                <div class="product-name">Product 2</div>
                <div class="product-price">$29.99</div>
                <div class="product-actions">
                    <button class="quantity-btn minus-btn">-</button>
                    <span class="product-quantity">0</span>
                    <button class="quantity-btn plus-btn">+</button>
                </div>
                <a href="#" class="checkout">Checkout</a>
            </div>
            <div class="product">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200x200?text=Product+3" alt="Product 3">
                </div>
                <div class="product-name">Product 3</div>
                <div class="product-price">$39.99</div>
                <div class="product-actions">
                    <button class="quantity-btn minus-btn">-</button>
                    <span class="product-quantity">0</span>
                    <button class="quantity-btn plus-btn">+</button>
                </div>
                <a href="#" class="checkout">Checkout</a>
            </div>
            <div class="product">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200x200?text=Product+4" alt="Product 4">
                </div>
                <div class="product-name">Product 4</div>
                <div class="product-price">$49.99</div>
                <div class="product-actions">
                    <button class="quantity-btn minus-btn">-</button>
                    <span class="product-quantity">0</span>
                    <button class="quantity-btn plus-btn">+</button>
                </div>
                <a href="#" class="checkout">Checkout</a>
        </div>
        <div class="product">
            <div class="product-image">
                <img src="https://via.placeholder.com/200x200?text=Product+5" alt="Product 5">
            </div>
            <div class="product-name">Product 5</div>
            <div class="product-price">$59.99</div>
            <div class="product-actions">
                <button class="quantity-btn minus-btn">-</button>
                <span class="product-quantity">0</span>
                <button class="quantity-btn plus-btn">+</button>
            </div>
            <a href="#" class="checkout">Checkout</a>
        </div>
        <div class="product">
            <div class="product-image">
                <img src="https://via.placeholder.com/200x200?text=Product+6" alt="Product 6">
            </div>
            <div class="product-name">Product 6</div>
            <div class="product-price">$69.99</div>
            <div class="product-actions">
                <button class="quantity-btn minus-btn">-</button>
                <span class="product-quantity">0</span>
                <button class="quantity-btn plus-btn">+</button>
            </div>
            <a href="#" class="checkout">Checkout</a>
        </div>
        <div class="product">
            <div class="product-image">
                <img src="https://via.placeholder.com/200x200?text=Product+7" alt="Product 7">
            </div>
            <div class="product-name">Product 7</div>
            <div class="product-price">$79.99</div>
            <div class="product-actions">
                <button class="quantity-btn minus-btn">-</button>
                <span class="product-quantity">0</span>
                <button class="quantity-btn plus-btn">+</button>
            </div>
            <a href="#" class="checkout">Checkout</a>
        </div>
        <div class="product">
            <div class="product-image">
                <img src="https://via.placeholder.com/200x200?text=Product+8" alt="Product 8">
            </div>
            <div class="product-name">Product 8</div>
            <div class="product-price">$89.99</div>
            <div class="product-actions">
                <button class="quantity-btn minus-btn">-</button>
                <span class="product-quantity">0</span>
                <button class="quantity-btn plus-btn">+</button>
            </div>
            <a href="#" class="checkout">Checkout</a>
        </div>
    </div>
    <div class="slick-arrow-prev">
        <i class="fas fa-chevron-left"></i>
    </div>
    <div class="slick-arrow-next">
        <i class="fas fa-chevron-right"></i>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!-- <script>
    $(document).ready(function () {
        $('.slick-slider').slick({
            arrows: true,
            prevArrow: $('.slick-arrow-prev'),
            nextArrow: $('.slick-arrow-next'),
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow -->

<script>
  $(document).ready(function(){$(".slick-slider").slick({arrows:!0,prevArrow:$(".slick-arrow-prev"),nextArrow:$(".slick-arrow-next"),slidesToShow:4,slidesToScroll:4,responsive:[{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:2}}]})});

</script>

</body>

</html>
