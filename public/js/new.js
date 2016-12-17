function image(imageSrc) {
    this.imageSrc = imageSrc;

}
var imageSlider_counter = 0;
var imageDataList = new Array();
var timerId;

function Ready() {
    document.getElementById("imageSlider").innerHTML = "<img id='imageSlider-image' src=''/>";
    timerId = setInterval(function() {
        document.getElementById('imageSlider-image').src = imageDataList[imageSlider_counter].imageSrc;
        imageSlider_counter = (imageSlider_counter + 1) % imageDataList.length;

    }, 3000);

}
imageDataList.push(new image("../img/slider/apple2.jpg"));
imageDataList.push(new image("../img/slider/ice.jpg"));
imageDataList.push(new image("../img/slider/apple1.jpg"));
imageDataList.push(new image("../img/slider/apple3.jpg"));

function stop() {
    setTimeout(function() {
        clearInterval(timerId);
    });
}

function start() {
    timerId = setInterval(function() {
        document.getElementById('imageSlider-image').src = imageDataList[imageSlider_counter].imageSrc;
        imageSlider_counter = (imageSlider_counter + 1) % imageDataList.length;

    }, 3000);

}