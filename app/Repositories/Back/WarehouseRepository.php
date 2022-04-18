<?php

namespace App\Repositories\Back;

use App\Models\Warehouse;
use App\Models\Item;

class WarehouseRepository
{

      /**
       * Store warehouse.
       *
       * @param  \App\Http\Request  $request
       * @return void
       */

      public function store($request)
      {
            $input = $request->all();
            Warehouse::create($input);
      }

      /**
       * Update warehouse.
       *
       * @param  \App\Http\Request  $request
       * @return void
       */

      public function update($warehouse, $request)
      {
            $input = $request->all();
            $warehouse->update($input);
      }

      /**
       * Delete warehouse.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */

      public function delete($warehouse)
      {
            
            $check = Item::where('warehouse_id', $warehouse->id)->get();

            if($check->count() > 0){
                  return ['message' => __('This Warehouse allready used with a product. Please change this warehouse then delete this warehouse') , 'status' => 0];
            }
            else{
                  $warehouse->delete();
                  return ['message' => __('Warehouse Deleted Successfully.'),'status' => 1];
            }
      }
}
