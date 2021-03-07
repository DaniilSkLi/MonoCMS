window.addEventListener('load', hideLoading, false);
function hideLoading() {
    document.querySelector("#loading").style.opacity = "0";
    setTimeout(DispLoading, 200);
}
function DispLoading() {
    document.querySelector("#loading").style.display = "none";
}