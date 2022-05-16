// <div class="day-box"></div>
// <div class="time-box"></div>

function makeTimeBox(howManyDays = 30, howManyTimes = 48, requiredTimeMin = 0) {
  let divDayContainer = document.querySelector(".day-box");
  let divTimeContainer = document.querySelector(".time-box");

  let orderStartTime = new Date();
  // console.log orderStartTime);
  orderStartTime.setMinutes(orderStartTime.getMinutes() + requiredTimeMin);

  let year = orderStartTime.getFullYear(); // 년도
  let month = orderStartTime.getMonth(); // 월
  let date = orderStartTime.getDate(); // 날짜
  let hours = orderStartTime.getHours(); // 시
  let minutes = orderStartTime.getMinutes(); // 분

  // console.log(new Date());
  // console.log(orderStartTime);

  let min30;
  let hour30;
  if (minutes < 30) {
    min30 = 30;
    hour30 = hours;
  } else if (minutes < 60) {
    min30 = 0;
    hour30 = hours + 1;
  }

  // console.log(new Date(year, month, date, hour30, min30));

  function makeResTimes(n) {
    for (let i = 0; i < n; i++) {
      let resTime = new Date(year, month, date, hour30, min30 + i * 30);
      let resDay = resTime.getDate();
      let resHour = resTime.getHours();
      let resMinutes = resTime.getMinutes();

      if (resHour == 0) {
        break;
      }

      resMinutes = resMinutes ? resMinutes : "00";
      if (resHour < 10) {
        resHour = "0" + resHour;
      }

      let divTimeBox = document.createElement("div");
      divTimeBox.innerText = resHour + ":" + resMinutes;
      divTimeContainer.append(divTimeBox);
    }
  }
  function makeResDays(n) {
    for (let i = 0; i < n; i++) {
      orderStartTime.setDate(orderStartTime.getDate() + (i ? 1 : 0));
      pickupDate = orderStartTime.getDate();
      let divDayBox = document.createElement("div");
      divDayBox.className = "day_num";
      divDayBox.innerText = pickupDate;
      divDayContainer.append(divDayBox);
      console.log(pickupDate);
    }
  }
  makeResDays(howManyDays);
  makeResTimes(howManyTimes);
}
