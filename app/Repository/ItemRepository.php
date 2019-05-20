<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 5/20/2019
 * Time: 5:23 PM
 */

namespace App\Repository;


use App\Models\Item;

class ItemRepository
{

    function save($data)
    {
        return Item::create($data);
    }

    static function findAll()
    {
        return Item::with('bill')->get();
    }

    function findById($id)
    {
        return Item::with('bill')->where('id',$id)->first();
    }

    function update($id, $data)
    {
        $item = Item::find($id);

        $new = $item->update($data);

        return $new;
    }

    function delete($id)
    {
        Item::destroy($id);
    }

}
