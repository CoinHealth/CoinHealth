<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {

	protected $fillable = [
		'user_id',
		'title',
		'path',
		'mime_type',
		'data_id',
		'data_model',
		'file_type'
	];

	protected $appends = [
		'display_path',
		'is_image',
		'hashed_id',
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function getHashedIdAttribute()
	{
		$hash = new \Hashids\Hashids(env('HASH_SALT', 'c@r3p@rR0t'), 30);
		return $hash->encode($this->id);
	}

	public function getDisplayPathAttribute()
	{
		return $this->mime_type === 'image/jpeg' ? $this->path : '/assets/icons/doc.png';
	}

	public function attachable()
	{
		return $this->morphTo('attachable', 'data_model', 'data_id');
	}

	public function scopeAvatars($qry)
	{
		return $qry->where('file_type', 1);
	}
	// IMPORTANT
	public function getFileTypeTextAttribute()
	{
		$vals = [
			1 => 'Avatar',
			2 => 'Messages',
			3 => 'Replies',
			4 => 'Posts',
			5 => 'Insurance Card (Front)',
			6 => 'Insurance Card (Back)',
			7 => 'Signatures',
			8 => 'CareParrot ID',
			9 => 'Secondary Insurance Card (Front)',
			10 => 'Secondary Insurance Card (Back)',
			11 => 'Laboratory',
		];
		return $vals[$this->getAttribute('file_type')];
	}

	public function getIsImageAttribute()
	{
		return boolval(strstr($this->mime_type, "image/"));
	}

	public function getImagePath($size = null)
	{
		if (!$this->path)
			return $this->path;

		$pathinfo = pathinfo($this->path);
		if (!is_null($size) || $size)
			$size = '-'.$size;

		return $pathinfo['dirname'] .'/'. $pathinfo['filename'] . $size .'.'. $pathinfo['extension'];
	}
}
