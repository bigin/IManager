<?php namespace Imanager;

class Category
{
	/**
	 * @var integer - Category id
	 */
	public $id = null;

	/**
	 * @var string - Full file path
	 */
	public $file = null;

	/**
	 * @var string - Categorys file name
	 */
	public $filename = null;

	/**
	 * @var integer - Category position
	 */
	public $position = null;

	/**
	 * @var string - Name of the category
	 */
	public $name = null;

	/**
	 * @var string - Category permalink
	 */
	public $slug = null;

	/**
	 * @var string - Category created date
	 */
	public $created = null;

	/**
	 * @var string - Category updated date
	 */
	public $updated = null;

	/**
	 * Category constructor.
	 */
	public function __construct()
	{
		settype($this->id, 'integer');
		settype($this->position, 'integer');
	}

	public static function __set_state($an_array)
	{
		$_instance = new Category();
		foreach($an_array as $key => $val) {
			if(is_array($val)) $_instance->{$key} = $val;
			else $_instance->{$key} = $val;
		}
		return $_instance;
	}

	public function get($name){ return isset($this->{$name}) ? $this->{$name} : null; }

	/**
	 * Set category's attribut value
	 *
	 * @param $key
	 * @param $val
	 *
	 * @return bool
	 */
	public function set($key, $val)
	{
		$key = strtolower($key);
		$val = imanager('sanitizer')->text($val);
		// Allowed attributes
		if(!in_array($key, array('id', 'name', 'slug', 'position', 'created', 'updated'))) return false;
		if($key == 'slug') $val = imanager('sanitizer')->pageName($val);
		elseif($key == 'id' || $key == 'position') $val = (int) $val;
		$this->{$key} = $val;
	}

	public function save()
	{
		// Edit an existing category
		if(!is_null($this->id) && $this->id > 0)
		{
			$xml = simplexml_load_file($this->file);
			$this->updated = time();

			$xml->id = (int) $this->id;
			$xml->name = (string) $this->name;
			$xml->slug = (string) $this->slug;
			$xml->position = !is_null($this->position) ? (int) $this->position : (int) $this->id;
			$xml->created = $this->created;
			$xml->updated = time();

			if($xml->asXml($this->file)) {

				$cm = imanager()->getCategoryMapper();
				$cm->init();

				$cm->categories[$this->id] = $this;

				$export = var_export($cm->categories, true);
				file_put_contents($cm->path, '<?php return ' . $export . '; ?>');

				return true;
			}
		}
		// A new category
		else
		{
			$cm = imanager()->getCategoryMapper();
			$cm->init();

			$this->id = 1;
			if(!empty($cm->categories))
				$this->id = max(array_keys($cm->categories))+1;

			$this->file = IM_CATEGORYPATH.$this->id.IM_CATEGORY_SUFFIX;

			$xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><category></category>');

			$xml->name = (string) $this->name;
			$xml->slug = (string) $this->slug;
			$xml->position = !is_null($this->position) ? (int) $this->position : (int) $this->id;
			$xml->created = ($this->created) ? $this->created : time();
			$xml->updated = $xml->created;

			if($xml->asXml($this->file)) {

				$cm->categories[$this->id] = $this;

				$export = var_export($cm->categories, true);
				file_put_contents($cm->path, '<?php return ' . $export . '; ?>');

				return true;
			}
		}
	}
}