<?php
$row=$data->row;
$colomn=$data->col;
$datas=json_decode($data->data);

?>
<table border='1' id='sheet'>
<?php
for($i=0;$i<$row;$i++)
{
?>
<tr>
  <?php
  for($j=0;$j<$colomn;$j++)
  {
  $key="r".$i."c".$j;
  if(isset($datas->$key))
  {
  $content=$datas->$key;
  }
  else {
    $content='';
  }

  ?>
  <td><input onkeyup="flash('<?php echo e($key); ?>',this.value);" value='<?php echo e($content); ?>' type='text' name='n<?php echo e($i); ?>-<?php echo e($j); ?>'></td>
  <?php
  }
  ?>
</tr>
<?php
}
?>
<input type='hidden' id='row_count'>
<input type='hidden' id='col_count'>
<button onclick='addrow();'>Add Row</button>
<button onclick='addcol();'>Add Colmn</button>
</table>
<script>
function flash(location,content)
{
  var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       //document.getElementById("demo").innerHTML = xhttp.responseText;
    }
};
xhttp.open("GET", "<?php echo e(url('/live-save')); ?>?id=<?php echo e($data->id); ?>&location="+location+"&content="+content, true);
xhttp.send();
}
function addrow()
{

  var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //aading Row
      get_count_e('1');
      get_count_e('0');
      setTimeout(function(){
      var col = document.getElementById("col_count").value;
      var rows = document.getElementById("row_count").value;
      var table = document.getElementById("sheet");
      var row = table.insertRow(rows-1);
      var i;
      for ( i=0; i < col; i++)
      {
         var tracker=rows-1;
         var key='r'+tracker+'c'+i;
         row.insertCell(i).innerHTML="<input onkeyup='flash(`"+key+"`,this.value);' type='text' name='n"+tracker+"-"+i+"'>";
      }
    }, 1000);
      //aading row

    }
};
xhttp.open("GET", "<?php echo e(url('/add')); ?>?id=<?php echo e($data->id); ?>&curve=0", true);
xhttp.send();
}
function addcol()
{
  var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var tblBodyObj = document.getElementById('sheet').tBodies[0];
      get_count_e('1');
      get_count_e('0');
      setTimeout(function(){
      var col = document.getElementById("col_count").value;
      var rows = document.getElementById("row_count").value;
	    for (var i=0; i<tblBodyObj.rows.length; i++) {
        var tracker=col-1;
        var key='r'+i+'c'+tracker;
		    var newCell = tblBodyObj.rows[i].insertCell(-1);
		      newCell.innerHTML = "<input onkeyup='flash(`"+key+"`,this.value);' type='text' name='n"+i+"-"+tracker+"'>";
	       }
        }, 1000);
    }
};
xhttp.open("GET", "<?php echo e(url('/add')); ?>?id=<?php echo e($data->id); ?>&curve=1", true);
xhttp.send();
}
function get_count_e(type_request)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         if(type_request==0)
         {
           document.getElementById("col_count").value=xhttp.responseText;
         }
         else
         {
           document.getElementById("row_count").value=xhttp.responseText;
         }

        }
      };
      xhttp.open("GET", "<?php echo e(url('/count')); ?>?id=<?php echo e($data->id); ?>&curve="+type_request, true);
      xhttp.send();
      return 2;
}
</script>
<?php /**PATH /home/qu4d/dark/blog/resources/views/sheet.blade.php ENDPATH**/ ?>