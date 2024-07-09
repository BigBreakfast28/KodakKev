document.getElementById('menu').onclick = function() {
    document.getElementById('homeDrop-content').style.display = "block";
};

document.getElementById('triangle-left').onclick = function() {
    document.getElementById('container').style.display = "block";
    document.getElementById('altContainer').style.display = "none";
}

document.getElementById('triangle-right').onclick = function() {
    document.getElementById('altContainer').style.display = "block";
    document.getElementById('container').style.display = "none";
}