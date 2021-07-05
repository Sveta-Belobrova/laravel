<!--<div class="form-group">
     {{--<label for="exampleInputEmail1">{{$label}}</label>--}}
{{--<input name="{{$name}}"value="{{$value}}" type="{{$type??'text'}}"--}}
    class="form-control" id="exampleInputEmail"
    aria-describedby="emailHelp" placeholder="Enter email">
<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>
-->
<div class="input-group">
    {{Form::input($type??'text', $name, $value?? null, [
   'class'=>'form-control',($errors->has($name)? ' is-invalid ':null),
   'required'=>$required??null,
   'placeholder'=>$placeholder??null,
   'step'=>$step??$attributes['step']??null,
   'max'=>$max??$attributes['max']??null,
   'min'=>$min??$attributes['min']??null,
   ]+($attributes??[]))}}
    @if($errors->has($name)===true)
        <div class="invalid-feedback">{{$errors->first($name)}}</div>
    @endif
</div>
