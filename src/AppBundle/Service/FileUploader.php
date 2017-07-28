<?php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    const FORCE_PETITE = '%kernel.project_dir%/web/uploads/images';

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move(self::FORCE_PETITE, $fileName);
        return $fileName;
    }
}
