<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\RequestCollection;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function getRequestAdvers($id){
        $requests = ModelsRequest::query();
        $requests->where('advertisement_id',$id);
        $rowsPerPage = 1;
        // $rowsPerPage = $request->query('per_page');

        $sortBy = request()->query('sort_by');
        $descending = (request()->query('descending') == 'true'); // cast to boolean
        $requests->getOrderBy(orderBy: $sortBy, descending: $descending);
        $requests= $requests->getPagination(perPage: $rowsPerPage);
        return new RequestCollection($requests);



    //         $filter = request()->query('filter');





    }
}
