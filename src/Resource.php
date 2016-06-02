<?php
/**
 * @file Resource.php
 * resource
 *
 * @author Yarco <yarco.wang@gmail.com>
 * @since 2016-06-02
 */
/* vim: set tabstop=2 shiftwidth=2 softtabstop=2 noexpandtab ai si: */

namespace Yarco\Taichi;

class Resource
{
	/** choose the role definition by resource {{{
	 *
	 * @param string resource, one of "any", "Model", "Model:any", "Model:<id>"
	 * @param array array of data storing Resource,Context,Ops
	 * @return value
	 */
	public static function choose($resource, array $data = array())
	{
		// check special
		if ($i = strpos($resource, ':')) {
			if (isset($data[$resource])) {
				return $data[$resource];
			} else {
				$model = substr($resource, 0, $i);
				if (isset($data[$model . ':any'])) {
					return $data[$model . ':any'];
				} else {
					if (isset($data['any'])) {
						return $data['any'];
					} else {
						return null;
					}
				}
			}
		}

		// create Model
		if ($resource !== 'any') {
			if (isset($data[$resource])) {
				return $data[$resource];
			} else {
				if (isset($data['any'])) {
					return $data['any'];
				} else {
					return null;
				}
			}
		}

		// check any
		if (isset($data['any'])) {
			return $data['any'];
		}

		return null;
	}
	/*}}}*/
}
