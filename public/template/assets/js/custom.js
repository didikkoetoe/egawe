/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

let path = location.pathname.split('/');
let url = location.origin + '/' + path[1];
$('ul.sidebar-menu li a').each(function() {
  if ($(this).attr('href').indexOf(url) !== -1) {
    $(this).parent().addClass('active').parent().parent('li').addClass('active')
  }
})
