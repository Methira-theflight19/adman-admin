<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\AwardSubCategory\AwardSubCategory;
class AwardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
       // return parent::toArray($request);
       public function toArray($request,$id)
       {
           // return parent::toArray($request);
           $subcat = AwardSubCategory::with('category')->whereHas('category', function($q) use ($id) {
            $q->where('award_cat_id', '=', $id); })->get();
        
            $award = Award::with('subcategory')->whereHas('subcategory', function($q) use ($id) {
                $q->where('award_sub_cat_id', '=', $id); })->get();
           return [
               'id'       => $request->id,
          
               'subcategory'    => AwardSubCategory::with('category')->whereHas('category', function($q) use ($id) {
                $q->where('award_cat_id', '=', $id); 
                })->get(),
                'award'     => Award::with('subcategory')->whereHas('subcategory', function($q) use ($id) {
                    $q->where('award_sub_cat_id', '=', $id); 
                })->get(),
           ];
       }
}
