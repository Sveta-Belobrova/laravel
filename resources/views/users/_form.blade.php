@include('forms._input', [
'label'=>'Имя',
'name'=>'name',
'type'=>'text',
'value'=>isset($user)?$user->getName():'',
])
@include('forms._input', [
'label'=>'Email',
'name'=>'email',
'type'=>'email',
'value'=>isset($user)?$user->getEmail():'',
])
@include('forms._input', [
'label'=>'Пароль',
'name'=>'password',
'type'=>'text',
'value'=>isset($user)?$user->getPassword():'',
])
