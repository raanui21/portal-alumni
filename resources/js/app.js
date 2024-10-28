import "./bootstrap";

//ckeditor script cant be here idk why

//just some styling for sidebar
let btn = document.querySelector("#menubtn");
let sidebar = document.querySelector(".sidebar");

btn.onclick = function () {
    sidebar.classList.toggle("active");
};

//when refresh clear the search parameter
window.addEventListener("load", function () {
    const url = new URL(window.location);
    const searchParams = new URLSearchParams(url.search);
    if (searchParams.has("search")) {
        searchParams.delete("search");
        window.history.replaceState({}, document.title, url.pathname);
    }
});
