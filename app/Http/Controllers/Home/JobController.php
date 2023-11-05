<?php

namespace App\Http\Controllers\Home;

use App\Http\Resources\Home\JobCollection;
use App\Http\Resources\Home\JobResource;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Request as ModelsRequest;

class JobController extends Controller
{
    public function index(Request $request)
    {

        //filter by category and city and skill and province and paginate sort and search
        // $ordersType = $request->query('type');
        // $rowsPerPage = $request->query('per_page');
        $jobs = Job::query();

        $rowsPerPage = 10;
        // $rowsPerPage = $request->query('per_page');

        $sortBy = request()->query('sort_by');
        $category = request()->query('category');
        $descending = (request()->query('descending') == 'true'); // cast to boolean
//         $filter = request()->query('filter');

        $jobs->whereCategory($category);
// $jobs->whereLocation($category);
        $jobs->getOrderBy(orderBy: $sortBy, descending: $descending);
        $jobs= $jobs->getPagination(perPage: $rowsPerPage);
        return new JobCollection($jobs);

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($job)
    {
        $job= Job::where('id',$job)->first();
        return new JobResource($job);
    }




}
