<?php
require_once('BaseController.php');
class AdminController extends BaseController
{
    public function BeforeAction()
    {
        parent::BeforeAction();
        if($this->GetLocalUser()->UserLevel != 1){
            return $this->Redirect('/login');
        }
    }

    public function Index()
    {
        $this->Title = 'Control panel';
        return $this->View();
    }

    public function ViewFeedTypes()
    {
        $this->Title = 'Control panel: Feed Types';

        $feedTypes = $this->Models->FeedType->Where(array('IsDeleted' => 0));
        $this->Set('FeedTypes', $feedTypes);

        return $this->View();
    }

    public function CreateFeedType()
    {
        $this->Title = 'Control panel: Feed Types';

        if($this->IsPost()){
             $feedType = $this->Data->Parse('FeedType', $this->Models->FeedType);
             $feedType->Save();

             return $this->Redirect('/admin/viewfeedtypes');
        }else{
            $feedType = $this->Models->FeedType->Create();
            $this->Set('FeedType', $feedType);

            return $this->View();
        }
    }

    public function CloneFeedType($id = null)
    {
        if($id == null || $id == ''){
            return $this->HttpNotFound();
        }

        $originalFeedType = $this->Models->FeedType->Find($id);
        if($originalFeedType == null || $originalFeedType->IsDeleted == 1){
            return $this->HttpNotFound();
        }

        $originalData = $originalFeedType->Object();
        $originalData['Title'] = $originalData['Title'] . ' - Clone';
        unset($originalData['Id']);
        $feedType = $this->Models->FeedType->Create($originalData);
        $feedType->Save();

        return $this->Redirect('/admin/viewfeedtypes');
    }
    public function EditFeedType($id = null)
    {
        $this->Title = 'Control panel: Feed Types';

        if($id == null || $id == ''){
            return $this->HttpNotFound();
        }

        if(!$this->Models->FeedType->Any(array('Id' => $id, 'IsDeleted' => 0))){
            return $this->HttpNotFound();
        }

        if($this->IsPost()){
            $feedType = $this->Data->DbParse('FeedType', $this->Models->FeedType);
            $feedType->Save();

            return $this->Redirect('/admin/viewfeedtypes');
        }else{
            $feedType = $this->Models->FeedType->Find($id);

            if($feedType == null || $feedType->IsDeleted == 1){
                return $this->HttpNotFound();
            }

            $this->Set('FeedType', $feedType);
            return $this->View();
        }
    }
}