<div {{ $attributes->class(['form-group']) }}>
    <label for="{{ $id }}">
        {{ $label }} @if($required) <span class="text-danger">*</span> @endif
    </label>
    @if(!$textarea)
        <input 
            type="{{ $type }}"
            name="{{ $name }}"
            value="{{ $value ?? '' }}"
            class="form-control"
            id="{{ $id }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            placeholder="{{ $placeholder }}"
        >
    @else
        <textarea 
            name="{{ $name }}"
            id="{{ $id }}"
            cols="{{ $cols }}"
            rows="{{ $rows }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            class="form-control editor"
            placeholder="{{ $placeholder }}"
        >
            {{ $value ?? '' }}
        </textarea>
    @endif
    <div>
        {{ $slot }}
    </div>
    <x-error :name='$name' />
</div>
