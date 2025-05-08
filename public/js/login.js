function validateForm() {
  const username = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value.trim();

  if (!username && !password) {
    alert("Username dan Password tidak boleh kosong!");
    return false;
  }

  if (!username) {
    alert("Username tidak boleh kosong!");
    return false;
  }

  if (!password) {
    alert("Password tidak boleh kosong!");
    return false;
  }

  return true; // lanjutkan submit
}
