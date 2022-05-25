<?php

$page_name = "장바구니";
session_start();

//작업용 임시
$_SESSION['login_user']['user_num'] = 1;

if (isset($_SESSION['login_user'])) {
    $login_user = $_SESSION['login_user'];
} else {
    echo "<script>
    alert('로그인 후 이용 가능합니다.');
    window.location.href = 'home.php';
    </script>";
}

$menu_num = $_POST['menu_num'];
$menu_count = $_POST['menu_count'];



?>
<script>
    let menuNum = <?= $menu_num ?>;
    let menuCount = <?= $menu_count ?>;
    console.log(menuNum + ":" + menuCount);
    let beforeCount = sessionStorage.getItem("<?= $menu_num ?>");
    console.log(beforeCount);
    if (beforeCount == null) {
        beforeCount = 0;
    }
    sessionStorage.setItem(menuNum, Number(beforeCount) + Number(menuCount));
    console.log(sessionStorage);
    let basketList = Object.keys(sessionStorage);
    console.log(basketList);
    let basketListJson = JSON.stringify(basketList);
    console.log(basketListJson);


    fetch(`shopping_basket_json.php?menus=${basketListJson}`)
        .then((response) => {
            return response.json();
        }).then((list) => {
            console.log(list);
            makeBasketBox(list);
        });
</script>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/screens/shopping_basket.css" />
    <link rel="stylesheet" href="css/styles_std.css">
    <title>장바구니</title>
</head>

<body>
    <div class="container">

        <header>
            <?php
            include_once "header.php";
            ?>
        </header>

        <main>
            <div class="basket-container">

            </div>
        </main>
        <div class="basket-payment">
            <div class="basket__touch"></div>
            <table>
                <tr>
                    <td>총 주문금액</td>
                    <td class="totalPrice price"></td>
                </tr>
                <tr>
                    <td>쿠폰 할인</td>
                    <td class="price">0원</td>
                </tr>
            </table>

            <hr class="payment__line">
            <div class="payment__sub-total">
                <div>Sub Total</div>
                <div class="totalPrice price"></div>
            </div>

            <div class="payment__button" onclick="goPayment()">결제하기</div>
        </div>
    </div>
</body>

</html>
<script>
    let totalPrice = 0;
    let prices = {};

    let basketContainer = document.querySelector('.basket-container');

    function makeBasketBox(list) {
        console.log(Object.keys(list));
        Object.keys(list).forEach((key) => {
            console.log(list[key]);
            let menuPhoto = list[key].menu_photo;
            let menuName = list[key].menu_nm;
            let storeName = list[key].store_nm;
            let subedPrice = list[key].subed_price;
            // console.log(subedPrice);
            prices[key] = subedPrice;
            let menuCount = sessionStorage[key];
            let sumPrice = subedPrice * menuCount;
            console.log(sumPrice);

            let basketBox = document.createElement('div');
            basketBox.className += 'basket__box';
            basketBox.id = `box${key}`;
            basketBox.innerHTML = ` 
                <div class="basket__img">
                    <img src="${menuPhoto}">
                </div>
                <div class="basket__menu-nm">${menuName}</div>
                <div class="basket__nm-price">
                    <div class="basket__store-nm">${storeName}</div>
                    <div class="basket__price" id="sumPrice${key}">${sumPrice}원</div>
                </div>
                <div class="basket__menu-count">
                    <div class="basket__change-count" onclick="changeCount(${key},0)">-</div>
                            
                    <div id='count${key}'>${menuCount}</div>
                            
                    <div class="basket__change-count" onclick="changeCount(${key},1)">+</div>
                </div>`;
            console.log(basketBox);
            basketContainer.append(basketBox);

            totalPrice += sumPrice;
            document.getElementsByClassName('totalPrice')[0].innerText = totalPrice + "원";
            document.getElementsByClassName('totalPrice')[1].innerText = totalPrice + "원";
            sessionStorage['totalPrice'] = totalPrice;

        });

    }

    function changeCount(key, pm) {

        let nowCount = sessionStorage.getItem(key);
        if (pm) {
            sessionStorage.setItem(Number(key), Number(nowCount) + 1);
            console.log("prices:");
            console.log(prices[key]);

            totalPrice = Number(totalPrice) + Number(prices[key]);
        } else {
            sessionStorage.setItem(Number(key), Number(nowCount) - 1);
            totalPrice -= prices[key];
        }
        console.log(sessionStorage);
        if (sessionStorage.getItem(key) == 0) {
            sessionStorage.removeItem(key);
            document.getElementById(`box${key}`).remove();
        } else {
            document.getElementById(`count${key}`).innerText = sessionStorage.getItem(key);
        }

        document.getElementById(`sumPrice${key}`).innerText = prices[key] * sessionStorage.getItem(key);
        document.getElementsByClassName('totalPrice')[0].innerText = totalPrice + "원";
        document.getElementsByClassName('totalPrice')[1].innerText = totalPrice + "원";
        sessionStorage['totalPrice'] = totalPrice;

    }

    function goPayment() {
        location.href = "payment.php";
    }
</script>