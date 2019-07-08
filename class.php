<?php
class person
{
    protected $name;
    protected $surname;
}

class teacher extends person
{
    function getSurname()
    {
        return $this->surname;
    }
    function setSurname($surname)
    {
        $this->surname = $surname;
    }
}

class student extends person
{
    function name_surname()
    {
        echo $this->name . ' ' . $this->surname;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
    }
}

$student = new student();
$student->setName('kaan');
echo $student->getName();
$techer = new teacher();
$techer->setSurname('bozdag');
echo $techer->getSurname();
