@extends('admin.layouts.master', ['title' => 'Edit '. $product->title])

@section('content')
    {!! Form::model($product, ['route' => ['admin.products.edit', $product], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
    @panel(['title' => 'Edit ' . $product->title])
    <div class="row">
        <div class="col-6">
            @input([
                'type' => 'select',
                'label' => 'Brand',
                'name' => 'brand_id',
                'list' => $brands,
                'placeholder' => 'Choose a brand ...',
                'required' => true,
            ])
            @endinput
            @input([
                'type' => 'select',
                'label' => 'Model',
                'name' => 'model_id',
                'list' => $models,
                'placeholder' => 'First choose a brand ...',
                'required' => true,
            ])
            @endinput
            @input([
                'label' => 'Title',
                'name' => 'title',
                'required' => true,
            ])
            @endinput
            @input([
                'type' => 'textarea',
                'label' => 'Notes',
                'name' => 'note',
            ])
            @endinput
        </div>
        <div class="col-6">
            @input([
                'type' => 'file',
                'label' => 'Cover picture',
                'name' => 'cover_file',
                'current' => route('image.action', ['list_thumbnail', $product->cover->picture]),
                'required' => true,
            ])
            @endinput
            <div class="row">
                <div class="col-4">
                    @input([
                        'type' => 'number',
                        'label' => 'Price',
                        'name' => 'price',
                        'required' => true,
                    ])
                    @endinput
                </div>
                <div class="col-4">
                    @input([
                        'type' => 'number',
                        'label' => 'Mileage',
                        'name' => 'mileage',
                        'required' => true,
                    ])
                    @endinput
                </div>
                <div class="col-4">
                    @input([
                        'type' => 'number',
                        'label' => 'Year',
                        'name' => 'year',
                        'required' => true,
                    ])
                    @endinput
                </div>
            </div>
            @input([
                'type' => 'select',
                'label' => 'Fuel',
                'name' => 'fuel',
                'placeholder' => 'Choose the fuel type ...',
                'list' => config('site.products.fuel_types'),
                'required' => true,
            ])
            @endinput
            @input([
                'type' => 'select',
                'label' => 'Transmission',
                'name' => 'transmission',
                'placeholder' => 'Choose the transmission type ...',
                'list' => config('site.products.transmission_types'),
                'required' => true,
            ])
            @endinput
            @input([
                'type' => 'select',
                'label' => 'Color',
                'name' => 'color_id',
                'list' => $colors,
                'placeholder' => 'Choose a color ...',
                'required' => true,
            ])
            @endinput
            <div class="row">
                <div class="col-4">
                    @input([
                        'type' => 'radio-group',
                        'label' => 'Status',
                        'name' => 'status',
                        'value' => $product->status,
                        'items' => [
                            'available' => 'Available',
                            'sold' => 'Sold',
                            'coming_soon' => 'Coming Soon'
                        ],
                    ])
                    @endinput
                </div>
                <div class="col-4">
                    @input([
                        'type' => 'radio-group',
                        'label' => 'Show in site',
                        'name' => 'enable',
                        'value' => $product->enable,
                        'items' => [
                            '1' => 'Yes',
                            '0' => 'No',
                        ],
                    ])
                    @endinput
                </div>
            </div>

        </div>
    </div>
    @slot('footer')
        @button([
            'type' => 'submit',
            'action' => 'primary',
            'text' => 'Save',
            'icon' => 'fa fa-save'
        ])
        @endbutton
        @isset($product)
            @button([
                'type' => 'link',
                'action' => 'ghost-dark',
                'url' => route('admin.products.index'),
                'text' => 'Cancel',
                'class' => 'float-right'
            ])
            @endbutton
        @endisset
    @endslot
    @endpanel
    {!! Form::close() !!}

@stop

@push('scripts-ready')
        $('#brand_id').on('change', function () {
            $.ajax({
                url: '{{ route('admin.products.get_models') }}/' + $(this).val(),
                type: 'GET',
                dataType: 'json',
                success: function (result) {
                    $('#model_id').empty();
                    if (result.length > 0) {
                        $('#model_id').append($('<option>', {
                            value: 0,
                            text: 'Choose a model ...'
                        }));
                        $.each(result, function (key, value) {
                            $('#model_id').append($('<option>', {
                                value: value.id,
                                text: value.title
                            }));
                        });
                    } else {
                        $('#model_id').append($('<option>', {
                            value: 0,
                            text: 'First choose a brand ...'
                        }));
                    }
                }
            });
        });
@endpush
