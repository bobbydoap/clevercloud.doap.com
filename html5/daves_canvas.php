<script>
var surface;
var cloud2;
var happy;
var sunshine;
var sx = 790;  
var sy = 30;

var tx = 0;
var ty = 90;

var x = 50;
var y = 10;


var dirSX = .1;
var dirSY = .1;
var dirTX = .1;
var dirTY = .1;
var dirX = .1;
var dirY = .1;
//var sun1x = 231;
//var sun1y = 218;

function drawCanvas() {
    // Get our Canvas element
    surface = document.getElementById("doapify");

    if (surface.getContext) {
        // If Canvas is supported, load the images
        sunshine = new Image();
        sunshine.onload = loadingComplete;
        sunshine.src = "images/sun.gif";
    }


    if (surface.getContext) {
        // If Canvas is supported, load the images
        happy = new Image();
        happy.onload = loadingComplete;
        happy.src = "images/puffy_cloud.gif";
    }

if (surface.getContext) {
        // If Canvas is supported, load the images
        cloud2 = new Image();
        cloud2.onload = loadingComplete;
        cloud2.src = "images/puffy_cloud.gif";
    }

}

function loadingComplete(e) {
    // When the image has loaded begin the loop
    setInterval(loop, 25);
}

function loop() {
    // Each loop we move the image by altering its x/y position

    // Grab the context
    var surfaceContext = surface.getContext('2d');
    // Clear the canvas to White
    //surfaceContext.fillStyle = "rgb(157,234,77)"; //oldgreen
    surfaceContext.fillStyle = "rgb(57,176,222)"; //sky
    //surfaceContext.fillStyle = "rgba(0, 0, 200, 0.0)"; //transparency
    //aCanvas.style.border = "red 1px solid"; //uncomment outline edges of canvas

    surfaceContext.fillRect(0, 0, surface.width, surface.height);

    // Draw the images

surfaceContext.moveTo(sx, sy);
surfaceContext.drawImage(sunshine, sx, sy);
surfaceContext.moveTo(x, y);
surfaceContext.globalAlpha=0.8;
surfaceContext.drawImage(happy, x, y);
surfaceContext.globalAlpha=1;
surfaceContext.moveTo(tx, ty);
surfaceContext.drawImage(cloud2, tx, ty);

    x += dirX;
    y += dirY;

    sx += dirSX;
    sy += dirSY;


    tx += dirTX;
    ty += dirTY;

    if (x <= 0 || x > 1260 - 700) {
        dirX = -dirX;
    }
    if (y <= 0 || y > 195 - 180) {
        dirY = -dirY;
    }

    if (sx <= 0 || sx > 1260 - 700) {
        dirSX = -dirSX;
    }
    if (sy <= 0 || sy > 220 - 190) {
        dirSY = -dirSY;
    }

    if (tx <= 0 || tx > 1260 - 700) {
        dirTX = -dirTX;
    }
    if (ty <= 0 || ty > 200 - 187) {
        dirTY = -dirTY;
    }

}
//Math.round(Math.random() * 100) / 100) rgba randomizer i think
</script>