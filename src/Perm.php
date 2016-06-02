<?php
/**
 * @file Perm.php
 * perm
 *
 * @author Yarco <yarco.wang@gmail.com>
 * @since 2016-06-02
 */
/* vim: set tabstop=2 shiftwidth=2 softtabstop=2 noexpandtab ai si: */

namespace Yarco\Taichi;

class Perm
{
	const CREATE = 0x1;
	const READ = 0x2;
	const UPDATE = 0x4;
	const DELETE = 0x8;

	const OPNULL = 0x0;
	const OPALL = 0xF;

	public $ContextRoles;
	public $RoleResContextOps;

	public function getRoleByContext($context)
	{
		$role = Context::choose($context, $this->ContextRoles);
		return $role === null ? 'guest' : $role;
	}

	public function getPermByRoleResContext($role, $resource, $context)
	{
		if (!isset($this->RoleResContextOps[$role])) {
			return self::OPNULL;
		}

		$p = & $this->RoleResContextOps[$role];
		$c = Resource::choose($resource, $p);

		$perm = Context::choose($context, $c);
		if ($perm === null) return self::OPNULL;
		return $perm;
	}

	public function check($action, $resource, $context = null)
	{
		$role = $this->getRoleByContext($context);
		$perm = $this->getPermByRoleResContext($role, $resource, $context);
		return $action & $perm;
	}
}
