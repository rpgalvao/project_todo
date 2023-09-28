<div class="inputArea">
    <label
        for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <input 
        type="checkbox" 
        name="{{$name}}" 
        id="{{$name}}" 
        value="1" 
        {{$checked ? 'checked' : ''}} 
        {{(empty($required)) ? '' : "required"}}
        />
</div>