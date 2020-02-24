const htmlToImage = require('html-to-image'),
imgProc = [],
imgData = [],
axiosCalls = [],
howWide = document.getElementById('howWide');

let callItem = 0,
spans = null;

const onresize = function() {
    howWide.innerHTML = document.body.clientWidth;

    if (document.body.clientWidth >= 1280 && spans === null) {
        convertHtmlImage();
    }
};

const convertHtmlImage = function() {
     spans = document.querySelectorAll('span.brick'),spans = document.querySelectorAll('span.brick');

    imagesHaveLoaded();

    spans.forEach(brickNode => {
        let brick_id = brickNode.getAttribute('data-brick_id');

        imgProc.push(
            htmlToImage
                .toPng(brickNode)
                .then(function(dataUrl) {
                    imgData.push({ id: brick_id, dataUrl: dataUrl });
                })
                .catch(function(error) {
                    console.error('oops, something went wrong!', error);
                }),
        );
    });

    Promise.all(imgProc).then(x => {
        imgData.forEach(row => {
            axiosCalls.push(
                axios
                    .post('/api/saveimage', row)
                    .then(function(response) {
                        callItem++;
                        if (imgData.length === callItem) {
                            window.location.replace('/admin/bricks');
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    }),
            );
        });
    });

    Promise.all(axiosCalls);
};

const imagesHaveLoaded = function() {
    return Array.from(document.images).every(i => i.complete);
};

window.addEventListener('resize', onresize);
onresize();
