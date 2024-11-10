<?php
namespace App\Models\Entity;

/**
 * Représente la table authors
 */
final class AuthorsEntity extends Entity
{
    

    /**
     * Nom de l'auteur
     * @var string
     */
    private string $author;

    /**
     * Date de naissance de l'auteur
     * @var string
     */
    private string $birthday;

    /**
     * Date de décès de l'auteur
     * @var 
     */
    private ?string $deathday=null; 

    /**
     * Biography de l'auteur
     * @var 
     */
    private ?string $biography=null;

    /**
     * Le src de l'image de l'auteur
     * @var 
     */
    private ?string $src=null;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    



	/**
	 * Nom de l'auteur
	 * @return string
	 */
	public function getAuthor(): string {
		return $this->author;
	}
	
	/**
	 * Nom de l'auteur
	 * @param string $author Nom de l'auteur
	 * @return self
	 */
	public function setAuthor(string $author): self 
    {
        if(strlen($author) > 128){
            throw new \InvalidArgumentException('le nom de l\'auteur ne doit pas dépasser 128 caracteres');
        }
		$this->author = $author;
		return $this;
	}

	/**
	 * Date de naissance de l'auteur
	 * @return string
	 */
	public function getBirthday(): string {
		return $this->birthday;
	}
	
	/**
	 * Date de naissance de l'auteur
	 * @param string $birthday Date de naissance de l'auteur
	 * @return self
	 */
	public function setBirthday(string $birthday): self {
		$this->birthday = $birthday;
		return $this;
	}

	/**
	 * Date de décès de l'auteur
	 * @return 
	 */
	public function getDeathday(): ?string {
		return $this->deathday;
	}
	
	/**
	 * Date de décès de l'auteur
	 * @param  $deathday Date de décès de l'auteur
	 * @return self
	 */
	public function setDeathday(?string $deathday = null): self {
		$this->deathday = $deathday;
		return $this;
	}

	/**
	 * Biography de l'auteur
	 * @return 
	 */
	public function getBiography(): ?string {
		return $this->biography;
	}
	
	/**
	 * Biography de l'auteur
	 * @param  $biography Biography de l'auteur
	 * @return self
	 */
	public function setBiography(?string $biography=null): self {
		$this->biography = $biography;
		return $this;
	}

	/**
	 * Le src de l'image de l'auteur
	 * @return 
	 */
	public function getSrc(): ?string {
		return $this->src;
	}
	
	/**
	 * Le src de l'image de l'auteur
	 * @param  $src Le src de l'image de l'auteur
	 * @return self
	 */
	public function setSrc(?string $src): self {
        /*
        if(strlen($src > 256)){
            throw new \InvalidArgumentException('Le src ne peut pas dépasser 256 caractères');
        }
            */
		$this->src = $src;
		return $this;
	}
}