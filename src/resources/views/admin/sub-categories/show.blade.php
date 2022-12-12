@extends('admin.app')

@section('title', 'SubCategories Show')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tags icon-gradient bg-mean-fruit"></i>
      </div>
      <div>SubCategories Detail</div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <div class="form-group row">
      <label for="title" class="col-md-2 col-form-label">{{ __('Title') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="title" value="{{$subCategory->title}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="category" class="col-md-2 col-form-label">{{ __('Category') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="category" value="{{$subCategory->category->title}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="description" class="col-md-2 col-form-label">{{ __('Description') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="description" value="{{$subCategory->description}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="date" class="col-md-2 col-form-label">{{ __('Create at') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="date" value="{{$subCategory->created_at}}" readonly>
      </div>
    </div>
    <div class="form-group row mb-0">
      <div class="col-md-2"></div>
      <div class="col-md-10">
        <a href="#" class="btn btn-secondary back-btn">Back</a>
      </div>
    </div>
  </div>
</div>

@endsection
