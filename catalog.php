<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
    <style>body{margin:0;font-family:Arial,sans-serif;background-color:#f2f2f2}.container{margin:100px auto;max-width:940px;background-color:#fff;padding:20px;border-radius:10px;position:relative}.cart-icon{position:absolute;top:20px;right:20px;display:flex;align-items:center;justify-content:center;width:150px;height:50px;border-radius:5px;background-color:#ffd369;color:#fff;font-size:24px;text-align:center;cursor:pointer}.checkout{display:block;margin-top:10px;padding:10px 20px;border-radius:5px;background-color:#ffce00;color:#fff;font-size:20px;text-align:center;cursor:pointer}.product{display:flex;flex-direction:column;align-items:center;padding:20px;margin:20px;border:1px solid #e0e0e0;border-radius:10px;width:calc((100% / 2) - 30px);height:350px;text-align:center;overflow:hidden;position:relative}.product-image{width:100%;height:70%;margin-bottom:10px}.product-image img{width:100%;height:100%;object-fit:cover;border-radius:5px}.product-name{font-size:18px;font-weight:bold;margin-bottom:10px}.product-price{font-size:24px;font-weight:bold;margin-bottom:10px}.product-actions{display:flex;align-items:center;justify-content:center;margin-top:auto;margin-bottom:10px}.quantity-btn{width:30px;height:30px;margin:0 5px;background-color:#e0e0e0;border:none;border-radius:50%;font-size:16px;font-weight:bold;color:#555;cursor:pointer}.quantity-btn:hover{background-color:#ccc}.slick-slider{margin-top:80px;display:flex;flex-wrap:wrap;justify-content:space-between}.slick-prev:before,.slick-next:before{color:black}.slick-prev:before{content:'←';font-size:40px;position:absolute;top:50%;left:20px;transform:translate(0,-50%);z-index:1;cursor:pointer}.slick-next:before{content:'→';font-size:40px;position:absolute;top:50%;right:20px;transform:translate(0,-50%);z-index:1;cursor:pointer}.product-details{position:fixed;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,0.6);display:none;z-index:2}.product-details .product-details-container{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);background-color:#fff;padding:20px;border-radius:10px;display:flex;justify-content:center;align-items:center;flex-direction:column}.product-details .product-details-container .product-description{max-width:400px;margin-bottom:20px}.product-details .product-details-container .product-image-container{width:400px}.product-details .product-details-container .product-image-container img{width:100%}.close-details-btn{background-color:#ccc;color:#fff;padding:10px 20px;border-radius:5px;cursor:pointer;position:absolute;top:10px;right:10px}</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
</head>

<body>
<div class="container">
        <div class="cart-icon">
            <span>&#x1F6D2;</span>
            <span class="total-price">$0.00</span>
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
                <button class="checkout-btn">Details</button>
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
                <button class="checkout-btn">Details</button>
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
                <button class="checkout-btn">Details</button>
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
                <button class="checkout-btn">Details</button>
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
                <button class="product-detail">Подробнее</button>
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
                <button class="product-detail">Подробнее</button>
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
                <button class="product-detail">Подробнее</button>
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
                <button class="product-detail">Подробнее</button>
            </div>
        </div>
        <div class="slick-arrow-prev">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="slick-arrow-next">
            <i class="fas fa-chevron-right"></i>
        </div>
    </div>

    <div class="product-details-container">
  <div class="product-description">
    <h2>Product 5</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet lectus at justo consequat, vel bibendum est dapibus. Aenean semper ante ut tellus eleifend egestas. Fusce eu mauris tellus. Integer porta mi vel lorem iaculis faucibus. Donec rutrum ullamcorper ex id hendrerit. Sed in odio vitae felis varius accumsan. </p>
  </div>
  <div class="product-image-container">
    <img src="https://via.placeholder.com/400x400?text=Product+5" alt="Product 5">
  </div>
</div>
<div class="close-details-btn">Close</div>
</div>
</div>
</div>
<script>
    $(document).ready(function(){var e=$(".quantity-btn"),t=0;$("button.checkout-btn").click((function(){alert("Total Price: $"+t.toFixed(2))})),e.on("click",function(){var n=$(this).closest(".product"),i=n.find(".product-price").text().replace("$",""),o=parseFloat(i),s=$(this).hasClass("plus-btn");s?(n.find(".product-quantity").text(parseInt(n.find(".product-quantity").text())+1),t+=o):(parseInt(n.find(".product-quantity").text())>0&&(n.find(".product-quantity").text(parseInt(n.find(".product-quantity").text())-1),t-=o)),t=Math.max(t,0),$(".cart-icon span:nth-child(2)").text("$"+t.toFixed(2))}),$(".slick-slider").slick({arrows:!0,prevArrow:$(".slick-arrow-prev"),nextArrow:$(".slick-arrow-next"),slidesToShow:4,slidesToScroll:4,responsive:[{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:2}}]});var n=$(".product-details-nav a");n.click((function(e){e.preventDefault(),$(this).hasClass("active")||(n.removeClass("active"),$(this).addClass("active"),$(".product-details-tab").hide(),$($(this).attr("href")).fadeIn())}))});
</script>
<script src="js/slick.min.js"></script>
<script src="js/catalog.min.js"></script>
</body>
</html>