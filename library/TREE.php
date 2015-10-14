<?php

/**
 * Created by PhpStorm.
 * User: fate
 * Date: 15/10/14
 * Time: 上午11:31
 */

const TRAVERSAL_ALGORITHM               =   1;
const BREADTH_FIRST                     =   10;
const DEPTH_FIRST                       =   11;

const RETURN_TYPE                       =   2;
const NODE                              =   20;
const TREE                              =   21;

class TREE
{
	static public function get($_id = 0, array $_data, $_options = []) {

		$_return_value                  =   [];

		$_options[TRAVERSAL_ALGORITHM]  =   $_options[TRAVERSAL_ALGORITHM] ?? 10;
		/* {{{ if not php7+
		!isset($_options[TRAVERSAL_ALGORITHM]) || empty($_options[TRAVERSAL_ALGORITHM]) ? $_options[TRAVERSAL_ALGORITHM] = BREADTH_FIRST;
		}}}*/

		if (0 !== $_id) {
			$_return_value['data']      =   self::__fetch($_id, $_data);
		}

		switch ($_options[TRAVERSAL_ALGORITHM]) {
			case DEPTH_FIRST:
				$_return_value['nodes'] =   self::__traversal_depth_first($_id, $_data);
				break;

			case BREADTH_FIRST:
			default:
				$_return_value['nodes'] =   self::__traversal_breadth_first($_id, $_data);
				break;
		}
	}

	static private function __fetch($_id, $_data) {

		$_node                          =   current($_data);

		do {
			if ($_node['id'] === $_id) return $_node;
		} while($_node = next($_data));

		return NULL;
	}

	static private function __traversal_bfs($_queue = [0], &$_data, &$_return_value) {

		if (!empty($_data)) {

			$_i                         =   0;

			while (isset($_queue[$_i])) {
				$_node                  =   0;

				do {
					if ($_data[$_node]['pid'] === $_queue[$_i++]) {

						if ([0] === $_queue) {
							$_return_value[]['data'] =   $_current_data  =   $_data[$_node];
						}
						else {
							$_return_value[$_i]['nodes'][]['data'] =   $_current_data  =   $_data[$_node];
						}

						$_queue[]       =   $_current_data['id'];
						unset($_data[$_node]);
					}
				} while(isset($_data[++$_node]));

			}
			self::__traversal_bfs($_queue, $_data, $_return_value);
		}

		return ;
	}

	static private function __traversal_dfs($_parent_id, &$_data) {

		$_return_value                  =   [];

		if (!empty($_data)) {
			$_node                      =   0;

			do {
				if ($_data[$_node]['pid'] === $_parent_id) {
					$_return_value[]['data']=   $_current_data  =   $_data[$_node];
					unset($_data[$_node]);
					$_sub_node              =   self::__traversal_dfs($_current_data['id'], $_data);
					if (!empty($_sub_node)) $_return_value[]['nodes']   =   $_sub_node;
				}
			} while(isset($_data[++$_node]));
		}

		return $_return_value;
	}
}