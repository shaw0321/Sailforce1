/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/markdown.js ***!
  \**********************************/
$(function () {
  $("#post_body").on('change', function () {
    $post_body = $(this).val();
    console.log('works1');
    $.ajax({
      type: "POST",
      dataType: "html",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/post/markdown',
      data: {
        'post_body': $post_body
      } //    success: function(data){ 
      //        console.log(data);
      //    $("#preview").val(data)
      // } 

    }).done(function (data, html) {
      console.log('success');
      console.log(data);
      $("#preview").append(data);
    }).fail(function (result) {
      console.log('fail');
      console.log(result);
    });
  });
});
/******/ })()
;