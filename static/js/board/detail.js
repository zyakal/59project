(function () {
  const btnSel = document.querySelector("#btnDel");
  const iboard = document.querySelector("td");
  console.log(iboard.innerText);
  btnSel.addEventListener("click", () => {
    if (confirm("삭제하시겠습니까?")) {
      location.href = `/board/del?i_board=${iboard.innerText}`;
    }
  });
})();
