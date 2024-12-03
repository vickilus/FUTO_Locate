function togglePasswordVisibility() {
    const passwordField = document.getElementById("password");
    const passwordType = passwordField.getAttribute("type");

    if (passwordType === "password") {
        passwordField.setAttribute("type", "text");
    } else {
        passwordField.setAttribute("type", "password");
    }
}
