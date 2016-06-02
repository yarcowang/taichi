<?php
/**
 * @file Context.php
 * content
 *
 * @author Yarco <yarco.wang@gmail.com>
 * @since 2016-06-02
 */
/* vim: set tabstop=2 shiftwidth=2 softtabstop=2 noexpandtab ai si: */

namespace Yarco\Taichi;

class Context
{

	/** choose the role {{{
	 *
	 * @param string current context, one of "any", "global", "<Model>:<id>"
	 * @param array data which store context related information
	 * @return value
	 */
	public static function choose($context, array $data = array())
	{
		// global
		if ($context === null) {
			if (isset($data['global'])) {
				return $data['global'];
			} else {
				if (isset($data['any'])) {
					return $data['any'];
				} else {
					return null;
				}
			}
		}

		// special, Model::<id>
		if (isset($data[$context])) {
			return $data[$context];
		}

		// any
		if (isset($data['any'])) {
			return $data['any'];
		}

		return null;
	}
	/*}}}*/

}
