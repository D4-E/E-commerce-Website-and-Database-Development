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

        .cart-icon {
            font-size: 24px;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 100;
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

        .product.flipped {
            transform: rotateY(180deg);
        }

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
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin-top: 10px;
            cursor: pointer;
        }

        .details-btn:hover {
            background-color: #333;
        }

        .product-details {
            position: absolute;
            backface-visibility: hidden;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f2f2f2;
            transform: rotateY(180deg);
            opacity: 0;
            transition: all 0.5s;
        }

        .product.flipped .product-details {
            opacity: 1;
        }

        /* Ваши добавленные стили */
        .rectangle {
            width: 670px;
            border-radius: 20px;
            background-color: #f2f2f2;
            margin: 50px auto;
            padding:     50px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

        /* Другие стили */
        /* ... */

        .cart {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            z-index: 100;
            display: flex;
            align-items: center;
        }

        .cart-total {
            margin-left: 10px;
            font-size: 18px;
        }

        .checkout-btn {
            background-color: #ffd700;
            color: #000;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin-left: 20px;
            cursor: pointer;
        }

        .checkout-btn:hover {
            background-color: #ffc107;
        }

        .product h3 {
            margin: 0;
            font-size: 18px;
        }

        .product p {
            margin: 5px 0;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="cart">
        <span class="cart-icon">🛒</span>
        <span class="cart-total">0</span>
        <button class="checkout-btn" data-items="0">Оформить заказ</button>
    </div>
    <div class="rectangle">
        <div class="slick-slider">
            <?php foreach ($products as $product) : ?>
                <div class="product" data-id="<?php echo $product['id']; ?>">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p>Price: $<?php echo $product['price']; ?></p>
                    <div class="quantity-controls">
                        <button class="minus-btn">-</button>
                        <button class="plus-btn">+</button>
                    </div>
                    <button class="details-btn">Details</button>
                    <div class="product-details">
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
            $(this).closest('.product').toggleClass('flipped');
        });

        $('.plus-btn').on('click', function () {
            var cartIcon = $('.cart-icon');
            var currentItems = parseInt(cartIcon.attr('data-items'));
            cartIcon.attr('data-items', currentItems + 1);
            cartIcon.text('🛒 ' + (currentItems + 1));
        });

        $('.minus-btn').on('click', function () {
            var cartIcon = $('.cart-icon');
            var currentItems = parseInt(cartIcon.attr('data-items'));
            if (currentItems > 0) {
                cartIcon.attr('data-items', currentItems - 1);
                cartIcon.text('🛒 ' + (currentItems - 1));
            }
        });
    });
</script>
</body>
</html>
