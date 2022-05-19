function check_reserve(user_num) {
  setInterval(function () {
    //인터벌로 실행될 코드
    fetch("../json_now_reservation_for_user.php?user_num=1")
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
  // if (관리자일때) {
  //   alert('');
  // } else if (일반유저일때) {
  // }
}

check_reserve();
