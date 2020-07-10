<?php

function kthSmallest($root, $k) {
	$result = null;
	$count = 0;
	$this->inOrder($root, $result, $count, $k);
	return $result;
}

function inOrder($root, &$out, &$count = 0, &$k) {
	if ($root) {
		if ($root->left) {
			$this->inOrder($root->left, $out, $count, $k);
		}
		if (++$count === $k) {
			$out = $root->val;
			return; // no need to check right
		}
		if ($root->right) {
			$this->inOrder($root->right, $out, $count, $k);
		}
	}
}

$root = '{"val":3,"left":{"val":1,"left":null,"right":{"val":2,"left":null,"right":null}},"right":{"val":4,"left":null,"right":null}}';

$temp = kthSmallest($root, 1);
echo json_encode($temp);
exit;