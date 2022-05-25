let weekButtons = document.querySelectorAll(".listing-card__info__week");

weekButtons.forEach((weekButton, index) => {
  weekButton.addEventListener("click", () => {
    if (weekButtons[index].classList == "listing-card__info__week") {
      weekButtons[index].classList.add("active");
    } else {
      weekButtons[index].classList.remove("active");
    }
  });
});

let tabs = document.querySelectorAll(".tabs__toggle"),
  contents = document.querySelectorAll(".tabs__content");

tabs.forEach((tab, index) => {
  tab.addEventListener("click", () => {
    contents.forEach((content) => {
      content.classList.remove("is-active");
    });
    tabs.forEach((tab) => {
      tab.classList.remove("is-active");
    });
    contents[index].classList.add("is-active");
    tabs[index].classList.add("is-active");
  });
});
