<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'role_permissions';
    protected $primaryKey = ['role_id', 'permission_id'];
    public $incrementing = false;
    protected $dates = ['created_at', 'updated_at'];

    /**
     *  set the keys for a save update query
     *
     *  @return \Illuminate\Database\Eloquent\Builder
     */

    protected function setKeyForSaveQuery($query){
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName , '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }
}
