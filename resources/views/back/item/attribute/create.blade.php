@extends('master.back')

@section('content')
    <div class="container-fluid">

        <!-- Attribute Heading -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="mb-0 bc-title"><b>{{ __('Create Attribute') }}</b> </h3>
                    <a class="btn btn-primary   btn-sm" href="{{ route('back.attribute.index', $item->id) }}"><i
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
                                <form class="admin-form" action="{{ route('back.attribute.store', $item->id) }}"
                                    method="POST" enctype="multipart/form-data">

                                    @csrf

                                    @include('alerts.alerts')

                                    <div class="form-group">
                                        <label for="attr_name">{{ __('Name') }} *</label>
                                        <select name="name" id="" class="form-control">
                                            <option value="square-meter">Square Meter</option>
                                            <option value="liter">Liter</option>
                                            <option value="piece">Piece</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="attr_abbr">{{ __('Abbrivation') }} *</label>
                                        
                                        <select name="abbrivation" id="" class="form-control">
                                            <option value="m2">m2</option>
                                            <option value="l">l</option>
                                            <option value="piece">piece</option>
                                        </select>
                                    </div>

                                    <input type="hidden" id="attr_keyword" name="keyword" value="{{ old('keyword') }}">
                                    <input type="hidden" name="item_id" value="{{ $item->id }}">

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-secondary ">{{ __('Submit') }}</button>
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
