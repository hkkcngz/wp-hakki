var Trigger = document.querySelector('.trigger');
if (Trigger) {

  (function() {
    $(document).on('click', 'ul.margin-size li:nth-child(1)', function() {
      if ($(window).width() < 400) {
        return $('.text-wrapper').css('margin', '4em 2vw 3em 2vw');
      } else if ($(window).width() < 600) {
        return $('.text-wrapper').css('margin', '4em 4vw 3em 4vw');
      } else if ($(window).width() < 800) {
        return $('.text-wrapper').css('margin', '4em 6vw 3em 6vw');
      } else {
        return $('.text-wrapper').css('margin', '4em 8vw 3em 8vw');
      }
    });
  
    $(document).on('click', 'ul.margin-size li:nth-child(2)', function() {
      if ($(window).width() < 400) {
        return $('.text-wrapper').css('margin', '4em 4vw 3em 4vw');
      } else if ($(window).width() < 600) {
        return $('.text-wrapper').css('margin', '4em 6vw 3em 6vw');
      } else if ($(window).width() < 800) {
        return $('.text-wrapper').css('margin', '4em 8vw 3em 8vw');
      } else {
        return $('.text-wrapper').css('margin', '4em 10vw 3em 10vw');
      }
    });
  
    $(document).on('click', 'ul.margin-size li:nth-child(3)', function() {
      if ($(window).width() < 400) {
        return $('.text-wrapper').css('margin', '4em 6vw 3em 6vw');
      } else if ($(window).width() < 600) {
        return $('.text-wrapper').css('margin', '4em 8vw 3em 8vw');
      } else if ($(window).width() < 800) {
        return $('.text-wrapper').css('margin', '4em 10vw 3em 10vw');
      } else {
        return $('.text-wrapper').css('margin', '4em 12vw 3em 12vw');
      }
    });
  
    $(document).on('click', 'ul.margin-size li:nth-child(4)', function() {
      if ($(window).width() < 400) {
        return $('.text-wrapper').css('margin', '4em 8vw 3em 8vw');
      } else if ($(window).width() < 600) {
        return $('.text-wrapper').css('margin', '4em 10vw 3em 10vw');
      } else if ($(window).width() < 800) {
        return $('.text-wrapper').css('margin', '4em 12vw 3em 12vw');
      } else {
        return $('.text-wrapper').css('margin', '4em 14vw 3em 14vw');
      }
    });
  
    $(document).on('click', 'ul.font-size li:nth-child(1)', function() {
      return $('.text-wrapper').css('font-size', '1.5em');
    });
  
    $(document).on('click', 'ul.font-size li:nth-child(2)', function() {
      return $('.text-wrapper').css('font-size', '1.3em');
    });
  
    $(document).on('click', 'ul.font-size li:nth-child(3)', function() {
      return $('.text-wrapper').css('font-size', '1.2em');
    });
  
    $(document).on('click', 'ul.font-size li:nth-child(4)', function() {
      return $('.text-wrapper').css('font-size', '1.1em');
    });
  
    $(document).on('click', 'ul.font li:nth-child(1)', function() {
      return $('body').css('font-family', 'PT-Serif, serif');
    });
  
    $(document).on('click', 'ul.font li:nth-child(2)', function() {
      return $('body').css('font-family', 'Crimson Text, serif');
    });
  
    $(document).on('click', 'ul.font li:nth-child(3)', function() {
      return $('body').css('font-family', 'Source Sans Pro, serif');
    });
  
    $(document).on('click', 'ul.font li:nth-child(4)', function() {
      return $('body').css('font-family', 'Lato, serif');
    });
  
    $(document).on('click', 'ul.font-color li:nth-child(1)', function() {
      $('body').css('background', '#FDFDFD');
      $('.text-wrapper').css('color', '#313131');
      return $('.trigger').css('color', '#313131');
    });
  
    $(document).on('click', 'ul.font-color li:nth-child(2)', function() {
      $('body').css('background', '#292929');
      $('.text-wrapper').css('color', '#ccc');
      return $('.trigger').css('color', '#ccc');
    });
  
    $(document).on('click', 'ul.font-color li:nth-child(3)', function() {
      $('body').css('background', '#FBF0D9');
      $('.text-wrapper').css('color', '#5b4636');
      return $('.trigger').css('color', '#5b4636');
    });
  
    $(document).on('click', 'ul.font-color li:nth-child(4)', function() {
      $('body').css('background', '#1C1F2B');
      $('.text-wrapper').css('color', '#bdcadb');
      return $('.trigger').css('color', '#bdcadb');
    });
  
    $(document).click(function(e) {
      if ($(e.target).is('.trigger')) {
        return $('.dropdown').toggleClass('expanded');
      }
    });
  
    $(document).on('click', '.text-wrapper', function() {
      return $('.dropdown').removeClass('expanded');
    });
  
    /*
    $(window).scroll(function() {
      var height, scrollTop;
      if (!$('.dropdown').hasClass('expanded')) {
        scrollTop = $(window).scrollTop();
        height = $(window).height();
        return $('.trigger').css({
          'opacity': (height - scrollTop) / height
        });
      }
    });
    */
  
  }).call(this);


}