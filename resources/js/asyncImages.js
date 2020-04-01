var networkInformationApiPolyfill = require("network-information-api-polyfill");
var type;
var asyncImages = document.getElementsByClassName('asyncImage');
new NetworkInformationApiPolyfill().then(connection => {
    type = connection.effectiveType;
    connection.addEventListener('change', updateConnectionStatus);
    
    for (const asyncImage of asyncImages) {
        loadImage(asyncImage, type);
    }

});

function updateConnectionStatus(e) {
    if(parseInt(e.target.effectiveType) > parseInt(type)) {
    for (const asyncImage of asyncImages) {
        loadImage(asyncImage, e.target.effectiveType);
    }
  }
  type = e.target.effectiveType;
}

function loadImage(image, connection) {
    let dataSrc = image.getAttribute('data-src').split('/');
    dataSrc[dataSrc.length - 1] = connection + '_' + dataSrc[dataSrc.length - 1];
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