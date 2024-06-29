@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="card col-10 px-0">
            <div class="card-header">
                Create Product
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="inputTitle" class="">Title</label>
                        <div class="mt-2">
                            <input name="title" type="text" class="form-control" id="inputTitle"
                                value="{{ old('title') }}">
                        </div>
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="inputPrice" class="">Price</label>
                        <div class="mt-2">
                            <input name="price" type="text" class="form-control" id="inputPrice"
                                value="{{ old('price') }}">
                        </div>
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="inputDetailDescription" class="">Detail Description</label>
                        <div class="mt-2">
                            <textarea name="detail_description" class="form-control" id="inputDetailDescription">{{ old('detail_description') }}</textarea>
                        </div>
                        @if ($errors->has('detail_description'))
                            <span class="text-danger">{{ $errors->first('detail_description') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="inputPurchaseConditions" class="">Purchase Conditions</label>
                        <div class="mt-2">
                            <textarea name="purchase_conditions" class="form-control" id="inputPurchaseConditions">{{ old('purchase_conditions') }}</textarea>
                        </div>
                        @if ($errors->has('purchase_conditions'))
                            <span class="text-danger">{{ $errors->first('purchase_conditions') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="inputSalesContact" class="">Sales Contact</label>
                        <div class="mt-2">
                            <textarea name="sales_contact" class="form-control" id="inputSalesContact">{{ old('sales_contact') }}</textarea>
                        </div>
                        @if ($errors->has('sales_contact'))
                            <span class="text-danger">{{ $errors->first('sales_contact') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="inputImages" class="">Upload Images</label>
                        <div class="mt-2">
                            <input name="images[]" type="file" class="form-control-file" id="inputImages" multiple>
                        </div>
                        @error('images')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @error('images.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
