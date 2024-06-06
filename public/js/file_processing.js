function uploadFile(imgSelector, imgEl) 
{
    console.log("Y");

    let imgFile = document.querySelector(imgSelector).files[0];

    let formData = new FormData();
    formData.append('image', imgFile);

    console.log(formData);
    console.log(imgFile);
    
}

/**
 * Function gets selected file from '<input type="file" id="fileSelector">'
 * And put this file to the element '<img src="" id="imageSelector">'
 * @param {*} fileSelector 
 * @param {*} imageSelector 
 */
function loadFile(fileSelector, imageSelector) {
    let imgFile = document.querySelector(fileSelector).files[0];
    let imgEl = document.querySelector(imageSelector);
    imgEl.src = window.URL.createObjectURL(imgFile);
}