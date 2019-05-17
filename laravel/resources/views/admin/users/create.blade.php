@extends('admin.layouts.master', ['title' => 'Create a user'])

@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            {!! Form::open(['route' => ['admin.users.create'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            @panel(['title' => 'Create a user'])
            <div class="row">
                <div class="col-sm-8">
                    @input([
                        'label' => 'Name',
                        'name' => 'name',
                        'required' => true,
                    ])
                    @endinput
                    @input([
                        'type' => 'email',
                        'label' => 'Email address',
                        'name' => 'email',
                        'required' => true,
                    ])
                    @endinput
                    <div class="row">
                        @input([
                            'type' => 'password',
                            'label' => 'Password',
                            'name' => 'password',
                            'form_group_class' => 'col-sm-6',
                            'required' => true,
                        ])
                        @endinput
                        @input([
                            'type' => 'password',
                            'label' => 'Password Confirmation',
                            'name' => 'password_confirmation',
                            'form_group_class' => 'col-sm-6',
                            'required' => true,
                        ])
                        @endinput
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type="file" id="avatar_file" name="avatar_file" accept=".png, .jpg, .jpeg"/>
                            <label for="avatar_file"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview"
                                 style="background-image: url(https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=a);">
                            </div>
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
        </div>
    </div>
@stop
