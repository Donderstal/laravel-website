@extends('admin.layouts.master', ['title' => 'Products brands'])

@section('content')
    <div class="row">
        <div class="col-7">
            @panel(['title' => 'Brands'])
            <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Logo</th>
                    <th>Brand</th>
                    <th>Created at</th>
                    <th class="text-center"><i class="fa fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                @forelse($brands as $item)
                    <tr>
                        <td>
                            @if ($item->logo)
                                <img src="{{ route('image.action', ['list_thumbnail', $item->logo]) }}" class="img-thumbnail"
                                     alt="{{ $item->title }}">
                            @else
                                &nbsp;
                            @endif
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->ago() }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.products.brands.models.index', ['brand' => $item->id]) }}"
                               class="btn btn-outline-success btn-sm"><i class="fas fa-cubes"></i> Models</a>
                            <a href="{{ route('admin.products.brands.edit', ['brand' => $item->id]) }}"
                               class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i> Edit</a>
                            @button([
                                'type' => 'delete',
                                'route' => ['admin.products.brands.delete', $item->id]
                            ])@endbutton
                        </td>12
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
            @isset ($brand)
                {!! Form::model($brand, ['route' => ['admin.products.brands.edit', $brand], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            @else
                {!! Form::open(['route' => 'admin.products.brands.index', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            @endif
            @panel(['title' => isset($brand) ? 'Edit brand' : 'New brand'])
            @input([
                'label' => 'Brand name',
                'name' => 'title',
                'required' => true,
            ])
            @endinput
            @input([
                'type' => 'file',
                'label' => 'Logo',
                'name' => 'logo_file',
                'current' => isset($brand->logo) && $brand->logo ? route('image.action', ['list_thumbnail', $brand->logo]) : null
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
                @isset($brand)
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