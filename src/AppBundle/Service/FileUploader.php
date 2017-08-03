<?php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    const PATH = '%kernel.project_dir%/web/uploads/images';

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move(self::PATH, $fileName);
        return $fileName;
    }
}
