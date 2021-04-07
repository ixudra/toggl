<?php namespace Ixudra\Toggl;


use Ixudra\Curl\Builder;
use Ixudra\Curl\CurlService;
use Ixudra\Toggl\Traits\ClientTrait;
use Ixudra\Toggl\Traits\DetailedReportUtilityTrait;
use Ixudra\Toggl\Traits\GroupTrait;
use Ixudra\Toggl\Traits\ProjectTrait;
use Ixudra\Toggl\Traits\ReportTrait;
use Ixudra\Toggl\Traits\ReportUtilityTrait;
use Ixudra\Toggl\Traits\TagTrait;
use Ixudra\Toggl\Traits\TaskTrait;
use Ixudra\Toggl\Traits\TimeEntryTrait;
use Ixudra\Toggl\Traits\WorkspaceTrait;
use Ixudra\Toggl\Traits\WorkspaceUsersTrait;
use stdClass;

class TogglService {

    use ReportTrait, DetailedReportUtilityTrait, ReportUtilityTrait, ClientTrait, TaskTrait, TagTrait, GroupTrait, ProjectTrait, TimeEntryTrait, WorkspaceTrait, WorkspaceUsersTrait;


    /** @var CurlService $curlService */
    protected $curlService = null;

    /** @var integer $workspaceId */
    protected $workspaceId = null;

    /** @var string $apiToken */
    protected $apiToken = null;

    /** @var string $baseUrl */
    protected $baseUrl = null;


    public function __construct($workspaceId = null, $apiToken = null)
    {
        $this->workspaceId = $workspaceId;
        $this->apiToken = $apiToken;
        $this->baseUrl = 'https://api.track.toggl.com/api';
    }


    /**
     * Send a GET message to the Toggl API
     *
     * @param   string      $url        Url to which the request is to be sent
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    protected function sendGetMessage($url, array $data = array())
    {
        return $this->prepareMessage( $url, $data )
            ->get();
    }

    /**
     * Send a POST message to the Toggl API
     *
     * @param   string      $url        Url to which the request is to be sent
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    protected function sendPostMessage($url, array $data = array())
    {
        return $this->prepareMessage( $url, $data )
            ->post();
    }

    /**
     * Send a PUT message to the Toggl API
     *
     * @param   string      $url        Url to which the request is to be sent
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    protected function sendPutMessage($url, array $data = array())
    {
        return $this->prepareMessage( $url, $data )
            ->put();
    }

    /**
     * Send a DELETE message to the Toggl API
     *
     * @param   string      $url        Url to which the request is to be sent
     * @return  stdClass
     */
    protected function sendDeleteMessage($url)
    {
        return $this->prepareMessage( $url )
            ->delete();
    }

    /**
     * Prepare a request that is to be sent to the Toggl API
     *
     * @param   string      $url        Url to which the request is to be sent
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  Builder
     */
    protected function prepareMessage($url, array $data = array())
    {
        $data[ 'workspace_id' ] = $this->workspaceId;
        $data[ 'user_agent' ] = 'ixudra';

        return $this->getCurlService()
            ->to( $url )
            ->withOption('USERPWD', $this->apiToken .':api_token')
            ->withData( $data )
            ->asJson();
    }


    /**
     * Return an instance of the Ixudra\Curl\CurlService
     *
     * @return  CurlService
     */
    protected function getCurlService()
    {
        if( is_null($this->curlService) ) {
            $this->curlService = new CurlService();
        }

        return $this->curlService;
    }

}
