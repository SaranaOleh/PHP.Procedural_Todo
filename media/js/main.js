
var lastLi = document.querySelector(".list li:last-child");

if(lastLi !== null){
    lastLi.style.top = -(lastLi.offsetHeight + 30) +"px";
    var start = -(lastLi.offsetHeight + 30);
    var step = 500/40;
    var height = lastLi.offsetHeight/step;
    setInterval(function () {
        var range = Math.round(start += height);
        if(start >= 0){
            clearInterval();
            return;
        }
        lastLi.style.top = range +"px";
    },40);
}
