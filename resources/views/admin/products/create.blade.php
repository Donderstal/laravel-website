@extends('admin.layouts.master', ['title' => 'Add a new product'])

@section('content')
    {!! Form::open(['route' => 'admin.products.create', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
    @panel(['title' => 'New Product'])
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
                'list' => [],
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
                <div class="col-6">
                    @input([
                        'type' => 'radio-group',
                        'label' => 'Status',
                        'name' => 'status',
                        'value' => 'available',
                        'items' => [
                            'available' => 'Available',
                            'sold' => 'Sold'
                        ],
                    ])
                    @endinput
                </div>
                <div class="col-4">
                    @input([
                        'type' => 'radio-group',
                        'label' => 'Show in site',
                        'name' => 'enable',
                        'value' => 1,
                        'items' => [
                            '1' => 'Yes',
                            '0' => 'No',
                        ],
                    ])
                    @endinput
                </div>
                <div class="col-4">
                    @input([
                        'type' => 'radio-group',
                        'label' => 'Coming Soon',
                        'name' => 'is_coming_soon',
                        'value' => 0,
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
    @endslot
    @endpanel
    {!! Form::close() !!}

@stop

@push('scripts-ready')
        var cover_file_to_correct_state = function(is_coming_soon) {
            var cover_file = $('#cover_file');
            var label_cover_file = $('.control-label[for=cover_file]');
            var label_cover_file_input = $('.custom-file-label[for=cover_file]');
            if (is_coming_soon === '1') {
                cover_file.prop('required', false);
                cover_file.prop('disabled', true);
                cover_file.prop('value', '');
                label_cover_file.addClass('after_hidden');
                label_cover_file_input.html('Default Coming Soon Image Used');
            } else {
                cover_file.prop('required', true);
                cover_file.prop('disabled', false);
                label_cover_file.removeClass('after_hidden');
                label_cover_file_input.html('Choose file...');
            }
        };

        cover_file_to_correct_state($('.active input[name=is_coming_soon]').val());
        $('input[name=is_coming_soon]').on('change', function (event) {
            console.log('here');
            var is_coming_soon = this.value;
            cover_file_to_correct_state(is_coming_soon);
        });

        var get_models = function(brand_title) {
            $.ajax({
                url: '{{ route('admin.products.get_models') }}/' + brand_title,
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
        };
        get_models($('#brand_id').val());
        $('#brand_id').on('change', function () {
            get_models(this.value);
        });
@endpush
