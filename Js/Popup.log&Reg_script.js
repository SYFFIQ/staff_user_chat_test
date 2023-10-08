// Get the login popup element
const loginPopup = document.getElementById("loginPopup");
// Get the register popup element
const registerPopup = document.getElementById("registerPopup");

// Get the login button element
const loginButton = document.getElementById("loginButton");
// Get the login close button element
const loginClose = document.getElementById("loginClose");
// Get the register link element
const registerLink = document.getElementById("registerLink");

// Get the register close button element
const registerClose = document.getElementById("registerClose");
// Get the login link element
const loginLink = document.getElementById("loginLink");

// Get the order link element
const orderButton1 = document.getElementById("orderButton1");
const orderButton2 = document.getElementById("orderButton2");
const orderButton3 = document.getElementById("orderButton3");
const orderButton4 = document.getElementById("orderButton4");
const orderButton5 = document.getElementById("orderButton5");
const orderButton6 = document.getElementById("orderButton6");


// Function to open the login popup
const openLoginPopup = () => {
  loginPopup.style.display = "block";
};

// Function to close the login popup
const closeLoginPopup = () => {
  loginPopup.style.display = "none";
};

// Function to open the register popup
const openRegisterPopup = () => {
  loginPopup.style.display = "none";
  registerPopup.style.display = "block";
};

// Function to close the register popup
const closeRegisterPopup = () => {
  registerPopup.style.display = "none";
};

// Function to switch from register popup to login popup
const switchToLoginPopup = () => {
  registerPopup.style.display = "none";
  openLoginPopup();
};

// Attach event listeners
loginButton.addEventListener("click", openLoginPopup);
loginClose.addEventListener("click", closeLoginPopup);
registerLink.addEventListener("click", openRegisterPopup);
registerClose.addEventListener("click", closeRegisterPopup);
loginLink.addEventListener("click", switchToLoginPopup);
orderButton1.addEventListener("click",openLoginPopup)
orderButton2.addEventListener("click",openLoginPopup)
orderButton3.addEventListener("click",openLoginPopup)
orderButton4.addEventListener("click",openLoginPopup)
orderButton5.addEventListener("click",openLoginPopup)
orderButton6.addEventListener("click",openLoginPopup)
