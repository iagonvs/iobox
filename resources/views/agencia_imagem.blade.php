@extends('layouts.template')

@section('content')
<?php 
if(isset($_POST['wintr']))
{
exec('Autumn2.bat');
echo "<br>Autumn aberto com sucesso! <br>";
} else {
?> (Ao clicar no botao, aguarde 5 segundos!)
<form action="" method="post">
<input type="submit" class="btn btn-primary" name="wintr" value="WinTR">
</form>
<?php } ?>

@endsection