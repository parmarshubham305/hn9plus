$(function () {
    $('.cutom-select').each(function () {
      $(this).select2({
        theme: 'bootstrap4',
        width: 'style',
        placeholder: $(this).attr('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
      });
    });
  });

  $(document).ready(function(){
    $(".search-btn").click(function(){
        $(".search-bar").toggleClass("search-on");
    });
    $('#loginpopup').modal('show');
  });