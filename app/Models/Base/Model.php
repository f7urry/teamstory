<?php
namespace App\Models\Base;

abstract class Model extends \Illuminate\Database\Eloquent\Model {
    //protected $fillable=['*'];
    public static function tablename() {
        return (new static())->table;
    }

    private function getTableColumns() {
        return $this->getConnection()
            ->getSchemaBuilder()
            ->getColumnListing($this->getTable());
    }

    public function scopeExclude($query, $columns) {
        return $query->select(array_diff($this->getTableColumns(), (array) $columns));
    }
}