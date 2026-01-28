<div class="form-inline">
    {{ Form::date($name . '[from]', $input['from'] ?? null , ['class' => 'form-control input-sm']) }}
    {{ $separator }}
    {{ Form::date($name . '[to]', $input['to'] ?? null, ['class' => 'form-control input-sm']) }}
</div>
