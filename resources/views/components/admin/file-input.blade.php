<div {{ $attributes->class(['form-group']) }}>

    {{-- @if($show_preview && $previewable)
        <div class="w-100 py-2">
            @if(!$multiple)
                <img id="{{ $imageId }}" src="{{ $old ?? '' }}" alt="" class="img-responsive"
                     style="max-height: 100px;">
            @else
                <div id="{{ $imageId }}"></div>
            @endif
        </div>
        <script>
            window.addEventListener('load', () => {
                previewImages("{{ $id }}", "{{ $imageId }}", {{ $multiple ? 'true' : 'false' }})
            })
        </script>
    @endif --}}

    <label for="{{ $name }}">{{ $label }} @if($required) <span class="text-danger">*</span> @endif</label>

    <input type="file"
           {{-- multiple="{{ $multiple }}" --}}
           name="{{ $name }}"
           value="{{ $value ?? '' }}"
           {{ $required ? 'required' : '' }}
           {{-- {{ $disabled ? 'disabled' : '' }} --}}
           class="form-control"
           id="{{ $name }}"
           placeholder="{{ $placeholder }}">
    <x-error :name='$name' />

</div>
