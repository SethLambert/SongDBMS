<div class='container-fluid'>
<h3>Edit Song</h3>

<form action='index.php?type=updateInfo' method='post'>
<table class='table'>
<input type='hidden' name='song_id' id='song_id' 
	value='<?php echo $data['song_id']; ?>'/>
<tr>
  <td>Song Title:</td><td><input type='text' name='song_title' id='song_title' 
	value='<?php echo $data['song_title']; ?>' /></td>
</tr>
<tr>
  <td>Terms:</td><td><input type='text' name='terms' id='terms'
        value='<?php echo $data['terms']; ?>' /></td>
</tr>
<tr>
  <td>Tempo:</td><td><input type='text' name='tempo' id='tempo'
        value='<?php echo $data['tempo']; ?>' /></td>
</tr>
<tr>
  <td>Popularity:</td><td><input type='text' name='popularity' id='popularity'
        value='<?php echo $data['popularity']; ?>' /></td>
</tr>
<tr>
  <td>Year:</td><td><input type='text' name='year' id='year'
        value='<?php echo $data['year']; ?>' /></td>
</tr>
</table>
<p><button type='submit' class='btn btn-primary'>Update</button>
</form>
</div>
