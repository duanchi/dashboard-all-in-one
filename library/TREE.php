<?php

/**
 * Created by PhpStorm.
 * User: fate
 * Date: 15/10/14
 * Time: 上午11:31
 */

const TRAVERSAL_ALGORITHM               =   1;
const TRAVERSAL_BFS                     =   10;
const TRAVERSAL_DFS                     =   11;

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
			case TRAVERSAL_DFS:
				$_return_value['nodes'] =   self::__traversal_dfs($_id, $_data);
				break;

			case TRAVERSAL_BFS:
			default:
			$_return_value['nodes']     =   self::__traversal_bfs($_id, $_data);
				break;
		}

		return $_return_value;
	}

	static private function __fetch($_id, $_data) {

		$_node                          =   current($_data);

		do {
			if ($_node['id'] === $_id) return $_node;
		} while($_node = next($_data));

		return NULL;
	}

	static private function __traversal_bfs($_parent_id = 0, $_data) {

		$__return_value                 =   [];

		if (!empty($_data)) {
			while (list($__key, $__node) = each($_data)) {
				if ($_parent_id === $__node['pid']) {
					unset($_data[$__key]);
					$__return_value[]    = [
						'data'  =>  $__node
					];
				}
			}

			while (list($__key, $__node) = each($__return_value)) {
				$__return_value[$__key]['nodes'] =   self::__traversal_bfs($__node['data']['id'], $_data);
			}
		}

		return $__return_value;
	}

	static private function __traversal_dfs($_parent_id = 0, $_data) {

		$__return_value                 =   [];

		if (!empty($_data)) {
			while (list($__key, $__node) = each($_data)) {
				if ($_parent_id === $__node['pid']) {
					unset($_data[$__key]);
					$__return_value[]   = [
						'data'  =>  $__node,
					    'nodes' =>  self::__traversal_dfs($__node['id'], $_data)
					];
				}
			}
		}

		return $__return_value;
	}
}