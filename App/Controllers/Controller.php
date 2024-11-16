<?php
/**
 * Le controller général
 */

 namespace App\Controllers;

use App\Models\Manager\Manager;
use App\Core\Database\Db;
use Exception;

 /**
  * Controller Mère
  */
 abstract class Controller
 {
    protected string $module;
    protected Manager $manager;


    /**
     * Définit les attributs $module et $manager
     * @throws \Exception
     */
    public function __construct()
    {
        $fille = get_called_class();
        $module = str_replace(__NAMESPACE__ . '\\', '', $fille);
        $module = str_replace('Controller', '', $module);
        $this->module = strtolower($module);

        $manager = 'App\Models\Manager\\' . ucfirst($this->module) . 'Manager';

        if(class_exists($manager)){
            $this->manager = new $manager(Db::getInstance());
        }else{
            throw new Exception('Le module appelé n\'existe pas');
        }
       
    }


    /**
     * REnvoie la liste des tuples du module
     * 
     */
    public function all()
    {
        $data =  $this->manager->findAll();
        $this->render('all', $data);
    }


    /**
     * Appelle la vue
     *
     * @param string $page la page à afficher
     * @param [type] $data les donnees à transmettre
     * @return void
     */
    public function render(string $page, $data){
        ob_start();
        require ROOT . '/views/' . $this->module . '/' . $page . '.php';
        $content = ob_get_clean();
        require ROOT .'/views/templates/default.php';
    }

    /**
     * Supprime un tuple et redirige vers la lisye du module
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        $this->manager->delete($id);
        header('Location: /'. $this->module);
    }

 }