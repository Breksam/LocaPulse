@extends('layouts.base')

@section('title')
    Found Items
@endsection


@section('content')

<section class="found_lost">
    <div class="mask d-flex align-items-center h-100">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif 
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('warning') }}
                    </div>
                @endif
              <div class="card" style="border-radius: 1rem;">
                <div class="card-body p-5">
                  <h1 class="mb-5 text-center">find anything?</h1>                  
                    <form action="{{ route('found.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <!-- Location input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example3">Location</label>
                            <input type="text" name="location" id="form6Example3" class="form-control" placeholder="somewhere you found this thing" />
                        </div>
                        @error('location')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror

                        <!-- Category input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example3">Category</label>
                            <select name="category_id" class="form-control" aria-label="Default select example" >
                                <option selected>choose the category to which this item belongs</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                          
                        <!-- Date input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example5">Date</label>
                            <input type="date" name="date" id="form6Example5" class="form-control" />
                        </div>
                        @error('date')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror

                        <!-- Image input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example6">Image</label>
                            <input type="file" name="image" id="form6Example6" class="form-control"/>
                        </div>
                        @error('image')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror

                        <!-- Description input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example7">Description</label>
                            <textarea class="form-control" name="description" id="form6Example7" rows="4"></textarea>
                        </div>
                        @error('description')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-secondary btn-rounded btn-block" style="background-color: #ff6426 !important; border:0">Send</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection
