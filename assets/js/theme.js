/* global wpHelper */
(function ($) {
  'use strict'

  $(document).ready(function () {
    /* Loader */
    $('.wrapper.loading').removeClass('loading')
    $('.animsition-loading').remove()

    // var TIMEOUT = 300;
    if (window.location.hash) {
      goToHash(window.location.href)
    }

    if (getQueryVariable('updated') === 'true') {
      window.alert('Your post has been successfully submitted and it\'s being reviewed by our team.')
      window.history.replaceState({}, document.title, window.location.href.split(window.location.search).join(''))
    }

    $('[data-link-href]').on('click', function () {
      window.location.href = $(this).data('link-href')
    })

    // Forms: Login && Submit
    jQuery('[id*="form-login"]').on('submit', ajaxLoginUser)
  })

  function goToHash (url) {
    var offsetTop
    var splitUrl = url.split('#')
    if (
      splitUrl.length > 1 &&
      $.isValidSelector('#' + splitUrl[1]) &&
      $('#' + splitUrl[1]).length
    ) {
      offsetTop = $('#' + splitUrl[1]).offset().top
      $('html, body').stop().animate({
        scrollTop: offsetTop,
      }, 500)
      return false
    }
  }

  $.extend({
    isValidSelector: function (selector) {
      if (typeof (selector) !== 'string') {
        return false
      }
      try {
        var $element = $(selector)
      } catch (error) {
        return false
      }
      return true
    },
  })
})(jQuery)

/**
 * AJAX
 */
function ajaxLoginUser (event) {
  event.preventDefault()

  var form = this.querySelector('form')
  var result = new FormData(form)

  jQuery.ajax({
    async: false,
    type: 'GET',
    url: [
      wpHelper.apiUrl + 'nug/v1/login?',
      'username=' + encodeURIComponent(result.get('username')),
      '&password=' + encodeURIComponent(result.get('password')),
    ].join(''),

    success: function (data) {
      location.reload()
    },
    error: function (jqXHR, textStatus, errorThrown) {
      var paragraph = form.querySelector('p:last-of-type')
      var text = jqXHR.responseJSON
        ? jqXHR.responseJSON.message
        : 'Please, fill the form and try again. ' + paragraph.innerHTML

      paragraph.innerHTML = text
    },
  })
}

function getQueryVariable (variable) {
  var query = window.location.search.substring(1)
  var vars = query.split('&')

  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split('=')
    if (pair[0] === variable) return pair[1]
  }

  return (false)
}
