<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\AdvertisementCollection;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
  public function getAdversCompany($id){
    
    $advertisements = Advertisement::query();
    $advertisements->where('company_id',$id);
    $rowsPerPage = 1;
    // $rowsPerPage = $request->query('per_page');

    $sortBy = request()->query('sort_by');
    $descending = (request()->query('descending') == 'true'); // cast to boolean
//         $filter = request()->query('filter');


    $advertisements->getOrderBy(orderBy: $sortBy, descending: $descending);
    $advertisements= $advertisements->getPagination(perPage: $rowsPerPage);
    return new AdvertisementCollection($advertisements);

  }
}
