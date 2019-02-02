const url = 'http://proyecto-laravel.com.devel';

window.addEventListener('load', function () {
  $('.btn-like').css('cursor', 'pointer');
  $('.btn-dislike').css('cursor', 'pointer');

  function like() {
    $('.btn-like').unbind('click').click(function () {
      $(this).addClass('btn-dislike').removeClass('.btn-like');
      $(this).attr('src', url + '/img/heart-red.png');
      dislike();

      $.ajax({
        url: url+'/like/'+$(this).data('id'),
        type: 'GET',
        success: function (response) {
          if (response.like) {
            console.log("Has dado like");
          } else {
            console.error('Error al dar like');
          }
        }
      });

    });
  }
  like();

  function dislike() {
    $('.btn-dislike').unbind('click').click(function () {
      $(this).addClass('btn-like').removeClass('.btn-dislike');
      $(this).attr('src', url + '/img/heart-black.png');
      like();

      $.ajax({
        url: url+'/dislike/'+$(this).data('id'),
        type: 'GET',
        success: function (response) {
          if (response.like) {
            console.log("Has dado dislike");
          } else {
            console.error('Error al dar dislike');
          }
        }
      });
    });
  }
  dislike();
});