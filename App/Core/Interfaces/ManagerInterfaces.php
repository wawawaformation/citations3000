<?php

namespace App\Core\Interfaces;

Interface ManagerInterfaces
{   
    /**
     * liste l'ensemble des tuples d'une table
     */
    public function findAll():array;

    /**
     * retourne un tuple identifié par son id
     * @param int $id identifiant du tuple
     * @return array
     */
    public function findOne(int $id): array;


    /**
     * Supprime un tuple
     * @param int $id identitifiant du tuple à supprimer
     * @return bool
     */
    public function delete(int $id): bool;
    
    /**
     * Ajoute un tuple à la table
     * @param array $data les données du tuple à ajouter
     * @return int
     */
    public function add(array $data): int;


    /**
     * Modifie un tuple
     * @param array $data les données à modifier
     * @param int $id l'identifiant du tuple à modifier
     * @return array tuple modifié
     */
    public function update(array $data, int $id): array;
   
}