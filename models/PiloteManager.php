<?php

class PiloteManager extends Model
{
    public function getPilotes()
    {
        $this->getBdd();
        return $this->getAll('pilotes', 'Pilote');
    }
}