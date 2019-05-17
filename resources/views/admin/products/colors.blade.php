@extends('admin.layouts.master', ['title' => 'Define product colors'])

@section('content')
    <div class="row">
        <div class="col-7">
            @panel(['title' => 'List of colors'])
            <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Color</th>
                    <th>Created at</th>
                    <th class="text-center"><i class="fa fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                @forelse($colors as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->ago() }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.products.colors.edit', ['color' => $item->id]) }}"
                               class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i> Edit</a>
                            @button([
                                'type' => 'delete',
                                'route' => ['admin.products.colors.delete', $item->id]
                            ])@endbutton
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">-- No Records --</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            @endpanel
        </div>
        <div class="col-5">
            @isset ($color)
                {!! Form::model($color, ['route' => ['admin.products.colors.edit', $color], 'method' => 'put']) !!}
            @else
                {!! Form::open(['route' => 'admin.products.colors.index', 'method' => 'post']) !!}
            @endif
            @panel(['title' => isset($color) ? 'Edit color' : 'New color'])
            @input([
                    'label' => 'Color name',
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
                @isset($color)
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