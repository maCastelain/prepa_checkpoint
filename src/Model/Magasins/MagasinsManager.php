<?php

/**
 * User manager file
 *
 * PHP Version 7.2
 *
 * @category Model
 * @package  Manager
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */

namespace Model\Magasins;

use Model\AbstractManager;
use Model\Magasins\Magasins;

/**
 *
 * @category Model
 * @package  Manager
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */
class MagasinsManager extends AbstractManager
{
    /**
     * Targeted table const
     */
    const TABLE = 'magasins';

    /**
     *  Initializes this class.
     *
     * @param \PDO $pdo To use pdo into manager
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    /**
     * Add method
     *
     *
     * @return int|null
     */
    public function add(Magasins $magasins)
    {
        $statement = $this->pdo
            ->prepare("INSERT INTO $this->table VALUES (null, :name, :content)");
        $statement->bindValue('name', $magasins->getName(), \PDO::PARAM_STR);
        $statement->bindValue('content', $magasins->getContent(), \PDO::PARAM_STR);

        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }

        return null;
    }

    /**
     * Add method
     *
     * @param User $user Given user to insert
     *
     * @return int|null
     */
    public function edit(Magasins $magasin): ?int
    {
        $statement = $this->pdo
            ->prepare("UPDATE $this->table SET `name` = :name, `content` = :content WHERE id=:id");
        $statement->bindValue('id', $magasin->getId(), \PDO::PARAM_INT);
        $statement->bindValue('name', $magasin->getName(), \PDO::PARAM_STR);
        $statement->bindValue('content', $magasin->getContent(), \PDO::PARAM_STR);

        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }

        return null;
    }

    /**
     * Delete method
     *
     * @param int $id
     */
    public function delete(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}
