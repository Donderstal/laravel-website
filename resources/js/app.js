require('./bootstrap');

var SVGInjector = require('svg-injector')



$( document ).ready(function() {
    // All event listeners are in this function
    document.getElementById('header__dropdown-button').addEventListener('click', () => {
        toggleDropdown() 
        }
    )

    document.getElementById('navbar__search-icon').addEventListener('click', () => {
        toggleSearchbar() 
        }
    )

    document.getElementById('product-page__meer-opties').addEventListener('click', () => {
        showParentElement('opties')
        }
    )

    document.getElementById('product-page__meer-voorzien-van').addEventListener('click', () => {
        showParentElement('voorzien-van')
        }
    )

    document.getElementById('product-gallery__right-button').addEventListener('click', () => {
        getNextPicture('right')
        }
    )

    document.getElementById('product-gallery__left-button').addEventListener('click', () => {
        getNextPicture('left')
        }
    )

    document.getElementById('product-image').addEventListener('click', () => {
        getLargeGallery()
        }
    )

    // Elements to inject
    var mySVGsToInject = document.querySelectorAll('img.svg-injection');

    // Do the injection
    SVGInjector(mySVGsToInject);
});

function showParentElement(modifier){
    (modifier === 'opties')
    ? $('.product-page__all-options-wrapper').toggleClass('full-height')
    : $('.product-page__services-wrapper').toggleClass('full-height')
}

function toggleDropdown() {
    $('.header-main-menu').toggle();
    $('.navbar__search-icon').toggle();
    $('.header').toggleClass('dropdown-nav-active')
    $('#header__dropdown-button').toggleClass('dropdown-nav-active-button')

    $('.header').hasClass('dropdown-nav-active')
    ? $('.navbar__GAM-logo').attr('src', 'img/ui-icons/GAM-logo-minimal.svg')
    : $('.navbar__GAM-logo').attr('src', 'img/ui-icons/GAM-logo-minimal-white.svg')
}

function toggleSearchbar() {
    $('.navbar__searchbar').toggle()
}

// The 'gallery' variable is an Array of Objects
// It is retrieved from the PHP Laravel in the script tag in resources/views/products/show.blade.php

function getNextPicture(direction) {

    const currentPictureObject = gallery.find(isCurrentPicture)
    const currentPictureObjectIndex = gallery.indexOf(currentPictureObject)
    const nextPictureObjectIndex = getNextPictureObjectIndex(direction, currentPictureObjectIndex)
    displayNextPicture(nextPictureObjectIndex, currentPictureObject)
}

function isCurrentPicture(element) {
    const currentImageFileName = $('#product-image').attr('src').split('/')[5]
    return currentImageFileName == element.picture
}

function getNextPictureObjectIndex(direction, currentPictureObjectIndex) {
    let nextPictureObjectIndex = ( direction == 'left' ) 
        ? (currentPictureObjectIndex - 1) 
        : (currentPictureObjectIndex + 1) 

    if (nextPictureObjectIndex > (gallery.length - 1) ) {
        nextPictureObjectIndex = 0
    }

    if (nextPictureObjectIndex < 0) {
        nextPictureObjectIndex = (gallery.length - 1)
    }

    document.getElementById('product-gallery__counter').innerText = ( nextPictureObjectIndex + 1 )

    return nextPictureObjectIndex 
}

function displayNextPicture(nextPictureObjectIndex, currentPictureObject) {
    const nextPictureFileName = gallery[nextPictureObjectIndex].picture
    const nextPicturePath = $('#product-image')
        .attr('src')
        .replace(currentPictureObject.picture, nextPictureFileName);

    $('#product-image').attr('src', nextPicturePath)
}

function getLargeGallery () {
    if ($('#return-button').length !== 1) {
        createLargeGalleryBackground ()
        toggleLargeGallery()
        toggleLargeGalleryButtonDiv()
        createLargeGalleryReturnButton()        
    }

}

function removeLargeGallery() {
    toggleLargeGallery()
    toggleLargeGalleryButtonDiv()
    $('.large-gallery__background-div').remove()
    $('.large-gallery__return-button').remove()
}

function createLargeGalleryBackground () {
    $('<div/>', {
        class: 'large-gallery__background-div'
    }).appendTo('body');
}

function toggleLargeGallery() {
    $('.product-page__image-header')
        .toggleClass('cell')
        .toggleClass('small-12')
        .toggleClass('large-5')
        .toggleClass('large-gallery__gallery-div')

    $('.product-page__header-img-wrapper') 
        .toggleClass('large-gallery__gallery-div')
}

function createLargeGalleryReturnButton () {
    $('<button/>', {
        text: 'terug',
        id: 'return-button',
        class: 'large-gallery__return-button'
    }).appendTo('body');

    $('#return-button').click(removeLargeGallery)
}

function toggleLargeGalleryButtonDiv() {
    $('.product-page__image-header__button-wrapper')
        .toggleClass('large-gallery__button-div')
}