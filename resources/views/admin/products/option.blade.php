@extends('admin.layouts.master', ['title' => $group->title.' options'])

@section('content')
    <div class="row">
        <div class="col-7">
            @panel(['title' => $group->title. ' options'])
            <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Created at</th>
                    <th class="text-center"><i class="fa fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                @forelse($options as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->ago() }}</td>
                        <td class="text-center">
                            @button([
                                'type' => 'link',
                                'url' => route('admin.products.option.items.edit', ['product' => $product->id, 'group' => $group->id, 'item' => $item->id]),
                                'action' => 'outline-primary',
                                'class' => 'btn-sm',
                                'icon' => 'far fa-edit',
                                'text' => 'Edit'
                            ])@endbutton
                            @button([
                                'type' => 'delete',
                                'route' => ['admin.products.option.items.delete', ['product' => $product->id, 'group' => $group->id, 'item' => $item->id]]
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
            @isset ($option)
                {!! Form::model($option, ['route' => ['admin.products.option.items.edit', $product, $group, $option], 'method' => 'put']) !!}
            @else
                {!! Form::open(['route' => ['admin.products.option.items.index', $product, $group], 'method' => 'post']) !!}
            @endif
            @panel(['title' => isset($option) ? 'Edit item' : 'New item'])
            @input([
                'label' => 'Option',
                'name' => 'title',
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
                @isset($option)
                    @button([
                        'type' => 'link',
                        'action' => 'ghost-dark',
                        'url' => route('admin.products.brands.index'),
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