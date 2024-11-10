<?php

namespace App\Models\Entity;

abstract class Entity
{
    /**
     * identifiant de l'entité
     * @var int
     */
    protected readonly int $id;

    
    public function hydrate(array $data):self
    {
        foreach($data as $key=>$value){
            $method = 'set' . ucfirst($key);
            if(method_exists(static::class, $method)){
                $this->$method($value);
            }else{
                throw new \Exception('la propriété ' . $key . ' n\'existe pas');
            }
        }

        return $this;
    }



	/**
	 * retourne identifiant de l'entité
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * modifie l'identifiant de l'entité
	 * @param int $id identifiant de l'entité
	 * @return self
	 */
	public function setId(int $id): self 
    {
        if($id <= 0){
            throw new \InvalidArgumentException('l\id est forcément sctrictement positif');
        }
		$this->id = $id;
		return $this;
	}
}