<?php
// Имитация данных, полученных из базы данных
$products = [];
for ($i = 1; $i <= 12; $i++) {
    $products[] = [
        'id' => $i,
        'name' => "Product $i",
        'price' => $i * 10,
        'image' => "https://via.placeholder.com/150?text=Product+$i",
        'details' => "Product $i details..."
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <style>
        /* Ваши стили */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .cart {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
        }

        .cart-icon {
            font-size: 24px;
            margin-right: 10px;
        }

        .cart-total {
            font-size: 18px;
            margin-right: 20px;
        }

        .checkout-btn {
            background-color: #ffd700;
            color: #000;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
        }

        .checkout-btn:hover {
            background-color: #ffc107;
        }

        .slick-slider {
            margin-bottom: 20px;
        }

        .product {
            text-align: center;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            margin: 10px;
            position: relative;
            perspective: 1000px;
            transition: all 0.5s;
        }

        /*.product.flipped {*/
        /*    transform: rotateY(180deg);*/
        /*}*/

        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .quantity-controls {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .minus-btn,
        .plus-btn {
            width: 50%;
            padding: 10px;
            border: none;
            background-color: #ccc;
            cursor: pointer;
        }

        .minus-btn:hover,
        .plus-btn:hover {
            background-color: #999;
        }

        .details-btn {
            background-color: #ffd700;
            color: #000;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin-top: 10px;
            cursor: pointer;
        }

        .slick-arrow:before {
            color: #ffd700!important;
        }

        .details-btn:hover {
            background-color: #ffc107;
        }

        /*.product-details {*/
        /*    position: absolute;*/
        /*    backface-visibility: hidden;*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    top: 0;*/
        /*    left: 0;*/
        /*    padding: 20px;*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*    background-color: rgba(255, 255, 255, 1);*/
        /*    transform: rotateY(180deg);*/
        /*    opacity: 0;*/
        /*    transition: all 0.5s;*/
        /*}*/

        /*.product.flipped .product-details {*/
        /*    opacity: 1;*/
        /*}*/

        .rectangle {
            width: 670px;
            border-radius: 20px;
            background-color: #f2f2f2;
            margin: 50px auto;
            padding: 50px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 200;
        }

        .modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .product-details {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            display: none;
            text-align: left;
        }

        .product-details p {
            margin: 10px 0;
        }

        #product-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
        }

        .popup-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
        }

        .popup-content {
            background-color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            width: 80%;
            max-width: 500px;
            max-height: 90%;
            overflow-y: auto;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .popup-close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            border: none;
            background-color: transparent;
            cursor: pointer;
        }

        .popup-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div id="product-popup" style="display: none;">
    <div class="popup-overlay"></div>
    <div class="popup-content">
        <button class="popup-close-btn">x</button>
        <img class="popup-img" src="" alt="">
        <h3 class="popup-name"></h3>
        <p class="popup-price"></p>
        <div class="popup-description"></div>
    </div>
</div>
<div class="modal" style="display: none;">
    <div class="modal-content">
        <h2>Оформление заказа</h2>
        <form id="order-form">
            <label for="phone">Телефон:</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="address">Адрес:</label>
            <input type="text" id="address" name="address" required>
            <button type="submit">Оформить заказ</button>
        </form>
    </div>
</div>
<div class="container">
    <div class="cart">
        <span class="cart-icon">🛒</span>
        <span class="cart-total">0</span>
        <button class="checkout-btn" data-items="0">Оформить заказ</button>
    </div>
    <div class="rectangle">
        <div class="slick-slider">
            <?php foreach ($products as $product) : ?>
                <div class="product" data-id="<?php echo $product['id']; ?>" data-img="<?php echo $product['image']; ?>" data-name="<?php echo $product['name']; ?>" data-price="<?php echo $product['price']; ?>">
                    <div class="product-info">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                        <h3><?php echo $product['name']; ?></h3>
                        <p>Price: $<?php echo '<span class="price">' . $product['price'] . '</span>'; ?></p>
                        <div class="quantity-controls">
                            <button class="minus-btn">-</button>
                            <button class="plus-btn">+</button>
                        </div>
                        <button class="details-btn">Details</button>
                    </div>
                    <div class="product-details" style="display: none;">
                        <?php echo $product['details']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function () {
        $('.slick-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            prevArrow: '<button type="button" class="slick-prev">Previous</button>',
            nextArrow: '<button type="button" class="slick-next">Next</button>',
        });

        $('.details-btn').on('click', function () {
            var product = $(this).closest('.product');
            var img = product.find('img').attr('src');
            var name = product.find('h3').text();
            var price = product.find('.product-price').text();
            var description = product.find('.product-details').html();

            $('#product-popup .popup-img').attr('src', img);
            $('#product-popup .popup-name').text(name);
            $('#product-popup .popup-price').text(price);
            $('#product-popup .popup-description').html(description);

            $('#product-popup').fadeIn();
        });

        $('.popup-close-btn').on('click', function () {
            $('#product-popup').fadeOut();
        });

        $('.popup-overlay').on('click', function () {
            $('#product-popup').fadeOut();
        });

        $('.checkout-btn').on('click', function () {
            $('.modal').fadeIn();
        });

        $('.modal').on('click', function (e) {
            if ($(e.target).hasClass('modal')) {
                $(this).fadeOut();
            }
        });

        $('#order-form').on('submit', function (e) {
            e.preventDefault();
            // Обработка формы и отправка данных на сервер
        });

        var cartData = {};

        function updateCartTotal() {
            var total = 0;
            for (var productId in cartData) {
                total += cartData[productId].quantity * cartData[productId].price;
            }
            $('.cart-total').text(total.toFixed(2));
        }

        function updateCartData(productId, price, delta) {
            if (!cartData[productId]) {
                cartData[productId] = {
                    quantity: 0,
                    price: price
                };
            }
            cartData[productId].quantity += delta;
            if (cartData[productId].quantity <= 0) {
                delete cartData[productId];
            }
            $('.checkout-btn').attr('data-cart', JSON.stringify(cartData));
        }

        $('.plus-btn').on('click', function () {
            var product = $(this).closest('.product');
            var productId = product.data('id');
            var price = parseFloat(product.find('.price').text());

            updateCartData(productId, price, 1);
            updateCartTotal();
        });

        $('.minus-btn').on('click', function () {
            var product = $(this).closest('.product');
            var productId = product.data('id');
            var price = parseFloat(product.find('.price').text());

            updateCartData(productId, price, -1);
            updateCartTotal();
        });
    });
</script>

</body>
</html>

