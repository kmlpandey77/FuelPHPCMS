<?php 


echo Form::open();

echo '<div class="row"><div class="col-sm-4">' . Form::label('Host ','host') . '</div><div class="col-sm-8">' . Form::input('host','localhost') . '</div></div>';

echo '<div class="row"><div class="col-sm-4">' . Form::label('DB name ','db_name') . '</div><div class="col-sm-8">'. Form::input('db_name') . '</div></div>';

echo '<div class="row"><div class="col-sm-4">' . Form::label('Username ','username') . '</div><div class="col-sm-8">' . Form::input('username') . '</div></div>';

echo '<div class="row"><div class="col-sm-4">' . Form::label('Password ','password') . '</div><div class="col-sm-8">' . Form::input('password') . '</div></div>';

echo '<div class="row"><div class="col-sm-4">' . Form::submit('save') . '</div></div>';

echo Form::close();