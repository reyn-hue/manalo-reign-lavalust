import axios from "axios";
const API = axios.create({ baseURL: "http://localhost:3000" });

// Signup
document.querySelector("form[action='/signup']")?.addEventListener("submit", async (e) => {
  e.preventDefault();
  const { username, email, password } = e.target;
  try {
    await API.post("/signup", { username: username.value, email: email.value, password: password.value });
    alert("Signup successful! Redirecting to login...");
    window.location.href = "/login";
  } catch (err) {
    alert("Signup failed: " + (err.response?.data || err.message));
  }
});

// Login
document.querySelector("form[action='/login']")?.addEventListener("submit", async (e) => {
  e.preventDefault();
  const { email, password } = e.target;
  try {
    await API.post("/login", { email: email.value, password: password.value });
    alert("Login successful! Redirecting to products...");
    window.location.href = "/products";
  } catch (err) {
    alert("Login failed: " + (err.response?.data || err.message));
  }
});

// Products CRUD (add/edit/delete) → same pattern as your products.php script
