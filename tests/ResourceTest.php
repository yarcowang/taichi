<?php
require __DIR__ . '/bootstrap.php';
require LIBDIR . '/Resource.php';

$data = array(
	'any' => 'any',
	'Model' => 'model',
	'Model:any' => 'model:any',
	'Model:1' => 'model:1',
);

$res = new Yarco\Taichi\Resource;

$t = $res->choose('Nothing:1', $data);
print $t === 'any' ? '' : "failed when choosing `Nothing:1`, suppose `any` but get $t\n";

$t = $res->choose('Model', $data);
print $t === 'model' ? '' : "failed when choosing `Model`, suppose `model` but get $t\n";

$t = $res->choose('Model:2', $data);
print $t === 'model:any' ? '' : "failed when choosing `Model:2`, suppose `model:any` but get $t\n";

$t = $res->choose('Model:1', $data);
print $t === 'model:1' ? '' : "failed when choosing `Model:1`, suppose `model:1` but get $t\n";

