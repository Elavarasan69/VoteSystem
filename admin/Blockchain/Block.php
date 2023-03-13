<?php

class Block{

public $index;
public $previous_hash; 
public $current_hash;
public $transaction;
public $timestamp; 
public $nonce;

function __construct($index = 1, $transaction, $previous_hash, $nonce = 0){
$this->index = $index ?? 1; 
$this->previous_hash = $previous_hash ?? str_repeat("0", 64);
$this->transaction = $transaction;
$this->timestamp = time();
$this->nonce = $nonce;
$this->current_hash = $this->getHash();

}

public function getHash(){

$data = [
$this->index,
$this->previous_hash,
$this->transaction,
$this->nonce
];
$data = json_encode($data);
$hash = hash('sha256', $data);
return $hash;
}
}

echo '<pre>';
$block = new Block(1,'Data 1','0',0);
print_r ($block);
?>