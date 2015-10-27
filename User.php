<?php

class User
{
    /**
     * @var array
     */
    private $properties;

    public function __construct(array $properties = array())
    {
        $this->properties = $properties;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getName()
    {
        if(isset ($this->properties['name'])) {
            return $this->properties['name'];
        }

        return 'User';
    }

    public function drink($beverage)
    {
        return $this->getName() . ' drink ' . $beverage;
    }
}