<?php

Route::resource('loads', 'LoadsController', [
   'except' => ['create', 'edit', 'show']
]);
