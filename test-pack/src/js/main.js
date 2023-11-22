import Swiper from 'swiper';

// selector of all videos on the page
const videos = document.querySelectorAll('.video');

// generate video url
let generateUrl = function (id) {
    let query = '?rel=0&showinfo=0&autoplay=1';

    return 'https://www.youtube.com/embed/' + id + query;
};

// creating iframe
let createIframe = function (id) {
    let iframe = document.createElement('iframe');

    iframe.setAttribute('allowfullscreen', '');
    iframe.setAttribute('allow', 'autoplay; encrypted-media');
    iframe.setAttribute('src', generateUrl(id));

    return iframe;
};

// main code
videos.forEach((el) => {
    let videoHref = el.getAttribute('data-video');

    let deletedLength = 'https://youtu.be/'.length;

    let videoId = videoHref.substring(deletedLength, videoHref.length);

    let img = el.querySelector('img');
    //let youtubeImgSrc = 'https://i.ytimg.com/vi/' + videoId + '/maxresdefault.jpg';
    //img.setAttribute('src', youtubeImgSrc);

    el.addEventListener('click', (e) => {
        e.preventDefault();

        let iframe = createIframe(videoId);
        el.querySelector('img').remove();
        el.appendChild(iframe);
        el.querySelector('button').remove();
    });
});

$(document).ready(function () {

    var swiper = new Swiper(".reviews__slider", {
        slidesPerView: 2,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        pagination: {
            el: ".swiper-pagination",
            //dynamicBullets: true,
            clickable: true,
        },

        breakpoints: {

            1200: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            768: {
                spaceBetween: 0,
                slidesPerView: 1,
            },
            320: {
                spaceBetween: 0,
                slidesPerView: 1,
            }
        }
    });

});


// Проверяем, можно ли использовать Webp формат
function canUseWebp() {
    // Создаем элемент canvas
    let elem = document.createElement('canvas');
    // Приводим элемент к булеву типу
    if (!!(elem.getContext && elem.getContext('2d'))) {
        // Создаем изображение в формате webp, возвращаем индекс искомого элемента и сразу же проверяем его
        return elem.toDataURL('image/webp').indexOf('data:image/webp') == 0;
    }
    // Иначе Webp не используем
    return false;
}

window.onload = function () {
    // Получаем все элементы с дата-атрибутом data-bg
    let images = document.querySelectorAll('[data-bg]');
    // Проходимся по каждому
    for (let i = 0; i < images.length; i++) {
        // Получаем значение каждого дата-атрибута
        let image = images[i].getAttribute('data-bg');
        // Каждому найденному элементу задаем свойство background-image с изображение формата jpg
        images[i].style.backgroundImage = 'url(' + image + ')';
    }

    // Проверяем, является ли браузер посетителя сайта Firefox и получаем его версию
    let isitFirefox = window.navigator.userAgent.match(/Firefox\/([0-9]+)\./);
    let firefoxVer = isitFirefox ? parseInt(isitFirefox[1]) : 0;

    // Если есть поддержка Webp или браузер Firefox версии больше или равно 65
    if (canUseWebp() || firefoxVer >= 65) {
        // Делаем все то же самое что и для jpg, но уже для изображений формата Webp
        let imagesWebp = document.querySelectorAll('[data-bg-webp]');
        for (let i = 0; i < imagesWebp.length; i++) {
            let imageWebp = imagesWebp[i].getAttribute('data-bg-webp');
            imagesWebp[i].style.backgroundImage = 'url(' + imageWebp + ')';
        }
    }
};