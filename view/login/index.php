<div class=" col-md-6 col-md-offset-3">
<div class="panel panel-default">
  <div class="panel-heading">Login</div>
  <div class="panel-body">
<form action="" method="post">

<div class="form-group">
<label>Username</label>
<input name="username" type="text" class="form-control">
</div>

<div class="form-group">
<label>Password</label>
<input name="password" type="password" class="form-control">
</div>
<div class="col-md-8 col-md-offset-2"><h4 style="color:red"><center><?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?></center></h4></div>
    <button type="submit" value="entrar" name="acao" class="btn btn-default col-md-4 col-md-offset-4">Logar</button>

</form>
</div>
</div>
</div>
