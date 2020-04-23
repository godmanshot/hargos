var networkInformationApiPolyfill = require("network-information-api-polyfill");
var type;
var asyncImages = document.getElementsByClassName('asyncImage');
new NetworkInformationApiPolyfill().then(connection => {
    type = connection.effectiveType;
    connection.addEventListener('change', updateConnectionStatus);
    
    for (const asyncImage of asyncImages) {
        loadImage(asyncImage, type, false);
    }

});

function updateConnectionStatus(e) {
    if(parseInt(e.target.effectiveType) > parseInt(type)) {
    for (const asyncImage of asyncImages) {
        loadImage(asyncImage, e.target.effectiveType, false);
    }
  }
  type = e.target.effectiveType;
}

function loadImage(image, connection, start) {
    let dataSrc = image.getAttribute('data-src').split('/');
    if(!start) {
        dataSrc[dataSrc.length - 1] = dataSrc[dataSrc.length - 1];
    } else {
        dataSrc[dataSrc.length - 1] = connection + '_' + dataSrc[dataSrc.length - 1];
    }
    dataSrc = dataSrc.join('/');
    if(image.classList.contains('async-lazy')) {
        if(image.classList.contains('async-figure')) {
            image.parentNode.style.backgroundImage = 'url(' + dataSrc + ')';
        } else {
            image.setAttribute('data-lazy', dataSrc);
            console.log(image)
        }
    } else {
        if(image.classList.contains('async-figure')) {
            image.parentNode.style.backgroundImage = 'url(' + dataSrc + ')';
        } else {
            image.src = dataSrc;
        }
    }
}