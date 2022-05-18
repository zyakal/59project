let moveCount = 0;
//총할인금액 월 변경을 체크 위한 변수

let divContainer1 = document.querySelector(".total-save-price__container");
let divContainer2 = document.querySelector(".month-save-price__container");
let subListContainer = document.querySelector(".sub-list__container");
let monthSave = getSaveData();

console.log(list);
getTotalSave();
printSubList();
//첫화면 총할인금액,구독리스트(display:none) 출력

//총할인금액 출력 함수
function getTotalSave(m = 0) {
  console.log("getTotalSave");
  divContainer1.style.display = "block";
  divContainer2.textContent = "";
  subListContainer.style.display = "none";
  let divTextSave = document.createElement("div");

  let key = monthSave.keys.length - 1 + m;

  divTextSave.innerHTML = `<div>
    <div>
      <div onclick="moveMonth(0,${key})"><</div>
      <div>${monthSave.keys[key]}</div>
      <div onclick="moveMonth(1,${key})">></div>
    </div>
    <div>월 할인금액 ${monthSave[monthSave.keys[key]]}</div>
  </div> 
  `;
  divContainer2.append(divTextSave);
}

//구독리스트출력함수
function printSubList() {
  for (let i = 0; i < list.length; i++) {
    let ValidityCheck = new Date(list[i].end_date + " 23:59:59") - new Date();
    console.log(ValidityCheck);
    if (ValidityCheck < 0) {
      continue;
    }

    let divEachSub = document.createElement("div");
    let subHTML = `
<div><img src='${list[i].menu_photo}'></div>
<div>${list[i].menu_nm}</div>
<div>사용가능 회수 ${list[i].remaining_count}</div>
<div>${list[i].pay_date}~${list[i].end_date}</div>
<div>총 할인금액 ${list[i].save_price}</div>
<div>상세페이지</div>
<div onclick="moveToReservation(${i})">예약하기</div>
`;
    divEachSub.innerHTML = subHTML;
    subListContainer.append(divEachSub);
  }
}

//총할인금액-월 변경
function moveMonth(n, key) {
  if (n) {
    moveCount += 1;
  } else {
    moveCount -= 1;
  }
  if (moveCount > 0) {
    moveCount -= 1;
    return;
  } else if (moveCount < -key - 2) {
    moveCount += 1;
  }
  getTotalSave(moveCount);
}

//구독리스트 display 스위치
function getSubList() {
  console.log("getSubList");
  divContainer1.style.display = "none";
  subListContainer.style.display = "block";
}

//예약페이지이동
function moveToReservation(i) {
  // console.log(list[i].store_num, list[i].sub_num, list[i].menu_num);
  document.getElementById("store_num").value = list[i].store_num;
  document.getElementById("sub_num").value = list[i].sub_num;
  document.getElementById("menu_num").value = list[i].menu_num;
  document.getElementById("remaining_count").value = list[i].remaining_count;

  document.getElementById("info_form").submit();

  // location.href = "reservation.php";
}

//월별 할인금액 데이터산출
function getSaveData() {
  let savePriceMonth = {};
  savePriceMonth["keys"] = [];
  for (let i = 0; i < list.length; i++) {
    let endAt = list[i].end_date;
    let payAt = list[i].pay_date.substr(0, 10);
    let endDate = new Date(endAt);
    let payDate = new Date(payAt);

    let eachSubStartMonth = payDate.getMonth();
    let eachSubStartYear = payDate.getFullYear();
    let nextMonthFirst = new Date(
      eachSubStartYear,
      eachSubStartMonth + 1,
      1,
      09
    );

    let thisMonthDays = (nextMonthFirst - payDate) / (24 * 60 * 60 * 1000);
    let eachSubDays = (endDate - payDate) / (24 * 60 * 60 * 1000);
    let nextMonthDays = eachSubDays - thisMonthDays;
    let daySavePrice = list[i].save_price / eachSubDays;

    let textThisMonth =
      eachSubStartMonth + 1 < 10
        ? "0" + (eachSubStartMonth + 1)
        : eachSubStartMonth + 1;

    let textNextMonth =
      nextMonthFirst.getMonth() + 1 < 10
        ? "0" + (nextMonthFirst.getMonth() + 1)
        : nextMonthFirst.getMonth() + 1;

    if (
      typeof savePriceMonth[`${eachSubStartYear}.${textThisMonth}`] ===
      "undefined"
    ) {
      savePriceMonth[`${eachSubStartYear}.${textThisMonth}`] = 0;
      savePriceMonth["keys"].push(`${eachSubStartYear}.${textThisMonth}`);
    }
    savePriceMonth[`${eachSubStartYear}.${textThisMonth}`] +=
      daySavePrice * thisMonthDays;

    if (
      typeof savePriceMonth[`${eachSubStartYear}.${textNextMonth}`] ===
      "undefined"
    ) {
      savePriceMonth[`${eachSubStartYear}.${textNextMonth}`] = 0;
      savePriceMonth["keys"].push(`${eachSubStartYear}.${textNextMonth}`);
    }
    savePriceMonth[`${eachSubStartYear}.${textNextMonth}`] +=
      daySavePrice * nextMonthDays;
  }

  let savePriceMonthCeil = {};
  savePriceMonthCeil["keys"] = savePriceMonth["keys"];

  for (let j = 0; j < savePriceMonth["keys"].length; j++) {
    savePriceMonthCeil[`${savePriceMonth["keys"][j]}`] = Math.ceil(
      savePriceMonth[`${savePriceMonth["keys"][j]}`]
    );
  }

  return savePriceMonthCeil;
}

console.log(monthSave.keys);

let monthSaveVals = [];
monthSave.keys.forEach((val) => {
  monthSaveVals.push(monthSave[`${val}`]);
});
console.log(monthSaveVals);

new Chart(document.getElementById("bar-chart"), {
  type: "bar",
  data: {
    labels: monthSave.keys,
    datasets: [
      {
        // label: "Population (millions)",
        backgroundColor: "#3cba9f",
        data: monthSaveVals,
      },
    ],
  },
  options: {
    legend: { display: false },
    title: {
      // display: true,
      // text: "Predicted world population (millions) in 2050",
    },
  },
});
