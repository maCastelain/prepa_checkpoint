<?php

/**
 * Abstract manager file
 *
 * PHP Version 7.2
 *
 * @category Model
 * @package  Abstract
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */

namespace Model;

/**
 * Abstract class handling default manager.
 *
 * @category Model
 * @package  Abstract
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */
abstract class AbstractManager
{
    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * @var string
     */
    protected $table;
    /**
     * @var string
     */
    protected $className;


    /**
     * Initializes Manager Abstract class.
     *
     * @param string $table Given table to target
     * @param \PDO   $pdo   To use pdo into manager
     */
    public function __construct(string $table, \PDO $pdo)
    {
        $this->table = $table;
        $this->className = __NAMESPACE__ . '\\' . ucfirst($table);
        $this->pdo = $pdo;
    }

    /**
     * Get all rows from database.
     *
     * @return array
     */
    public function selectAll(): array
    {
        if ($this->table === "magasins") {
            $this->className .= "\Magasins";
        }
        /* Add other tables if table is in another directory */

        return $this->pdo
            ->query('SELECT * FROM ' . $this->table, \PDO::FETCH_CLASS, $this->className)
            ->fetchAll();
    }

    /**
     * Get one row from database by ID.
     *
     * @param int $id Given id
     *
     * @return array Fetching array
     */
    public function selectOneById(int $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=:id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}