<?php

namespace core\managers;

use core\forms\PhotosForm;
use core\repositories\ObjectRepository;
use yii\base\Model;

class ObjectManager
{
    private $repository;
    public function __construct(
        ObjectRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function create($form,$withPhotos=false)
    {
        $subject=new $this->repository->subjectClass();
        $subject = $subject::create($form);
        if($withPhotos)
        {
            foreach ($form->photos->files as $file) {
                $subject->addPhoto($file);
            }
        }
        $this->repository->save($subject);
        return $subject;
    }

    public function edit($id, $form,$withPhotos=false)
    {
        $subject=$this->repository->get($id);
        $subject->edit($form);
        if($withPhotos)
        {
            foreach ($form->photos->files as $file) {
                $subject->addPhoto($file);
            }
        }
        $this->repository->save($subject);
    }

    public function remove($id)
    {
        $subject = $this->repository->get($id);
        $this->repository->remove($subject);
    }

    public function addPhotos($id, PhotosForm $form)
    {
        $subject = $this->repository->get($id);
        foreach ($form->files as $file) {
            $subject->addPhoto($file);
        }
        $this->repository->save($subject);
    }

    public function removePhoto($id, $photoId)
    {
        $subject = $this->repository->get($id);
        $subject->removePhoto($photoId);
        $this->repository->save($subject);
    }

}