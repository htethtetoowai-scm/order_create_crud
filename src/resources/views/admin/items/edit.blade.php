@extends('admin.app')

@section('title', 'Item Edit')

@section('css')
<style>
  #images-preview-div img {
    padding: 10px;
    max-width: 150px;
    max-height: 150px;
  }
</style>
@endsection

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tags icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div>Edit Item
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('items.update', [$item->id]) }}" autocomplete="off" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <input type="hidden" name="id" value="{{$item->id}}">
      <div class="row" id="images-preview-div">
        @if ($item->image_path)
          <img src="{{ \File::exists(public_path('storage/'. $item->image_path)) ? asset('storage/' . $item->image_path) : $item->image_path}}" alt="item" class="show-images">
        @endif
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label">{{ __('Name') }}</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$item->name}}">
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="category" class="col-md-2 col-form-label">{{ __('Choose Category') }}</label>
        <div class="col-md-10">
          <select class="form-control" name="category" value="{{ old('category') }}">
            @foreach ($categories as $category)
              @if ($category->id == $item->category_id)
                <option value="{{$category->id}}" selected>{{$category->title}}</option>
              @else
                <option value="{{$category->id}}">{{$category->title}}</option>
              @endif
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
          <select class="form-control" name="subCategory" value="{{ old('subCategory') }}">
            @foreach ($subCategories as $subCategory)
              @if ($subCategory->id == $item->category_id)
                <option value="{{$subCategory->id}}" selected>{{$subCategory->title}}</option>
              @else
                <option value="{{$subCategory->id}}">{{$subCategory->title}}</option>
              @endif
            @endforeach
          </select>
          @error('subCategory')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="description" class="col-md-2 col-form-label">{{ __('Description') }}</label>
        <div class="col-md-10">
          <textarea class="form-control" style="height:100px" name="description">{{ $item->description }}</textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="price" class="col-md-2 col-form-label">{{ __('Price') }}</label>
        <div class="col-md-10">
          <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$item->price}}">
          @error('price')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="image" class="col-md-2 col-form-label">{{ __('Choose Photo') }}</label>
        <div class="col-md-10">
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="image">
            <label class="custom-file-label" for="customFile">Select once to upload</label>
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
<script src="{{ asset('js/common.js') }}"></script>
@endsection
