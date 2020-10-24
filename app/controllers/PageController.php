<?php

namespace App\Controllers;

use App\App\App;
use App\Models\Item;
use App\Models\Model;

/**
 * Class PageController
 * @package App\Controllers
 */
class PageController
{

    public $app;
    public $db;

    public function __construct()
    {
        $this->app = new App();
        $this->db =  $this->app->get('database');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $title = "Home";
        $items = $this->db->getAll('items', Item::class);
        $data = compact("title", "items");

        return view("pages/index.php", $data);
    }

    public function testGet()
    {
        $title = "Test Get";
        $items = $this->db->getAll('items', Item::class);
        $data = compact("title", "items");

        return view("pages/test-get.php", $data);
    }

    public function testPost()
    {
        $title = "Test Post";
        $new_item = $this->db->insertData('items', $_POST);
        $items = $this->db->getAll('items', Item::class);
        $data = compact("title", "items");

        return view("pages/test-post.php", compact("title", "items"));
    }

    public function testViewSingleItem()
    {
        $title = "Test Get";
        $items = App::get('database')->getAll('items', Item::class);

        return view("pages/test-get.php", compact("title", "items"));
    }
}