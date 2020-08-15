<?php


namespace Demo\Core\Services;


use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class QueryPagination
{
    public $offset;
    public $limit = -1;
    protected $data;

    /**
     * @var $query Builder
     */
    public function __construct($pagination = null)
    {
        if (empty($pagination)) {
            $pagination = $pagination = Request::input('pagination');
        }
        if ($pagination['limit'] !== 0 || !empty($pagination['limit'])) {
            $this->limit = $pagination['limit'];
        }
        $this->offset = $pagination['offset'];
    }

    public function sql()
    {
        $sql = ' offset ' . $this->offset;
        if (!empty($this->offset)) {
            $sql = $sql . ' limit ' . $this->limit;
        }
        return $sql . ' ';
    }

    public function clean()
    {
        $this->data = $this->toArray();
        return $this;
    }

    public function restore()
    {
        if (!empty($this->data)) {
            $this->limit = $this->data['limit'];
            $this->offset = $this->data['offset'];
        }
        return $this;
    }

    public function toArray($totalRecords = -1)
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
            'totalRecords' => $totalRecords,
        ];
    }

    public function hasLimit()
    {
        return $this->limit >= 0;
    }

    /**@var $query Builder */
    public function apply($query)
    {
        $query->offset($this->offset);
        $query->limit($this->limit);
    }

    /**
     * @return string
     * @var $sql string
     */
    public static function getCountQuery($sql)
    {
        $lowerSql = strtolower($sql);
        $matchers = [" from ", " from\n", "\nfrom ", "\nfrom\n"];
        $fromIndex = false;
        foreach ($matchers as $matcher) {
            $fromIndex = strpos($lowerSql, $matcher);
            if ($fromIndex) {
                break;
            }
        }
        if ($fromIndex) {
            return 'SELECT count(*) FROM ' . substr($sql, $fromIndex + 5);
        }
        return $sql;
    }
}