var
 sliderimg = document.querySelector('.slider-img');
var images = ['logotol.png',
'LogoJPT.png',
'favicon.png',
'about.jpg',
'about.jpg'];
var i=0;

function prev(){
    if(i=0) i = images.length;
    i--;
    return setImg();
}

function next(){
    if( i>= images.length-1) i= -1;
    i++;
    return setImg();
}

function setImg(){
    return sliderimg.setAttribute('src', 'iamges/' + iamges[i]);
}

