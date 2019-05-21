@extends('admin.layouts.master', ['title' => 'Pictures of '.$product->title])

@section('content')
    <div class="row">
        <div class="col-7">
            {!! Form::open(['route' => ['admin.products.gallery.sort', $product], 'method' => 'put']) !!}
            @panel(['title' => 'Brands'])
            <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Picture</th>
                    <th>Label</th>
                    <th style="width: 80px;">Sort</th>
                    <th class="text-center"><i class="fa fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                @forelse($pictures as $item)
                    <tr>
                        <td>
                            <img src="{{ route('image.action', ['list_thumbnail', $item->picture]) }}" class="img-thumbnail"
                                 alt="{{ $item->label }}">
                        </td>
                        <td>
                            @if ($item->id != $product->cover_id)
                                {{ $item->label ?? '--' }}
                            @else
                                Product cover
                            @endif
                        </td>
                        <td>
                            @if ($item->id != $product->cover_id)
                                @input([
                                    'type' => 'number',
                                    'name' => 'sort['.$item->id.']',
                                    'value' => $item->sort
                                ])
                                @endinput
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($item->id != $product->cover_id)
                                @button([
                                    'type' => 'link',
                                    'url' => route('admin.products.gallery.cover', ['product' => $product->id, 'picture' => $item->id]),
                                    'action' => 'outline-success',
                                    'class' => 'btn-sm',
                                    'icon' => 'fas fa-check-circle',
                                    'text' => 'Set as cover'
                                ])@endbutton
                                @button([
                                    'type' => 'delete',
                                    'route' => ['admin.products.gallery.delete', ['product' => $product->id, 'picture' => $item->id]]
                                ])@endbutton
                            @else
                                <span class="badge badge-danger">You cannot delete cover picture</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">-- No Records --</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td>
                        @button([
                            'type' => 'submit',
                            'text' => 'Update',
                            'action' => 'primary'
                        ])
                        @endbutton
                    </td>
                    <td></td>
                </tr>
                </tfoot>
            </table>
            @endpanel
            {!! Form::close() !!}
        </div>
        <div class="col-5">
            {!! Form::open(['route' => ['admin.products.gallery.index', $product], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            @panel(['title' => 'New picture'])
            @input([
                'label' => 'Label',
                'name' => 'label',
            ])
            @endinput
            @input([
                'type' => 'file',
                'label' => 'Picture',
                'name' => 'picture_file',
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
            @endslot
            @endpanel
            {!! Form::close() !!}
        </div>
    </div>
@stop