@extends('master.back')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="mb-0 bc-title"><b>{{ __('Create Warehouse') }}</b> </h3>
                    <a class="btn btn-primary   btn-sm" href="{{ route('back.warehouse.index') }}"><i
                            class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-lg-12">
                @include('alerts.alerts')
            </div>
        </div>
        <!-- Nested Row within Card Body -->
        <form class="admin-form tab-form" action="{{ route('back.warehouse.store') }}" method="POST"
            enctype="multipart/form-data">
            <input type="hidden" value="normal" name="item_type">
            @csrf
            
            <div class="row">
                <div class="col-lg-8">
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }} *</label>
                                <input type="text" name="name" class="form-control item-name" id="name"
                                    placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">{{ __('Available Quantity') }} *</label>
                                <input type="number" name="available_quantity" class="form-control" id="available_quantity"
                                    placeholder="{{ __('Enter quantity') }}" value="{{ old('available_quantity') }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">{{ __('Delivery Time') }} *</label>
                                <input type="time" name="delivery_time" class="form-control" id="delivery_time"
                                    placeholder="{{ __('Enter delivery time') }}" value="{{ old('delivery_time') }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">{{ __('Minimum order amount') }} *</label>
                                <input type="number" name="min_order_amount" class="form-control" id="min_order_amount"
                                    placeholder="{{ __('Enter minimum order amount') }}" value="{{ old('min_order_amount') }}">
                            </div>
                            <div class="form-group">
								<button type="submit"
									class="btn btn-secondary ">{{ __('Submit') }}</button>
							</div>
                        </div>
                    </div>

                </div>
            </div>
        </form>


    </div>

    </div>
@endsection
