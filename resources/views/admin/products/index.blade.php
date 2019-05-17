@extends('admin.layouts.master', ['title' => 'Products'])

@section('content')
    <div class="row">
        <div class="col-12">
            @panel(['title' => 'Products'])
            <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Status</th>
                    <th>Show</th>
                    <th>Created by</th>
                    <th>Last update</th>
                    <th class="text-center"><i class="fas fa-info-circle"></i></th>
                    <th class="text-center"><i class="fa fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            {{ $product->title }}
                        </td>
                        <td>
                            {{ $product->brand->title }}
                        </td>
                        <td>
                            {{ $product->model->title }}
                        </td>
                        <td>
                            @if ($product->status == 'available')
                                <span class="badge badge-success">Available</span>
                            @else
                                <span class="badge badge-warning">Sold</span>
                            @endif
                        </td>
                        <td>
                            @if ($product->enable)
                                <span class="badge badge-success">Yes</span>
                            @else
                                <span class="badge badge-danger">No</span>
                            @endif
                        </td>
                        <td>
                            {{ $product->user->name }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($product->updated_at)->format('Y/m/d H:i') }}
                            <div class="small text-muted">
                                <span>Added on: </span>{{ \Carbon\Carbon::parse($product->created_at)->format('Y/m/d H:i') }}
                            </div>
                        </td>
                        <td class="text-center">
                            @button([
                                'type' => 'link',
                                'url' => route('admin.products.gallery.index', ['product' => $product->id]),
                                'action' => 'outline-success',
                                'class' => 'btn-sm',
                                'icon' => 'fas fa-images',
                                'text' => 'Gallery'
                            ])@endbutton
                            @button([
                                'type' => 'link',
                                'url' => route('admin.users.edit', ['user' => $product->id]),
                                'action' => 'outline-success',
                                'class' => 'btn-sm',
                                'icon' => 'fas fa-list',
                                'text' => 'Specification'
                            ])@endbutton
                            @button([
                                'type' => 'link',
                                'url' => route('admin.products.option.index', ['product' => $product->id]),
                                'action' => 'outline-success',
                                'class' => 'btn-sm',
                                'icon' => 'fas fa-boxes',
                                'text' => 'Options'
                            ])@endbutton
                        </td>
                        <td class="text-center">
                            @button([
                                'type' => 'link',
                                'url' => route('admin.products.edit', ['product' => $product->id]),
                                'action' => 'outline-primary',
                                'class' => 'btn-sm',
                                'icon' => 'far fa-edit',
                                'text' => 'Edit'
                            ])
                            @endbutton
                                @button([
                                    'type' => 'delete',
                                    'route' => ['admin.products.delete', $product->id]
                                ])@endbutton
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">-- NO DATA --</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @slot('footer')
                {{ $products->links() }}
            @endslot
            @endpanel
        </div>
    </div>
@stop