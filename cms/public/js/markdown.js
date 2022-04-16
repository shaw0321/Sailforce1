/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/markdown.js ***!
  \**********************************/
$(function () {
  $("#post_body").on('change', function () {
    $post_body = $(this).val();
    $.ajax({
      type: "POST",
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/post/markdown',
      data: {
        'post_body': $post_body
      },
      success: function success(data) {
        console.log(data);
        $("#preview").val(data);
      }
    });
  });
});
/******/ })()
;