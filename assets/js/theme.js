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

    $('[data-link-href]').on('click', function () {
      window.location.href = $(this).data('link-href')
    })

    // Forms: Login && Submit
    jQuery('[id*="form-login"]').on('submit', ajaxLoginUser)
    // jQuery('[id*="form-submit"]').on('submit', ajaxPostShare)
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

function ajaxPostShare (event) {
  event.preventDefault()

  var form = this.querySelector('form')
  var result = new FormData(form)
  result.append('action', 'post_share')

  jQuery.ajax({
    async: false,
    url: wpHelper.ajaxUrl,
    type: 'POST',
    data: result,

    processData: false,
    contentType: false,

    success: function (data) {
      console.log('Keep it a 💯', data)

      // Prevent users from changing their definition
      // jQuery('#input-content, #input-author')
      //   .attr('readonly', 'readonly')
      //   .attr('onfocus', 'this.blur()')

      // Show disclaimer message
      // toggleInputMessages('success')

      // Clear the form to prevent resubmission.
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error('It was all good just a week ago…')
      console.error([ jqXHR, textStatus, errorThrown ])

      // Show disclaimer message
      // toggleInputMessages('error')
    },
  })
}
