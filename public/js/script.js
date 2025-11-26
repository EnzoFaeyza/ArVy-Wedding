let up_letter = document.getElementsByClassName("up-letter")[0];
let down_letter = document.getElementsByClassName("down-letter")[0];
let scroll_text = document.getElementsByClassName("scroll-text")[0];

window.addEventListener("scroll", () => {
    let value = window.scrollY;
    up_letter.style.top = 0 - value * 0.5 + "px";
    down_letter.style.top = 0 + value * 0.5 + "px";
    scroll_text.style.bottom = 100 - value * 0.5 + "px";
});

let up_hp = document.getElementById("up");
let down_hp = document.getElementById("down");

function updateImage() {
    const up_src_hp = up_hp.getAttribute("data-src-hp");
    const down_src_hp = down_hp.getAttribute("data-src-hp");
    const up_src_pc = up_hp.getAttribute("data-src-pc");
    const down_src_pc = down_hp.getAttribute("data-src-pc");
    if (window.innerWidth < 600) {
        up_hp.src = up_src_hp;
        down_hp.src = down_src_hp;
    } else {
        up_hp.src = up_src_pc;
        down_hp.src = down_src_pc;
    }
}

window.addEventListener("resize", updateImage);
window.addEventListener("load", updateImage);
setTimeout(updateImage, 3000);

const menu = document.getElementsByClassName("menu")[0];
const close = document.getElementsByClassName("close")[0];
const nav = document.getElementById("nav");

menu.addEventListener("click", () => {
    nav.classList.add("buka");
    menu.classList.add("tertutup");
});

close.addEventListener("click", () => {
    nav.classList.remove("buka");
    menu.classList.remove("tertutup");
});

//toast
// Auto hide notifications after 3 seconds
document.addEventListener("DOMContentLoaded", function () {
    const notifications = document.querySelectorAll(".animate-slide-in");
    notifications.forEach((notification) => {
        setTimeout(() => {
            notification.classList.add("animate-slide-out");
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000); // ← Ini yang diubah dari 5000 menjadi 3000
    });
});
