let tabStatus = 1;
let tabStatus2 = 0;
let moveCount = 0;
// 0:총할인금액, 1:구독리스트
let divContainer2 = document.querySelector("#sub_manage_container2");
let subListContainer = document.querySelector("#sub_list_container");
console.log(subListContainer);
console.log(divContainer2);

getTotalSave();

function getTotalSave(m = 0) {
  if (tabStatus === 0 && tabStatus2 === 0) {
    return;
  }
  divContainer2.textContent = "";
  let divTextSave = document.createElement("div");

  let monthSave = getSaveData();
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

  getSaveGraph();

  tabStatus = 0;
  tabStatus2 = 0;
}

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
  tabStatus2 = 1;
  getTotalSave(moveCount);
}

function getSaveGraph() {
  if (tabStatus2 === 1) {
    return;
  }
  let divGraphSave = document.createElement("div");
  divGraphSave.innerHTML =
    '<canvas id="bar-chart" width="300" height="230"></canvas>';
  divContainer2.append(divGraphSave);
}

function getSubList() {
  console.log(tabStatus);
  if (tabStatus === 1) {
    return;
  }

  tabStatus = 1;
}

function makeSubList() {
  for (let i = 0; i < list.length; i++) {
    let divEachSub = document.createElement("div");
    let subHTML = `
  <div><img src='${list[i].menu_photo}'></div>
  <div>${list[i].menu_nm}</div>
  <div>사용가능 회수 ${list[i].remaining_count}</div>
  <div>${list[i].pay_date}~${list[i].end_date}</div>
  <div>총 할인금액 ${list[i].save_price}</div>
  <div>상세페이지</div>
  <div>예약하기</div>
  `;
    divEachSub.innerHTML = subHTML;
    subListContainer.append(divEachSub);
  }
}

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
