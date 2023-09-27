<div class="inputArea">
    <label
        for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <select 
        name="{{$name}}" 
        id="{{$name}}"
        {{(empty($required)) ? '' : "required"}}>
        <option value="" selected disabled>Selecione a sua opção</option>
        {{$slot}}
    </select>
</div>