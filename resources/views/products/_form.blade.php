@include('forms._input', [
'label'=>'Имя',
'name'=>'name',
'type'=>'text',
'value'=>isset($product)?$product->getName():'',
])
@include('forms._input', [
'label'=>'описание',
'name'=>'description',
'type'=>'text',
'value'=>isset($product)?$product->getDescription():'',
])
@include('forms._input', [
'label'=>'цена',
'name'=>'price',
'type'=>'int',
'value'=>isset($product)?$product->getPrice():'',
])
