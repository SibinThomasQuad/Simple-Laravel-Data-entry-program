<h1>Create sheet</h1>
<form method='post' action='{{url("/create")}}'>
  @csrf
Sheet Name:<input type='text' name='tname'>
Row:<input type='text' name='row'>
Colomn:<input type='text' name='col'>
<input type='submit' value='create'>
</form>
<h1>Sheet List</h1>
<?php
foreach($data as $dat)
{
?>
{{$dat->sheet_name}}&nbsp;<a href='{{url("/sheet")}}?table={{$dat->id}}'>OPEN</a>
<br>
<?php
}
?>
