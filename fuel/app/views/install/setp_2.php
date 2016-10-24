<?php 


echo Form::open();

echo '<div class="row"><div class="col-sm-4">' . Form::label('Username ','admin') . '</div><div class="col-sm-8">' . Form::input('username','username') . '</div></div>';

echo '<div class="row"><div class="col-sm-4">' . Form::label('Password','password') . '</div><div class="col-sm-8">'. Form::input('password') . '</div></div>';
echo '<div class="row"><div class="col-sm-4">' . Form::label('Email','email') . '</div><div class="col-sm-8">'. Form::input('email') . '</div></div>';

echo '<div class="row"><div class="col-sm-4">' . Form::submit('save') . '</div></div>';

echo Form::close();