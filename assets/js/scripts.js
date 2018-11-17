(function ($) {
  'use strict'

  var screenRes_ = {
    isDesktop: true,
    isTablet: false,
    isMobile: false,
  }

  $(document).ready(function () {
    checkScreenSize()
    imgToBg()
    initHeader()
    initIntroSlider()
    initFundInfo()
    initPartnersCarousel()
    initStatistics()
    initMemberList()
    initPostsSlider()
  })

  $(window).on('resize', function () {
    checkScreenSize()
  })

  function checkScreenSize () {
    var winWidth = $(window).outerWidth()

    screenRes_.isDesktop = (winWidth > 1024)
    screenRes_.isMobile = (winWidth < 768)
    screenRes_.isTablet = (!screenRes_.isMobile && (winWidth < 992))
  }

  function imgToBg () {
    $('.bg-img').each(function () {
      var $img = $(this).find('> img')

      if ($img.length) {
        $(this).css('background-image', 'url(' + $img.attr('src') + ')')
        $img.addClass('hidden')
      }
    })
  }

  function initHeader () {
    var $header = $('#header')
    var $btnMenu = $header.find('.navbar-toggle')
    var $mainNav = $('#main-nav')

    $btnMenu.on('click', function (e) {
      e.preventDefault()
      toggleMainMenu()
    })

    $(window).on('scroll', function (e) {
      $('body').toggleClass('scrolled', $(window).scrollTop() >= 1)
    })
  }

  function toggleMainMenu () {
    $('body').toggleClass('opened-menu')
  }

  function initIntroSlider () {
    $('.intro-slider').slick({
      arrows: false,
      dots: true,
      fade: true,
    })
  }

  function initPostsSlider () {
    $('.post-slider').slick({
      arrows: false,
      dots: true,
      fade: true,
    })
  }

  function setImageSize ($img) {
    var naturalW = $img[0].naturalWidth
    var naturalH = $img[0].naturalHeight

    $img.attr('width', parseInt(naturalW / 2)).attr('height', parseInt(naturalH / 2))
  }

  function initFundInfo () {
    $('.fund-info img').each(function () {
      var $img = $(this)
      setImageSize($img)
    })
  }

  function initPartnersCarousel () {
    $('.partners-carousel').slick({
      variableWidth: true,
    })
  }

  function initStatistics () {
    var $statistics = $('.statistics')
    var $nav = $statistics.find('.nav')
    var $link = $nav.find(' > li > a')

    $link.on('mouseenter', function (e) {
      $(this).trigger('click')
    }).on('shown.bs.tab', function (e) {
      activateActiveStatistics()
    }).on('hidden.bs.tab', function (e) {
      deactivateActiveStatistics()
    })

    $statistics.find('.tab-pane .btn-close').on('click', function (e) {
      e.preventDefault()
      var $pane = $(this).closest('.tab-pane')
      var id = $pane.attr('id')
      var $opener = $nav.find('[aria-controls="' + id + '"]')

      if (screenRes_.isTablet || screenRes_.isMobile) {
        $opener.closest('li').removeClass('active')
        $opener.attr('aria-expanded', false)
        $pane.removeClass('active')
        $opener.trigger({ type: 'hidden.bs.tab' })
      }
    })

    function activateActiveStatistics () {
      $statistics.addClass('active')
    }

    function deactivateActiveStatistics () {
      $statistics.removeClass('active')
    }
  }

  function initMemberList () {
    var $list = $('.member-list')
    var $opener = $list.find('a')

    $opener.on('click', function (e) {
      var $li = $(this).closest('li')

      if (!$li.is('.active') || !$(this).hasClass('link-to')) {
        e.preventDefault()
      }

      if (!$li.is('.active')) {
        $li.siblings('li').removeClass('active')
      }

      $li.toggleClass('active')
    })
  }

  $('.beefup').beefup({
    openSingle: true,
  })

  $('.grid').imagesLoaded(function () {
    $('.grid').packery({
      itemSelector: '.grid-item',
    })
  })
})(jQuery)
