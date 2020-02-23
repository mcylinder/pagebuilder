require('./bootstrap');
var htmlToImage = require('html-to-image');

var spans = document.querySelectorAll('span.brick'),i;

for (i = 0; i < spans.length; ++i) {
    var brickNode = spans[i];
    var brick_id = brickNode.getAttribute('data-brick_id');
    

    htmlToImage
        .toPng(brickNode.firstElementChild)
        .then(function(dataUrl) {
            console.log(dataUrl);
            var img = new Image();
            img.src = dataUrl;
            document.body.appendChild(img);
        })
        .catch(function(error) {
            console.error('oops, something went wrong!', error);
        });
}
