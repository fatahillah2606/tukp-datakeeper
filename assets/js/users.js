// Define
let userRole = document.querySelectorAll(".role");

// whoiam?
userRole.forEach((e) => {
  if (e.innerHTML === "Admin") {
    e.classList.add("admin");
  }
});
