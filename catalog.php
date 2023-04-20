<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2
        }

        .container {
            margin: 100px auto;
            max-width: 940px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            position: relative
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
            cursor: pointer
        }

        .slick-slider {
            margin-top: 80px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between
        }

        .slick-prev:before,
        .slick-next:before {
            color: black
        }

        .slick-prev:before {
            content: '←';
            font-size: 40px;
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translate(0, -50%);
            z-index: 1;
            cursor: pointer
        }

        .slick-next:before {
            content: '→';
            font-size: 40px;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translate(0, -50%);
            z-index: 1;
            cursor: pointer
        }

        .product {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            margin: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            width: calc((100% / 4) - 30px);
            height: 350px;
            text-align: center;
            overflow: hidden;
            position: relative
        }

        .product-image {
            width: 100%;
            height: 70%;
            margin-bottom: 10px
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px
        }

        .product-price {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px
        }

        .product-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: auto;
            margin-bottom: 10px
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            margin: 0 5px;
            background-color: #e0 e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            cursor: pointer;
            user-select: none;
            transition: 0.3s;
        }

        .quantity-btn:hover {
            background-color: #c0c0c0;
        }

        .quantity {
            margin: 0 10px;
        }

        .details-btn {
            display: inline-block;
            background-color: #ffd369;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .details-btn:hover {
            background-color: #f0c851;
        }

        .product-details {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            padding: 20px;
            text-align: left;
            border-radius: 10px;
            backface-visibility: hidden;
            transform-style: preserve-3d;
            transition: 0.6s;
        }

        .product.flip .product-details {
            display: block;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="cart-icon">🛒</div>
        <div class="slick-slider">
            <div class="slick-prev"></div>
            <!-- Add your product cards here -->
            <div class="slick-next"></div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.details-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.closest('.product').classList.toggle('flip');
            });
        });
    </script>
</body>

</html>