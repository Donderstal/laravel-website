require('./bootstrap');

var SVGInjector = require('svg-injector')
window.gam = {};
window.gam.search = {};


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

    document.getElementById('footer__newsletter__button').addEventListener('click', () => {
        handleNewsLetterSubscription()
        }
    )

    if ( $('#general-info__form-button').length > 0 ) {
        document.getElementById('general-info__form-button').addEventListener('click', () => {
            handleContactForm()
            }
        )
    }

    if ( $('#product-page__meer-opties').length > 0 ) {

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

        document.getElementById('bel-mij-terug').addEventListener('click', () => {
            postCallMeForm()
            }
        )

    }

    // Elements to inject
    var mySVGsToInject = document.querySelectorAll('img.svg-injection');

    if (mySVGsToInject) {
        // Do the injection
        SVGInjector(mySVGsToInject);
    }


});

function postCallMeForm() {
    const userName = $('#bel-mij-terug__naam').val();
    const telephoneNum = $('#bel-mij-terug__tel').val();
    const productName = $('#bel-mij-terug__product-name').text() ;

    $.ajax({
        method: 'POST',
        url: '/emails/post-call-me-form',
        data: {
            'name'      : userName,
            'telephone' : telephoneNum,
            'product'   : productName
        },
        success: function(response) {
            console.log(response)
        },
        error: function(response) {
            console.log(response)
        }
    })

}

function handleNewsLetterSubscription() {
    const userEmail = $('#footer__newsletter__input').val() ;

    $.ajax({
        method: 'POST',
        url: '/emails/newsletter-form',
        data: {
            'email'      : userEmail
        },
        success: function(response) {
            console.log(response)
        },
        error: function(response) {
            console.log(response)
        }
    })
}

function handleContactForm() {

    var firstName = $('#first-name').val();
    var lastName = $('#last-name').val();
    var email = $('#email').val();
    var telephone = $('#telephone').val();
    var subject = $('#subject').val();
    var textBlock = $('#text-block').val();

    $.ajax({
        method: 'POST',
        url: '/emails/contact-form',
        data: {
          'first-name': firstName,
          'last-name': lastName,
          'subject' : subject,
          'email':  email,
          'telephone': telephone,
          'text-block': textBlock
        },
        success: function(response) {
            console.log(response)
        },
        error: function(response) {
            console.log(response)
        }
    })
}

// Used for opening up 'meer opties' and 'voorzien van' parts of product page
function showParentElement(modifier){
    (modifier === 'opties')
    ? $('.product-page__all-options-wrapper').toggleClass('full-height')
    : $('.product-page__services-wrapper').toggleClass('full-height')
}

// Toggle dropdown nav-menu
function toggleDropdown() {
    $('.header-main-menu').toggle();
    $('.navbar__search-icon').toggle();
    $('.header').toggleClass('dropdown-nav-active')
    $('#header__dropdown-button').toggleClass('dropdown-nav-active-button')

    $('.header').hasClass('dropdown-nav-active')
    ? $('.navbar__GAM-logo').attr('src', 'img/ui-icons/GAM-logo-minimal.svg')
    : $('.navbar__GAM-logo').attr('src', 'img/ui-icons/GAM-logo-minimal-white.svg')
}

// Toggle menu search bar
function toggleSearchbar() {
    $('.navbar__searchbar').toggle()
    $('#navbar__searchbar-input').focus();
}


// Search Module
window.gam.search.handleSearchRequest = function () {
    searchURL = window.location.origin + '/autos';
    if (window.gamSearchState) {
        searchURL = window.gam.search.handelGamSearchState(searchURL, window.gamSearchState);
    } else {
        // default
        searchURL += '/' + 'aanbod';
    }
    console.log(searchURL);

    location.href = searchURL;

}

window.gam.search.handelGamSearchState = function(searchURL, gamSearchState) {
    if (gamSearchState.pathParams.carState) {
        searchURL += '/' + gamSearchState.pathParams.carState;
    } else {
        searchURL += '/' + 'aanbod';
    }

    if (gamSearchState.pathParams.brand) {
        searchURL += '/' + gamSearchState.pathParams.brand;
    }

    if (!jQuery.isEmptyObject(gamSearchState.queryParams)) {
        serializedParams = $.param(gamSearchState.queryParams);
        searchURL += '?' + serializedParams;
    }
    return searchURL;
}


window.gam.search.actionUpdateBrand = function(brand) {
    gamSearchState.pathParams.brand = brand;
}

window.gam.search.actionUpdateSort = function(sortKey) {
    if (!sortKey) {
        delete gamSearchState.queryParams.order;
    } else {
        gamSearchState.queryParams.order = sortKey;
    }
}

window.gam.search.actionUpdateQuery = function(query) {
    if (!query) {
        delete gamSearchState.queryParams.q;
    } else {
        gamSearchState.queryParams.q = query;
    }
}

// The 'gallery' variable is an Array of Objects
// It is retrieved from the PHP Laravel in the script tag in resources/views/products/show.blade.php

// Functions for scrolling through gallery
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

// Functions for opening Large gallery
/// Open large gallery 'controller'
function getLargeGallery () {
    if ($('#return-button').length !== 1) {
        createLargeGalleryBackground ()
        toggleLargeGallery()
        toggleLargeGalleryButtonDiv()
        createLargeGalleryReturnButton()

        $('body').toggleClass('large-gallery__body-styles')
        $('html,body').scrollTop(0);
        $('.header-general').css('display', 'none');
    }
}

/// close large gallery 'controller'
function removeLargeGallery() {
    toggleLargeGallery()
    toggleLargeGalleryButtonDiv()
    $('body').toggleClass('large-gallery__body-styles')
    $('.header-general').css('display', 'block');
    $('.large-gallery__background-div').remove()
    $('.large-gallery__return-button').remove()
}

// Helper functions
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
}

function createLargeGalleryReturnButton () {
    $('<button/>', {
        text: 'TERUG',
        id: 'return-button',
        class: 'large-gallery__return-button'
    }).appendTo('body');

    $('#return-button').click(removeLargeGallery)
}

function toggleLargeGalleryButtonDiv() {
    $('.product-page__image-header__button-wrapper')
        .toggleClass('large-gallery__button-div')
}
