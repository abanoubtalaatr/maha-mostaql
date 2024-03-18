// Also see: https://www.quirksmode.org/dom/inputfile.html
// upload button
var inputs = document.querySelectorAll('.file-input')

for (var i = 0, len = inputs.length; i < len; i++) {
  customInput(inputs[i])
}

function customInput (el) {
  const fileInput = el.querySelector('[type="file"]')
  const label = el.querySelector('[data-js-label]')
  
  fileInput.onchange =
  fileInput.onmouseout = function () {
    if (!fileInput.value) return
    
    var value = fileInput.value.replace(/^.*[\\\/]/, '')
    el.className += ' -chosen'
    label.innerText = value
  }
}
// edit-delet
$('.fa-ul-2 li').each(function () {
  $(this).append('<a class="delete" href="#">حذف</a>  <a href="#" class="edit">تعديل</a>')
});
$('ul li a.delete').on('click', function () {
  $(this).parent().remove();
  return false;
});
$('ul li a.edit').on('click', function () {
  var val = $(this).siblings('.justified').html();
  if (val) {
      $(this).parent().prepend('<input type="text" class="txt  form-control form-control-edit" value="' + val + '" />');
      $(this).siblings('.justified').remove();
      $(this).html('تحديث');
  } else {
      var $txt = $(this).siblings().filter(function() { return $(this).hasClass('txt') });
      $(this).parent().prepend('<span class="lead justified">' + $txt.val() + '</span>');
      $txt.remove();
      $(this).html('تعديل');
  }
  return false;
});
