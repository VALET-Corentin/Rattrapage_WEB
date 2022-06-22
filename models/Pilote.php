<?php

class Pilote
{
    private $_id;
    private $_lastName;
    private $_firstName;
    private $_date;

    //Constructeur
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    //Hydratation
    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method))
                $this->$method($value);
        }
    }

    //Setters
    public function setId($id)
    {
        $id = (int) $id;

        if($id > 0)
            $this->_id = $id;
    }
    public function setLastName($lastName)
    {
        if(is_string($lastName))
            $this->_lastName = $lastName;
    }
    public function setfirstName($firstName)
    {
        if(is_string($firstName))
            $this->_firstName = $firstName;
    }


    //Getters
    public function id()
    {
        return $this->_id;
    }
    public function lastName()
    {
        return $this->_lastName;
    }
    public function firstName()
    {
        return $this->_firstName;
    }
}