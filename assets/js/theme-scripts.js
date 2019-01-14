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

    var form = jQuery('[id*="form-submit"]')
    form.on('submit', ajaxPostShare)
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
function ajaxPostShare (event) {
  event.preventDefault()

  jQuery.ajax({
    async: false,
    url: wpHelper.ajaxUrl,
    type: 'POST',
    data: {
      action: 'post_share',
      post: buildPostArray(),
    },
    success: function (data) {
      console.log('Keep it a 100', data)

      // Prevent users from changing their definition
      // jQuery('#input-content, #input-author')
      //   .attr('readonly', 'readonly')
      //   .attr('onfocus', 'this.blur()')

      // Show disclaimer message
      // toggleInputMessages('success')
    },
    error: function (data) {
      console.error('It was all good just a week ago…', data)

      // Show disclaimer message
      // toggleInputMessages('error')
    },
  })
}

function buildPostArray () {
  var form = jQuery('[id*="form-submit"]')
  var postType = form.attr('id').split('form-submit-').join('')
  var fields = form.find('[name*="' + postType + '"]')

  var getName = function (index, field) { return field.getAttribute('name') }
  var removeDuplicateNames = function (name, index) { return fieldNames.indexOf(name) === index }

  var result = {}
  var fieldNames = fields.map(getName).toArray()
  var names = fieldNames.filter(removeDuplicateNames)
  var values = names.map(function (name, index) {
    var element = document.querySelector('[name=' + name + ']')
    var checked = document.querySelector('[name=' + name + ']:checked')
    return element.type === 'radio'
      ? checked ? checked.value : ''
      : element.value
  })

  names.forEach(function (name, index) {
    result[name] = values[index]
  })

  return result
}
