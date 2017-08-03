<?php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Optimizer
{
    public function optimize()
    {
        $dir = '%kernel.project_dir%/web/uploads/images/';
		$image = $observation->getImage()->getImage();
		\Tinify\setKey("YN-tD6vaVHxYTx8XcfBLKFrlzXwwxgLi");
		$source = \Tinify\fromFile($dir.$image);
		$source->toFile($dir."/optimized/".$image);

		unlink('%kernel.project_dir%/web/uploads/images/'.$image ) ; 
    }
}
