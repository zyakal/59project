let totalPrice = 0;
let prices = {};

function makeBasketBox(list) {
  let basketContainer = document.querySelector(".basket-container");

  // console.log(Object.keys(list));
  Object.keys(list).forEach((key) => {
    // console.log(list[key]);
    let menuPhoto = list[key].menu_photo;
    let menuName = list[key].menu_nm;
    let storeName = list[key].store_nm;
    let subedPrice = list[key].subed_price;
    // console.log(subedPrice);
    prices[key] = subedPrice;
    let menuCount = sessionStorage[key];
    let sumPrice = subedPrice * menuCount;
    console.log(sumPrice);

    let basketBox = document.createElement("div");
    basketBox.className += "basket__box";
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

    basketContainer.append(basketBox);

    totalPrice += sumPrice;
    document.getElementsByClassName("totalPrice")[0].innerText =
      totalPrice + "원";
    document.getElementsByClassName("totalPrice")[1].innerText =
      totalPrice + "원";
    sessionStorage["totalPrice"] = totalPrice;
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
  // console.log(sessionStorage);
  if (sessionStorage.getItem(key) == 0) {
    sessionStorage.removeItem(key);
    document.getElementById(`box${key}`).remove();
  } else {
    document.getElementById(`count${key}`).innerText =
      sessionStorage.getItem(key);
  }

  document.getElementById(`sumPrice${key}`).innerText =
    prices[key] * sessionStorage.getItem(key);
  document.getElementsByClassName("totalPrice")[0].innerText =
    totalPrice + "원";
  document.getElementsByClassName("totalPrice")[1].innerText =
    totalPrice + "원";
  sessionStorage["totalPrice"] = totalPrice;
}

function goPayment() {
  location.href = "payment.php";
}
function setScroll() {
  let payBoxH = document.querySelector(".basket-payment").clientHeight;
  document.querySelector(".basket-container").style.paddingBottom = payBoxH + 5;
}
