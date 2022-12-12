@extends('admin.app')

@section('title', 'Item Create')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tags icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Create new item</div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('items.store') }}" autocomplete="off" enctype="multipart/form-data">
      @csrf
      <div class="row" id="images-preview-div"> </div>

      <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label">{{ __('Name') }}</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="category" class="col-md-2 col-form-label">{{ __('Choose Category') }}</label>
        <div class="col-md-10">
          <select class="form-control" name="category" value="{{ old('category') }}" id="category">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
          </select>
          @error('category')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="subCategory" class="col-md-2 col-form-label">{{ __('Choose SubCategory') }}</label>
        <div class="col-md-10">
          <select class="form-control" name="subCategory" id="subCategory">
            <option value="">Select SubCategory (Optional)</option>
          </select>
          @error('subCategory')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="description" class="col-md-2 col-form-label">{{ __('Description') }}</label>
        <div class="col-md-10">
          <textarea class="form-control" style="height:60px" name="description">{{ old('description') }}</textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="price" class="col-md-2 col-form-label">{{ __('Price') }}</label>
        <div class="col-md-10">
          <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price')}}">
          @error('price')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="image" class="col-md-2 col-form-label">{{ __('Choose Photo') }}</label>
        <div class="col-md-10">
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" multiple>
            <label class="custom-file-label" for="customFile">Select once to upload multiple</label>
            @error('image')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-2"></div>
        <div class="col-md-10">
          <a href="#" class="btn btn-secondary back-btn">Cancel</a>
          <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/sub-categories/create.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
@endsection
