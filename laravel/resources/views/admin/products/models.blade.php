@extends('admin.layouts.master', ['title' => 'Models of '. $brand->title])

@section('content')
    <div class="row">
        <div class="col-7">
            @panel(['title' => 'Models of '. $brand->title])
            <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Model</th>
                    <th>Created at</th>
                    <th class="text-center"><i class="fa fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                @forelse($models as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->ago() }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.products.brands.models.edit', ['brand' => $brand->id, 'model' => $item->id]) }}"
                               class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i> Edit</a>
                            @button([
                                'type' => 'delete',
                                'route' => ['admin.products.brands.models.delete', ['brand' => $brand->id, 'model' => $item->id]]
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
            @isset ($model)
                {!! Form::model($model, ['route' => ['admin.products.brands.models.edit', $brand->id, $model], 'method' => 'put']) !!}
            @else
                {!! Form::open(['route' => ['admin.products.brands.models.index', $brand->id], 'method' => 'post']) !!}
            @endif
            @panel(['title' => isset($model) ? 'Edit model' : 'New model'])
            @input([
                'label' => 'Model name',
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
                @isset($model)
                    @button([
                        'type' => 'link',
                        'action' => 'ghost-dark',
                        'url' => route('admin.products.brands.models.index', $brand->id),
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