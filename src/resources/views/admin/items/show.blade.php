@extends('admin.app')

@section('title', 'Item Show')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tags icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Item Detail</div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    @if ($item->image_path)
      <div class="row" id="images-preview-div">
        <img src="{{ \File::exists(public_path('storage/'. $item->image_path)) ? asset('storage/' . $item->image_path) : $item->image_path}}" alt="item">
      </div>
    @endif
    <div class="form-group row">
      <label for="name" class="col-md-2 col-form-label">{{ __('Name') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="name" value="{{$item->name}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="category" class="col-md-2 col-form-label">{{ __('Category') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="category" value="{{$item->category->title}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="subCategory" class="col-md-2 col-form-label">{{ __('SubCategory') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="subCategory" value="{{$item->subCategory->title}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="description" class="col-md-2 col-form-label">{{ __('Description') }}</label>
      <div class="col-md-10">
        <textarea class="form-control" style="height:100px" name="description" readonly>{{ $item->description }}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="price" class="col-md-2 col-form-label">{{ __('Price') }}</label>
      <div class="col-md-10">
        <input type="number" class="form-control" name="price" value="{{$item->price}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="date" class="col-md-2 col-form-label">{{ __('Create at') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="date" value="{{$item->created_at}}" readonly>
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
