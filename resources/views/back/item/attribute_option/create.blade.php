@extends('master.back')

@section('content')
    <div class="container-fluid">

        <!-- Option Heading -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="mb-0 bc-title"><b>{{ __('Create  Options') }}</b></h3>
                    <a class="btn btn-primary   btn-sm" href="{{ route('back.option.index', $item->id) }}"><i
                            class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body ">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <form class="admin-form" action="{{ route('back.option.store', $item->id) }}"
                                    method="POST" enctype="multipart/form-data">

                                    @csrf

                                    @include('alerts.alerts')

                                    <div class="form-group">
                                        <label for="attribute_id">{{ __('Attribute') }} *</label>

                                        <select name="attribute_id" class="form-control" id="attribute_id">
                                            <option value="">{{ __('Select Attribute') }}</option>
                                            @foreach ($attributes as $attribute)
                                                <option value="{{ $attribute->id }}"
                                                    {{ $attribute->id == old('attribute_id') ? 'selected' : '' }}>
                                                    {{ $attribute->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="attr_name">{{ __('Name') }} *</label>
                                        <input type="text" name="name" class="form-control" id="attr_name"
                                            placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group position-relative ">
                                        <label class="file">
                                            <input type="file" accept="image/*" class="upload-photo" name="image" id="file"
                                                aria-label="File browser example">
                                            <span class="file-custom text-left">{{ __('Upload Image...') }}</span>
                                        </label>
                                        <br>
                                        <span
                                            class="mt-1 text-info">{{ __('Image Size Should Be 800 x 800. or square size') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="details">{{ __('Description') }} *</label>
                                        <textarea name="description" id="details" class="form-control text-editor" rows="6"
                                            placeholder="{{ __('Enter Description') }}">{{ old('details') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="stock">{{ __('Stock') }} *</label>
                                        <input type="text" name="stock" class="form-control" id="stock"
                                            placeholder="{{ __('Enter Stock') }}" value="{{ old('stock') }}">
                                        <label for="unlimited">
                                            <input type="checkbox" class="my-2" id="unlimited">
                                            {{ __('Unlimited Stock') }}
                                        </label>
                                    </div>


                                    <div class="form-group">
                                        <label for="price">{{ __('+ Price') }} *</label>
                                        <small>({{ __('Set 0 to make it free') }})</small>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ $curr->sign }}
                                                </span>
                                            </div>
                                            <input type="text" id="price" name="price" class="form-control"
                                                placeholder="{{ __('Enter Price') }}" value="{{ old('price') }}">
                                        </div>
                                    </div>
                                    <div id="three-fields" style="display:none">
                                        <div class="form-group">
                                            <label for="attr_name">{{ __('Length') }} </label>
                                            <input type="text" name="length" class="form-control" id="attr_name"
                                                placeholder="{{ __('Enter Length') }}" value="{{ old('length') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="attr_name">{{ __('Height') }} </label>
                                            <input type="text" name="height" class="form-control" id="attr_name"
                                                placeholder="{{ __('Enter Height') }}" value="{{ old('height') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="attr_name">{{ __('Broad') }} </label>
                                            <input type="text" name="broad" class="form-control" id="attr_name"
                                                placeholder="{{ __('Enter Broad') }}" value="{{ old('broad') }}">
                                        </div>
                                    </div>
                                    <div id="qty" style="display:none">
                                        <div class="form-group">
                                            <label for="attr_name">{{ __('Quantity') }}</label>
                                            <input type="number" name="quantity" class="form-control" id="attr_name"
                                                placeholder="{{ __('Enter Quantity') }}"
                                                value="{{ old('quantity') }}">
                                        </div>
                                    </div>


                                    <input type="hidden" id="attr_keyword" name="keyword" value="{{ old('keyword') }}">

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-secondary">{{ __('Submit') }}</button>
                                    </div>

                                    <div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('select').on('change', function() {
            var val = this.value;
            $.ajax({
                url: "{{ route('check-attribute') }}",
                method: "GET",
                data: {
                    id: val
                },
                success: function(data) {

                    if (data == "square") {


                        document.getElementById('qty').style.display = "none";
                        document.getElementById('three-fields').style.display = "block";
                    } else if (data == "other") {
                        document.getElementById('three-fields').style.display = "none";
                        document.getElementById('qty').style.display = "block";


                    }
                }
            });
        });
    </script>
@endsection
