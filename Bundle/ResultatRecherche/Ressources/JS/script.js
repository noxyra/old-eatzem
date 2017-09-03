$(function(){

    // GESTION DU SCROLL ONE PAGE
    $('#fullpage').fullpage({
        //Navigation
        // menu: '#menu',
        lockAnchors: true,
        // anchors:['firstPage', 'secondPage'],
        // navigation: false,
        // navigationPosition: 'right',
        // navigationTooltips: ['firstSlide', 'secondSlide'],
        // showActiveTooltip: false,
        // slidesNavigation: true,
        // slidesNavPosition: 'bottom',

        //Scrolling
        css3: false,
        scrollingSpeed: 700,
        // autoScrolling: true,
        // fitToSection: true,
        // fitToSectionDelay: 1000,
        scrollBar: false,
        easing: 'easeInOutCubic',
        easingcss3: 'ease',
        loopBottom: true,
        loopTop: true,
        loopHorizontal: true,
        continuousVertical: false,
        // continuousHorizontal: false,
        // scrollHorizontally: false,
        interlockedSlides: false,
        resetSliders: true,
        fadingEffect: false,
        normalScrollElements: '#element1',
        scrollOverflow: true,
        scrollOverflowOptions: true,
        touchSensitivity: 15,
        normalScrollElementTouchThreshold: 1,
        bigSectionsDestination: null,

        //Accessibility
        keyboardScrolling: true,
        animateAnchor: true,
        // recordHistory: true,

        //Design
        controlArrows: true,
        // verticalCentered: true,
        // sectionsColor : ['#ccc', '#fff'],
        paddingTop: '0px',
        paddingBottom: '0px',
        // fixedElements: '#header, .footer',
        responsiveWidth: 0,
        responsiveHeight: 0,
        responsiveSlides: false

        //events
        // onLeave: function(index, nextIndex, direction){},
        // afterLoad: function(anchorLink, index){},
        // afterRender: function(){},
        // afterResize: function(){},
        // afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){},
        // onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex){}
    });
});