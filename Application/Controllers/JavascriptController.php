<?php
require_once(APPLICATION_ROOT . '/' . APPLICATION_FOLDER . '/Utilities/DataSourcesHelper.php');
class JavascriptController extends Controller
{
    public function Feed()
    {
        $this->MimeType = 'application/javascript';

        $feedIds = $this->Parameters;
        $loadedFeeds = array();
        foreach($feedIds as $value){
            $loadedFeeds[] = FEEDS[$value];
        }

        $loadedTemplatesNames = array();
        foreach($loadedFeeds as $loadedFeed){
            $loadedTemplatesNames[$loadedFeed['TemplateVariableName']] = $loadedFeed['TemplateName'];
        }

        $loadedTemplatesNames = array_unique($loadedTemplatesNames);

        $this->Set('LoadedTemplateNames', $loadedTemplatesNames);
        $this->Set('LoadedFeeds', $loadedFeeds);

        $this->Layout = null;
        return $this->View();
    }
}