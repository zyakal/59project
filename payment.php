<?php
$page_name = "결제하기";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles_std.css">
    <link rel="stylesheet" href="css/screens/payment.css">
    <title>결제하기</title>
</head>

<body>
    <div class="container">

        <header>
            <?php
            include_once "header.php";
            ?>
        </header>

        <main>
            <form action="#">
                <!-- 요청사항 -->
                <div class="payment__comment">
                    <h2>요청사항</h2>
                    <div>
                        <input type="text" name="order" id="order" placeholder="예) 동일한 가격의 카페라떼로 바꿔주세요">
                    </div>
                </div>
                <!-- 결제수단 -->
                <div class="payment__how">
                    <h2>결제수단</h2>
                    <div class="payment__three">
                        <div class="payment__cacao not-ready">카카오로 계산하기</div>
                        <div class="payment__naver not-ready">네이버로 계산하기</div>
                        <div class="payment__payco not-ready">PAYCO 계산하기</div>
                    </div>
                </div>
                <div class="payment__coupon">
                    <h2>할인쿠폰</h2>
                    <div class="payment__select-box">
                        <select name="coupon" id="coupon">
                            <option value="none">1개 보유</option>
                            <option value="1">1000원 할인쿠폰</option>
                        </select>
                    </div>
                </div>
            </form>
        </main>
        <div class="basket-payment">
            <div class="basket__touch"></div>


            <div class="payment__button" onclick="goPayment()">결제하기</div>
        </div>
</body>

</html>

<script>
    let totalPrice = sessionStorage['totalPrice'];
    document.querySelector('.payment__button').textContent = `${totalPrice}원 결제하기`;

    function goPayment() {
        alert('준비중입니다');

    }
</script>