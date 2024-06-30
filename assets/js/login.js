let kataSandi = document.querySelector("#password");
let showPass = document.querySelector("#show-pass");
showPass.addEventListener("click", function () {
  if (showPass.checked) {
    kataSandi.setAttribute("type", "text");
  } else {
    kataSandi.setAttribute("type", "password");
  }
});
