@extends('admin.layouts.master', ['title' => $product->title.' specifications'])

@section('content')
    <div class="row">
        <div class="col-7">
            @panel(['title' => $product->title. ' specifications'])
            <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Value</th>
                    <th class="text-center"><i class="fa fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                @forelse($specifications as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->value }}</td>
                        <td class="text-center">
                            @button([
                                'type' => 'link',
                                'url' => route('admin.products.specification.edit', ['product' => $product->id, 'specification' => $item->id]),
                                'action' => 'outline-primary',
                                'class' => 'btn-sm',
                                'icon' => 'far fa-edit',
                                'text' => 'Edit'
                            ])@endbutton
                            @button([
                                'type' => 'delete',
                                'route' => ['admin.products.specification.delete', ['product' => $product->id, 'specification' => $item->id]]
                            ])@endbutton
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">-- No Records --</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            @endpanel
        </div>
        <div class="col-5">
            @isset ($specification)
                {!! Form::model($specification, ['route' => ['admin.products.specification.edit', $product, $specification], 'method' => 'put']) !!}
            @else
                {!! Form::open(['route' => ['admin.products.specification.index', $product], 'method' => 'post']) !!}
            @endif
            @panel(['title' => isset($specification) ? 'Edit specification' : 'New specification'])
            @input([
                'label' => 'Title',
                'type' => 'select',
                'list' => old('title') ? [old('title') => old('title')] : (isset($specification) ? [$specification->title => $specification->title] : []),
                'name' => 'title',
                'required' => true,
            ])
            @endinput
            @input([
                'label' => 'Value',
                'name' => 'value',
                'required' => true,
            ])
            @endinput
            @slot('footer')
                @button([
                    'type' => 'submit',
                    'action' => 'primary',
                    'text' => 'Save',
                    'icon' => 'fa fa-save'
                ])
                @endbutton
                @isset($specification)
                    @button([
                        'type' => 'link',
                        'action' => 'ghost-dark',
                        'url' => route('admin.products.specification.index', $product),
                        'text' => 'Cancel',
                        'class' => 'float-right'
                    ])
                    @endbutton
                @endisset
            @endslot
            @endpanel
            {!! Form::close() !!}
        </div>
    </div>
@stop

@push('scripts-ready')
    $('[name=title]').select2({
        placeholder: 'Select an item',
        tags: true,
        ajax: {
            url: '{{ route('admin.products.specification.get_title', $product) }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data.map(function(item) {
                        return {
                            id : item.title,
                            text : item.title
                        };
                    })
                };
            },
            cache: true
        },
        createTag: function (params) {
            var term = $.trim(params.term);

            if (term === '') {
                return null;
            }

            return {
                id: term,
                text: term,
                newTag: true // add additional parameters
            }
        }
    });
@endpush