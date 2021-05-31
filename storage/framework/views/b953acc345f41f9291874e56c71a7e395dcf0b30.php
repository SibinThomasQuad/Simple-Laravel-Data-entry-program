<h1>Create sheet</h1>
<form method='post' action='<?php echo e(url("/create")); ?>'>
  <?php echo csrf_field(); ?>
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
<?php echo e($dat->sheet_name); ?>&nbsp;<a href='<?php echo e(url("/sheet")); ?>?table=<?php echo e($dat->id); ?>'>OPEN</a>
<br>
<?php
}
?>
<?php /**PATH /home/qu4d/dark/blog/resources/views/list.blade.php ENDPATH**/ ?>