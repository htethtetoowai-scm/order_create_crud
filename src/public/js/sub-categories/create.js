$(function () {
  const subCategories = [];
  $('#category').attr('disabled', true);
  $.ajax({
    url: '/admin/subCategoryData',
    method: 'GET',
    success: function (data) {
      subCategories.push(...data.data);
      $('#category').attr('disabled', false);
    },
    error: function (err) {
      $('#category').attr('disabled', false);
      console.log(err);
    }
  });

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
  });

  $('#category').on('change', function () {
    document.getElementById('subCategory').options.length = 0;
    let categoryID = this.value;
    let subCatOption = subCategories.filter((subCategory) => subCategory.category_id == categoryID);
    console.log(subCatOption);
    subCatOption.forEach((subCat) => $('#subCategory').append(`<option value="${subCat.id}">${subCat.title}</option>`))
  });
});