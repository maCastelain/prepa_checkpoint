<?php

/**
 * Magasins entity file
 *
 * PHP Version 7.2
 *
 * @category Model
 * @package  Model
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */

namespace Model\Magasins;

/**
 * Magasins entity
 *
 * @category Model
 * @package  Model
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */
class Magasins
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }
}
