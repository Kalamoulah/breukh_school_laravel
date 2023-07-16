<?php

namespace App\Traits;

use App\Models\Niveau;


trait JoinQueryParams
{
  public function joinTable($model, $joins)
  {
    $relations = explode(',', $joins);
    $result = [];
    foreach ($relations as $relation) {
      if (method_exists($model, $relation)) {
        array_push($result, $relation);
      }
    }
    return $model::with($result)->get();
  }
}