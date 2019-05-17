@extends('admin.layouts.master', ['title' => 'Products options'])

@section('content')
    <div class="row">
        <div class="col-7">
            @panel(['title' => 'Option Groups'])
            <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Options</th>
                    <th>Created at</th>
                    <th class="text-center"><i class="fa fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                @forelse($groups as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->option->count() }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->ago() }}</td>
                        <td class="text-center">
                            @button([
                                'type' => 'link',
                                'url' => '#',
                                'action' => 'outline-success',
                                'class' => 'btn-sm',
                                'icon' => 'fas fa-list-alt',
                                'text' => 'Items'
                            ])@endbutton
                            @button([
                                'type' => 'link',
                                'url' => route('admin.products.option.edit', ['product' => $product->id, 'group' => $item->id]),
                                'action' => 'outline-primary',
                                'class' => 'btn-sm',
                                'icon' => 'far fa-edit',
                                'text' => 'Edit'
                            ])@endbutton
                            @button([
                                'type' => 'delete',
                                'route' => ['admin.products.option.delete', [$product, $item->id]]
                            ])@endbutton
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">-- No Records --</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            @endpanel
        </div>
        <div class="col-5">
            @isset ($group)
                {!! Form::model($group, ['route' => ['admin.products.option.edit', $product, $group], 'method' => 'put']) !!}
            @else
                {!! Form::open(['route' => ['admin.products.option.index', $product], 'method' => 'post']) !!}
            @endif
            @panel(['title' => isset($group) ? 'Edit group' : 'New group'])
            @input([
                'label' => 'Group name',
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
                @isset($group)
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