<div class="form-group {{ isset($required) ? 'required' : null }} {{ isset($form_group_class) ? $form_group_class : null }}">
    @if (!empty($type) && $type == 'checkbox')
        <div class="custom-controls-stacked">
            {{-- <input type="hidden" name="{{ $name }}" value="0"> --}}
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="{{ $name }}"
                       value="1" {{ old($name, isset($model) ? $model->{$name} : null) == 1 ? 'checked' : '' }}>
                <span class="custom-control-label">{{ !empty($label) ? $label : title_case(str_replace('_', ' ', snake_case($name))) }}{{ !empty($required) ? '*' : '' }}</span>
            </label>
            @if ($errors->has($name))
                <div class="invalid-feedback">
                    {{ $errors->first($name) }}
                </div>
            @endif
        </div>
    @elseif (!empty($type) && $type == 'radio')
        <div class="form-check form-check-inline">
            {!! Form::radio($name, $value, null,  [
                'id' => $name,
                'class' => 'form-check-input',
                'required' => !empty($required) ? true : false,
            ]) !!}
            @isset($label)
                {!! Form::label($name, $label, ['class' => 'form-check-label']) !!}
            @endisset
        </div>
        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
        {{ $slot }}

    @elseif (!empty($type) && $type == 'switch')
        @isset($label)
            {!! Form::label($name, $label, ['class' => 'control-label']) !!}
            <br>
        @endisset
        <label class="switch switch-label switch-{{ $class }}">
            {!! Form::checkbox($name, $value, null,  [
            'id' => $name,
            'class' => 'switch-input',
            'required' => !empty($required) ? true : false,
            ]) !!}
            <span class="switch-slider" data-checked="{{ (isset($data['on']) ? $data['on'] : 'On') }}"
                  data-unchecked="{{ (isset($data['off']) ? $data['off'] : 'Off') }}"></span>
        </label>
    @elseif (!empty($type) && $type == 'radio-group')
        @isset($label)
            {!! Form::label($name, $label, ['class' => 'control-label']) !!}
            <br>
        @endisset
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            @foreach($items as $item_value => $item_title)
                <label class="btn btn-secondary @if ((old($name) && $item_value == old($name)) || (!old($name) && isset($value) && $value == $item_value))) active @endif">
                    {!! Form::radio($name, $item_value, null,  ['id' => $name.$item_value]) !!}
                    {{ $item_title }}
                </label>
            @endforeach
        </div>
        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
        {{ $slot }}

    @elseif (!empty($type) && $type == 'select')
        @isset($label)
            {!! Form::label($name, $label, ['class' => 'control-label']) !!}
        @endisset
        {!! Form::select($name, $list , null , [
        'class' => 'form-control '.($errors->has($name) ? 'is-invalid' : '' ),
        'required' => !empty($required) ? true : false,
        'placeholder' => !empty($placeholder) ? $placeholder : null
        ]) !!}
        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
        {{ $slot }}

    @elseif (!empty($type) && $type == 'textarea')
        @isset($label)
            {!! Form::label($name, $label, ['class' => 'control-label']) !!}
        @endisset
        {!! Form::textarea('note', null, [
        'class' => 'form-control '.($errors->has($name) ? 'is-invalid' : '' ),
        'required' => !empty($required) ? true : false,
        'placeholder' => !empty($placeholder) ? $placeholder : null
        ]) !!}
        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
        {{ $slot }}

    @elseif (!empty($type) && $type == 'file')
        @isset($label)
            {!! Form::label($name, $label, ['class' => 'control-label']) !!}
        @endisset
        <div class="custom-file">
            {!! Form::file($name, [
            'class' => 'custom-file-input '.($errors->has($name) ? 'is-invalid' : '' ),
            'accept' => isset($accept) ? $accept : ''
            ]) !!}
            @if ($errors->has($name))
                <div class="invalid-feedback">
                    {{ $errors->first($name) }}
                </div>
            @endif
            {!! Form::label($name, 'Choose file...', ['class' => 'custom-file-label']) !!}
        </div>
        @if (!empty($current))
            <img src="{{ $current }}" class="img-thumbnail">
        @endif

    @else
        @isset($label)
            {!! Form::label($name, $label, ['class' => 'control-label']) !!}
        @endisset
        {!! Form::{(isset($type)?$type:'text')}($name, $value ?? null, [
        'class' => 'form-control '.($errors->has($name) ? 'is-invalid' : '' ),
        'required' => !empty($required) ? true : false,
        'placeholder' => !empty($placeholder) ? $placeholder : null
        ]) !!}
        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
        {{ $slot }}
    @endif
</div>