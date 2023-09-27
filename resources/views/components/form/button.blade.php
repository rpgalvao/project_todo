<button 
    class="btn {{$class}}" 
    type="{{empty($type) ? 'submit' : $type}}">
    {{$slot}}
</button>