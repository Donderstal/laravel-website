@extends('admin.layouts.master', ['title' => $product->title.' services'])

@section('content')
    <div class="row">
        <div class="col-7">
            @panel(['title' => $product->title. ' services'])
            <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Value</th>
                    <th class="text-center"><i class="fa fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                @forelse($services as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->value }}</td>
                        <td class="text-center">
                            @button([
                                'type' => 'link',
                                'url' => route('admin.products.services.edit', ['product' => $product->id, 'service' => $item->id]),
                                'action' => 'outline-primary',
                                'class' => 'btn-sm',
                                'icon' => 'far fa-edit',
                                'text' => 'Edit'
                            ])@endbutton
                            @button([
                                'type' => 'delete',
                                'route' => ['admin.products.services.delete', ['product' => $product->id, 'service' => $item->id]]
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
            @isset ($service)
                {!! Form::model($service, ['route' => ['admin.products.services.edit', $product, $service], 'method' => 'put']) !!}
            @else
                {!! Form::open(['route' => ['admin.products.services.index', $product], 'method' => 'post']) !!}
            @endif
            @panel(['title' => isset($service) ? 'Edit service' : 'New service'])
            @input([
                'label' => 'Title',
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
                @isset($service)
                    @button([
                        'type' => 'link',
                        'action' => 'ghost-dark',
                        'url' => route('admin.products.services.index', $product),
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