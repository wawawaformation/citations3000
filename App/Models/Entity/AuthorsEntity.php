<?php
namespace App\Models\Entity;

/**
 * Représente la table authors
 */
class AuthorsEntity
{
    /**
     * identifiant du tuple
     * @var int
     */
    private readonly int $id;

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

    public function hydrate(array $data):self
    {
        foreach($data as $key=>$value){
            $method = 'set' . ucfirst($key);
            if(method_exists(__CLASS__, $method)){
                $this->$method($value);
            }else{
                throw new \Exception('la propriété ' . $key . ' n\'existe pas');
            }
        }

        return $this;
    }



	/**
	 * identifiant du tuple
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * identifiant du tuple
	 * @param int $id identifiant du tuple
	 * @return self
	 */
	public function setId(int $id): self 
    {
        if($id <= 0 ){
            throw new \InvalidArgumentException('id doit être strictement positif');
        }
		$this->id = $id;
		return $this;
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
        if(strlen($src > 256)){
            throw new \InvalidArgumentException('Le src ne peut pas dépasser 256 caractères');
        }
		$this->src = $src;
		return $this;
	}
}