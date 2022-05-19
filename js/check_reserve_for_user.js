function check_reserve_for_user(user_num) {
  setInterval(function () {
    //인터벌로 실행될 코드
    fetch(`../json_now_reservation_for_user.php?${user_num}`)
      .then((response) => {
        return response.json();
      })
      .then((nowRes) => {
        // if (nowRow)
        whenNewReservation(nowRes);
        // alert("알림");
      });
  }, 5000);
}

function whenNewReservation(nowRes) {
  console.log(nowRes);
}

check_reserve(1);
