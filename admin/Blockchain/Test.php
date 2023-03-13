<?php
include 'Block.php';
include 'Blockchain.php'; 
echo ('<pre>');
$block= new Blockchain;
$block->mine(new Block(0, NULL, 'Hello'));
$nx = $block->chain[1];
$nx->data = 'Hello33';
$block0 > mine($nx);
$block->mine(new Block(0, NULL, 'Hello 2'));
var_dump($block->valid()); 
print_r($block);
?>