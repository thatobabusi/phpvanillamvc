<?php

namespace App\Models;

use App\App\App;

class Item extends Model
{

    protected $table = "items";

    /**
     * Accessible fields
     */
    public $description;

    /**
     * Protected fields
     */
    protected $completed;


    public static function getItems(){
        return App::get('database')->getAll('items', Item::class);
    }

    /**
     * @return mixed
     */
    public function isComplete()
    {
        return $this->completed;
    }

    public function complete()
    {
        $this->completed = true;
    }



}