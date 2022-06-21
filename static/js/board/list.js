(function () {
  const trList = document.querySelectorAll("tbody > tr");

  //   const tr1 = trList[1]; 예시임
  //   console.log(tr1.dataset.i_board);
  trList.forEach(function (item) {
    item.addEventListener("click", () => {
      location.href = `/board/detail?i_board=${item.dataset.i_board}`;
    });
  });
})();
