const passwd = document.querySelectorAll(".passwd");
const showpass = document.querySelector(".show-pass");

showpass.addEventListener("change", () => {
    passwd.forEach(element => {
        if (element.type === "password") {
            element.type = "text";
        } else if (element.type === "text") {
            element.type = "password"
        }
    });
})

