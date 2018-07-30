// Conversations div'ine tıklandığında Ajax ile içeriye mesajlaşma detaylarını getirelim.
$('.messagePersonLink').click(function(){
  var t_id = $(this).attr('tlink');
  var token = parametreAl('token');
  var p_id = parametreAl('id');

  var data = ({
    "t_id"  : t_id,
    "token" : token,
    "p_id"  : p_id
  });

  $.ajax({
        type: 'post',
        data: data,
        url: 'views/conversations.php',
            success: function (data) {
                $('.messages').html(data);
              }
        });
      });


// URL'den parametre alma
var parametreAl = function parametreAl(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
