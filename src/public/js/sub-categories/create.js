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

  $('#category').on('change', function () {
    document.getElementById('subCategory').options.length = 0;
    let categoryID = this.value;
    let subCatOption = subCategories.filter((subCategory) => subCategory.category_id == categoryID);
    console.log(subCatOption);
    subCatOption.forEach((subCat) => $('#subCategory').append(`<option value="${subCat.id}">${subCat.title}</option>`))
  });
});