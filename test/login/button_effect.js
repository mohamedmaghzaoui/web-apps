//js code for button ripple effect
const sign = document.querySelector(".sign");
sign.addEventListener("mouseover", (event) => {
  const x = event.pageX - sign.offsetLeft;
  const y = event.pageY - sign.offsetTop;

  sign.style.setProperty("--posx", x + "px");
  sign.style.setProperty("--posy", y + "px");
});
