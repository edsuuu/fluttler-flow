<?php

namespace App\Models;
class FlutterApiResponse
{
    public $name;
    public $description;
    public $category;
    public $status;
    public $created_at;
    public $updated_at;
    public $items;

    public function __construct($name, $description, $category, $status)
    {
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->status = $status;
        $this->created_at = now();
        $this->updated_at = now();
        $this->items = [];
    }

    public function addItem($item): void
    {
        $this->items[] = $item;
    }

    // para retornar o dado na controller
    public function toJson()
    {
        return response()->json(get_object_vars($this));
    }
}
