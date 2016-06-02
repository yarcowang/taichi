<?php
require __DIR__ . '/bootstrap.php';
require LIBDIR . '/Context.php';

$data = array(
	'global' => 'anonymous',
	'any' => 'user',
	'Company:1' => 'admin'
);

$cxt = new Yarco\Taichi\Context;

$t = $cxt->choose('global', $data);
print $t === 'anonymous' ? '' : "failed when choosing `global`, suppose `anonymous` but get $t\n";

$t = $cxt->choose('Nothing:1', $data);
print $t === 'user' ? '' : "failed when choosing `Nothing:1`, suppose `user` but get $t\n";

$t = $cxt->choose('Company:1', $data);
print $t === 'admin' ? '' : "failed when choosing `Company:1`, suppose `admin` but get $t\n";
