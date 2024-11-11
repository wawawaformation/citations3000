<?php

use PHPUnit\Framework\TestCase;
use App\Models\Entity\AuthorsEntity; // Remplace avec une sous-classe concrète d'Entity


require 'vendor/autoload.php';
class EntityTest extends TestCase
{
    protected $entity;

    protected function setUp(): void
    {
        $this->entity = new AuthorsEntity(['id'=>12, 'author'=>'David LEGRAND', 'birthday'=>'1975-09-07']);
    }

    public function testHydrateWithValidData()
    {
        // Données d'exemple avec des clés ayant des setters correspondants
        $data = [
            'deathday' => '2040-01-01',
            'src' => 'public/images/david.webp'
        ];

        // Appel de la méthode hydrate
        $this->entity->hydrate($data);

        // Assertions pour vérifier que les propriétés ont été bien définies
        $this->assertEquals('2040-01-01', $this->entity->getDeathday());
        $this->assertEquals('public/images/david.webp', $this->entity->getSrc());
    }


    /*
    public function testHydrateWithInvalidData()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("la propriété invalidKey n'existe pas");

        $data = [
            'invalidKey' => 'valeur'
        ];

        $this->entity->hydrate($data);
    }

    public function testIdIsReadOnly()
    {
        // Exemple de test pour vérifier que l'ID ne peut pas être modifié
        $reflection = new ReflectionClass($this->entity);
        $property = $reflection->getProperty('id');
        $this->assertTrue($property->isProtected());
        $this->assertTrue($property->isReadOnly());
    }

    public function testHydrateWithEmptyData()
    {
        // Tester que la méthode ne lance pas d'exception avec un tableau vide
        $data = [];
        $this->entity->hydrate($data);

        // Assertion pour vérifier que rien n'a changé
        $this->assertTrue(true); // Ajoute des assertions spécifiques selon les comportements attendus
    }
        */
}
