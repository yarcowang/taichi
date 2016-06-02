<?php
require __DIR__ . '/bootstrap.php';
require LIBDIR . '/Context.php';
require LIBDIR . '/Resource.php';
require LIBDIR . '/Perm.php';

use Yarco\Taichi\Perm;

$perm = new Perm;
$perm->ContextRoles = array(
	'global' => 'user',
	'Org:1' => 'admin',
	'Org:2' => 'member'
);

$perm->RoleResContextOps = array(
	'anonymous' => array(
		'any' => array(
			'any' => Perm::OPNULL
		)
	),
	'user' => array(
		'any' => array(
			'any' => Perm::READ
		)
	),
	'admin' => array(
		'Project:any' => array(
			'any' => Perm::OPALL
		)
	),
	'member' => array(
		'Project:1' => array(
			'Org:2' => Perm::READ
		)
	)
);

$t = $perm->check(Perm::READ, 'Project:1', 'Org:0'); // anonymous
print $t;

$t = $perm->check(Perm::READ, 'Project:1'); // global
print $t;

$t = $perm->check(Perm::DELETE, 'Project:1', 'Org:1'); // Org:1
print $t;

