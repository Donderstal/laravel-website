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

    document.getElementById('footer__newsletter__button').addEventListener('click', () => {
        handleNewsLetterSubscription() 
        }
    )
    document.getElementById('navbar__searchbar__button').addEventListener('click', () => {
        handleNavbarSearchRequest()
    })

    if ( $('#brands-search-button').length > 0 ) {
        document.getElementById('brands-search-button').addEventListener('click', () => {
            handleBrandSearchRequest()
            }
        )
    }

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

    if ( $('#ons-aanbod-sorter').length > 0 ) {
        document.getElementById('ons-aanbod-sorter').addEventListener('change', () => {
            handleSortRequest($('#ons-aanbod-sorter').val())
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

// handle menu search bar request
function handleNavbarSearchRequest() {
    const searchRequest = $('#navbar__searchbar-input').val();
    searchURL = window.location.origin + '/search?q=' + searchRequest

    location.href = searchURL  
}

// Handle search request from search bar partials
// Bring user to search page with query string based on option value
function handleBrandSearchRequest() {
    const searchRequest = $('#search-select').val();
    searchURL = window.location.origin + '/search?q=' + searchRequest

    location.href = searchURL  
}

// Handle sort selection from ons-aanbod page select element
// Get value of select element and pass it to laravel
function handleSortRequest(sortRequest) {

    $.ajax({
        method: 'POST',
        url: '/autos/list',
        data: { 'sort': sortRequest },
        success: function(response) {
            const HTMLresponse = $(response)
            const newProductsPage= $(HTMLresponse[20].nextSibling.innerHTML)
            const newSortedProducts = $(newProductsPage['0'].innerHTML)

            $('#products-wrapper').replaceWith($(newSortedProducts[4]))
        },
        error: function(response) {
            console.log(response)
        }
    })
    
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


/* MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null */