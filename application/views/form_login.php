<?php
echo form_open('auth/login');

?>
<div class="col-sm-5">
<table class="table table-bordered">
	<tr><td>Username</td><td><input type="text" class="form-control" name="username" placeholder="username"></input></td></tr>
	<tr><td>Password</td><td><input type="password" class="form-control" name="password" placeholder="password"></input></td></tr>
	<tr align="center"><td colspan="2"><button type="submit" class="btn btn-danger" name="submit">LOGIN</button></td></tr>
</table></div>
	
</form>