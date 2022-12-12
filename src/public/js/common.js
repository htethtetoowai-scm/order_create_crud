$(function () {
  // Multiple images preview with JavaScript
  var previewImages = function (input, imgPreviewPlaceholder) {
    if (input.files) {
      var filesAmount = input.files.length;
      for (i = 0; i < filesAmount; i++) {
        var reader = new FileReader();
        reader.onload = function (event) {
          $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
        }
        reader.readAsDataURL(input.files[i]);
      }
    }
  };
  $('#image').on('change', function () {
    previewImages(this, 'div#images-preview-div');
    $('.show-images').hide();
  });
});
$(document).ready(function () {
  $('#items-table').DataTable();
  $('#categories-table').DataTable();
  $('#roles-table').DataTable();
  $('#sub-categories-table').DataTable();
  $('#users-table').DataTable();
});
$('.delete-btn').on('click', function () {
  var id = $(this).data('id');
  Swal.fire({
    title: 'Are you sure want to delete?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then(function (result) {
    if (result.isConfirmed) {
      $(`#del-form${id}`).submit();
    }
  });
});