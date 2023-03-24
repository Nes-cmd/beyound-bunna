<?php
namespace App\MyClasses;
use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ImageFilter implements FilterInterface
{
	private $fit;
    private $height;
	const FIT = 400;
    const HEIGHT = 400;
	function __construct($fit = null, $height = null)
	{
		$this->fit = is_numeric($fit)? $fit:self::FIT;
		$this->height = is_numeric($height)? $height:self::HEIGHT;
	}
	public function applyFilter(Image $image)
	{
		$image->fit($this->fit, $this->height);
		return $image;
	}
}
?>