<?php namespace Modules\Texts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Venturecraft\Revisionable\Revisionable;

class TextCategory extends Revisionable
{
    use SoftDeletes;
	
	protected $fillable = [ 'title' ];
    protected $dates = ['deleted_at'];

	protected $revisionEnabled = true;
	protected $revisionCleanup = true;
	protected $historyLimit = 500; 

	public function textos()
	{
		return $this->hasMany('Modules\Texts\Models\Text');
	}

	public function scopeCategoria($query, $value)
	{
		$categoria = $query->get()->keyBy('title')->get($value);

		if(!$categoria) return 'null';

		return $categoria;
	}

	public function scopeTexto($query, $cat_value, $txt_value)
	{
		// Blade: {{ $categorias->texto('Diseño', 'Logos') }}
		
		$categoria = $query->categoria($cat_value);

		if($categoria === "null") return strtoupper($cat_value."?-".$txt_value);

		$texto = $categoria->textos->keyBy('title')->get($txt_value);

		if(!$texto) return strtoupper($cat_value."-".$txt_value."?");

		return $texto->body;
	}
}
