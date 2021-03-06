<?php
class JavascriptController extends Controller
{
    public function Feed()
    {
        $this->MimeType = 'application/javascript';

        $feedIds = $this->Parameters;
        $loadedFeeds = array();
        foreach($feedIds as $value){
            $feedType = $this->Models->FeedType->Find($value);
            $loadedFeeds[] = $feedType;
        }

        $loadedTemplatesNames = array();
        foreach($loadedFeeds as $loadedFeed){
            $loadedTemplatesNames[$loadedFeed->TemplateVariableName] = $loadedFeed->TemplateName;
        }

        $loadedTemplatesNames = array_unique($loadedTemplatesNames);

        $this->Set('LoadedTemplateNames', $loadedTemplatesNames);
        $this->Set('LoadedFeeds', $loadedFeeds);

        $this->Layout = null;
        return $this->View();
    }
}