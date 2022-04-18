@extends('master.back')

@section('content')
    <div class="container-fluid">

        <!-- Option Heading -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="mb-0 bc-title"><b>{{ __('Edit Options') }}</b> </h3>
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
                                <form class="admin-form"
                                    action="{{ route('back.option.update', [$item->id, $option->id]) }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    @method('PUT')

                                    @include('alerts.alerts')

                                    <div class="form-group">
                                        <label for="attribute_id">{{ __('Attribute') }} </label>
                                        <select name="attribute_id" class="form-control" id="attribute_id">

                                            @foreach ($attributes as $attribute)
                                                @if ($attribute->id == $option->attribute_id)
                                                    <option value="{{ $attribute->id }}" selected>
                                                        {{ $attribute->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="attr_name">{{ __('Name') }} *</label>
                                        <input type="text" name="name" class="form-control" id="attr_name"
                                            placeholder="{{ __('Enter Name') }}" value="{{ $option->name }}">
                                    </div>
                                    <div class="form-group pb-0 pt-0 mt-0 mb-0">
                                        <img class="admin-img lg" src="{{ $option->image ? asset('assets/images/'.$option->image) : asset('assets/images/placeholder.png') }}" >
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
                                            placeholder="{{ __('Enter Description') }}">{{ $option->description }}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="stock">{{ __('Stock') }} *</label>
                                        <input type="text" name="stock" class="form-control" id="stock"
                                            placeholder="{{ __('Enter Stock') }}" value="{{ $option->stock }}">
                                        <label for="unlimited">
                                            <input type="checkbox" {{ $option->stock == 'unlimited' ? 'checked' : '' }}
                                                class="my-2" id="unlimited">
                                            {{ __('Unlimited Stock') }}
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">{{ __('Price') }} *</label>
                                        <small>({{ __('Set 0 to make it free') }})</small>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ $curr->sign }}</span>
                                            </div>
                                            <input type="text" id="price" name="price" class="form-control"
                                                placeholder="{{ __('Enter Price') }}"
                                                value="{{ App\Helpers\PriceHelper::setPrice($option->price) }}">
                                        </div>
                                    </div>
                                    @php $attr = $option->attribute; @endphp
                                    @if ($attr->abbrivation == 'sq' || $attr->abbrivation == 'sqr')
                                        <div class="form-group">
                                            <label for="attr_name">{{ __('Length') }} </label>
                                            <input type="text" name="length" class="form-control" id="attr_name"
                                                placeholder="{{ __('Enter Length') }}" value="{{ $option->length }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="attr_name">{{ __('Height') }} </label>
                                            <input type="text" name="height" class="form-control" id="attr_name"
                                                placeholder="{{ __('Enter Height') }}" value="{{ $option->height }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="attr_name">{{ __('Broad') }} </label>
                                            <input type="text" name="broad" class="form-control" id="attr_name"
                                                placeholder="{{ __('Enter Broad') }}" value="{{ $option->broad }}">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="attr_name">{{ __('Quantity') }}</label>
                                            <input type="number" name="quantity" class="form-control" id="attr_name"
                                                placeholder="{{ __('Enter Quantity') }}"
                                                value="{{ $option->quantity }}">
                                        </div>
                                    @endif
                                    <input type="hidden" id="attr_keyword" name="keyword" value="{{ $option->keyword }}">

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
@endsection
