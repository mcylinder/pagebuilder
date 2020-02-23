require('./bootstrap');
const htmlToImage = require('html-to-image');

let spans;
const imgProc = [];
const imgData = [];
const axiosCalls = [];
const howWide = document.getElementById('howWide');

let callItem = 0;

const onresize = function() {
    howWide.innerHTML = document.body.clientWidth;

    if (document.body.clientWidth >= 1280 && typeof spans === 'undefined') {
        spans = document.querySelectorAll('span.brick');
        spans.forEach(brickNode => {
            const brick_id = brickNode.getAttribute('data-brick_id');

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
                            console.log(row);
                            if (imgData.length === callItem) {
                                window.location.replace("/admin/bricks");
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                        }),
                );
            });
        });

        Promise.all(axiosCalls);
    }
};

window.addEventListener('resize', onresize);
onresize();
