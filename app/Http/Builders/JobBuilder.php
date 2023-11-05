<?php

namespace App\Http\Builders;

use Illuminate\Database\Eloquent\Builder;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class JobBuilder extends Builder
{
    public function whereStatus(?string $type): self
    {
        return $this->where('status',$type);
    }
    public function whereCategory(?string $category_id): self
    {
        if ($category_id == null||$category_id == 'null') return $this;
        return $this->where('category_id',$category_id);
    }


    public function whereFilter(?string $filter): Builder
    {
        if ($filter == 'null') return $this;

        return $this->where('first_name', 'LIKE', '%'.$filter.'%')
            ->orWhere('last_name', 'LIKE', '%'.$filter.'%')
            ->orWhere(DB::raw("concat(first_name, ' ', last_name)"), 'LIKE', "%".$filter."%")
            ->orWhere('email', 'LIKE', '%'.$filter.'%')
            ->orWhere('mobile', 'LIKE', '%'.$filter.'%')
            ->orWhere('national_id', 'LIKE', '%'.$filter.'%');
    }

    public function getOrderBy(?string $orderBy = 'created_at', ?bool $descending): Builder
    {
        if (empty($orderBy) || $orderBy == 'null') return $this->orderBy('created_at','desc');;
        // return $this->orderBy('created_at','desc');
        if ($orderBy == 'id') {
            $orderBy = 'id';
        }

        return $this->orderBy($orderBy, $descending ? 'desc' : 'asc');
    }

    public function getPagination($perPage): LengthAwarePaginator
    {
        if ($perPage == 0) {
            $builder = $this->paginate($this->count());
        } else if (!is_numeric($perPage)) {
            $builder = $this->paginate();
        } else {
            $builder = $this->paginate($perPage);
        }

        return $builder;
    }
}
