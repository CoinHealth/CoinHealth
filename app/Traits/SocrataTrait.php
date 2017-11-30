<?php namespace App\Traits;

trait SocrataTrait
{
    public function where($arr)
    {
        $url = '';
		$tmp = [];
		$based = $arr['$order'];
		unset($arr['$order']);
		foreach ($arr as $key => $value) {
			array_push($tmp, "{$key} = '{$value}'");
		}
		return implode(" and ", $tmp);
    }

    public function order($arr = [])
    {
        return $arr['$order'];
    }
}
