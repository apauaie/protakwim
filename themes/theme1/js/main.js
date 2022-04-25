document.querySelector(".content").style.minHeight = window.innerHeight + "px";

document.querySelector(".content .up").style.minHeight =
    window.innerHeight -
    document.querySelector(".content .down").offsetHeight +
    "px";

window.addEventListener("resize", () => {
    document.querySelector(".content").style.minHeight =
        window.innerHeight + "px";

    document.querySelector(".content .up").style.minHeight =
        window.innerHeight -
        document.querySelector(".content .down").offsetHeight +
        "px";
});
