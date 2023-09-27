<div class="inputArea">
    <label
        for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <input 
        type="{{(empty($type)) ? 'text' : $type}}" 
        name="{{$name}}" 
        id="{{$name}}" 
        value="{{$value ?? ''}}" 
        placeholder="{{$placeholder ?? ''}}" 
        {{(empty($required)) ? '' : "required"}}
        />
</div>