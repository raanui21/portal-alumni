<div class="form-container">
    <h2>{{ $title }}</h2>
    <form method="POST" action="{{ $action }}" class="form">
        
        @csrf
        @if($methode !== 'POST')
            @method($methode)
        @endif

        @foreach($fields as $field)
            <div class="form-group">
                <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>

                @if($field['type'] === 'textarea')
                    <textarea id="editor" name="{{ $field['name'] }}">{{ old($field['name'], $field['value'] ?? '') }}</textarea>
                @else
                    <input id="{{ $field['name'] }}" type="{{ $field['type'] }}" name="{{ $field['name'] }}" 
                        {{ isset($field['required']) && $field['required'] ? 'required' : '' }} 
                        autocomplete="{{ $field['name'] }}" value="{{ old($field['name'], $field['value'] ?? '') }}">
                @endif

                @error($field['name'])
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        @endforeach

        <div class="form-group">
            <button type="submit" class="redbtn">Submit</button>
        </div>
    </form>
</div>
