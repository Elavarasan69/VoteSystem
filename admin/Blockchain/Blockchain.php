<?php
include 'Block.php';

class Blockchain
{
function _construct()
{
$this->chain = array();
}

function add($block)
{
$this->chain[] = $block;
}

function mine($block)
{
$block->num = count($this->chain);
$block->prev = $this->chain [count($this->chain)-1]->hash ?? zstr(64);
while (true)
{
if(substr($block->hash(), 0, 3) == zstr(3))
{
$this->add($block);
break;
}
else
{
$block->proof += 1;
}
}
}

function valid()
{
$chain = $this->chain; 
for ($i= 0; $i < count($chain); $i++)
{
$hash = $chain[$i]->prev; 
$prev = $chain[count($chain)-1]->hash;
if($hash !== $prev)
{
return false;
}
}
return true;
}
}

?>