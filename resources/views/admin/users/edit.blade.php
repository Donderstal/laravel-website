@extends('admin.layouts.master', ['title' => 'Edit a user'])

@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            {!! Form::model($user, ['route' => ['admin.users.edit', $user], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            @panel(['title' => 'Edit a user'])
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
                            ])
                            <div class="help-block text-info">
                                Leave blank if you don't want to change the password.
                            </div>
                            @endinput
                            @input([
                                'type' => 'password',
                                'label' => 'Password Confirmation',
                                'name' => 'password_confirmation',
                                'form_group_class' => 'col-sm-6',
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
                                <div id="imagePreview" style="background-image: url({{ asset('img/admin/default-avatar.png') }});">
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
