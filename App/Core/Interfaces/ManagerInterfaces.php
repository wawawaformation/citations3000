<?php

namespace App\Core\Interfaces;

Interface ManagerInterfaces
{
    /**
     * Return la liste des tuples dans une table
     * @return array
     */
    public function findAll():array;

    /**
     * Return un tuple
     * @param int $id d'intifiant du tuple
     * @return array
     */
    public function findOne(int $id):array;

    /**
     * Supprime un tuple
     * @param int $id identifiant du tuple à supprimer
     * @return bool
     */
    public function delete(int $id): bool;


    /**
     * Ajoute un tuple
     * @param array $data les champs renseignés du tuple
     * @return int l'identifiant du tuple
     */
    public function add(array $data): int;


    /**
     * Modifie un tuple
     * @param array $data les propriétés à modifier
     * @param int $id l'identifiant du tuple
     * @return array
     */
    public function update(array $data, int $id):array;
}