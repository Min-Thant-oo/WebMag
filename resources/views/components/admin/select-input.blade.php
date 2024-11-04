<div {{ $attributes->class(['form-group']) }}>
    <label for="{{ $name }}">{{ $label }} @if($required) <span class="text-danger">*</span> @endif</label>
    <select
        id="{{ $name }}"
        class="form-control"
        name="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
    >
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $option=>$value)
            <option {{ $is_selected($option) }} value="{{ $option }}">{{ $value }}</option>
        @endforeach
    </select>
    <div>
        {{ $slot }}
    </div>
    <x-error :name='$name' />
</div>
