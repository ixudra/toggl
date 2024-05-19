<?php namespace Ixudra\Toggl;


use Ixudra\Curl\Builder;
use Ixudra\Curl\CurlService;
use Ixudra\Toggl\Exceptions\InvalidConfigurationException;
use Ixudra\Toggl\Traits\ClientTrait;
use Ixudra\Toggl\Traits\DetailedReportUtilityTrait;
use Ixudra\Toggl\Traits\GroupTrait;
use Ixudra\Toggl\Traits\InvitationsTrait;
use Ixudra\Toggl\Traits\ProjectTrait;
use Ixudra\Toggl\Traits\ReportTrait;
use Ixudra\Toggl\Traits\ReportUtilityTrait;
use Ixudra\Toggl\Traits\TagTrait;
use Ixudra\Toggl\Traits\TaskTrait;
use Ixudra\Toggl\Traits\TimeEntryTrait;
use Ixudra\Toggl\Traits\UserTrait;
use Ixudra\Toggl\Traits\WorkspaceUsersTrait;
use stdClass;

class TogglService {

    use ClientTrait, DetailedReportUtilityTrait, GroupTrait, InvitationsTrait, TagTrait, TaskTrait, ProjectTrait, ReportTrait, ReportUtilityTrait, TimeEntryTrait, UserTrait, WorkspaceUsersTrait;


    /** @var CurlService $curlService */
    protected $curlService = null;

    /** @var integer $workspaceId */
    protected $workspaceId = null;

    /** @var string $apiToken */
    protected $apiToken = null;

    /** @var string $baseUrl */
    protected $baseUrl = null;

    /** @var string $apiVersion */
    protected $apiVersionUrl = null;


    public function __construct(?int $workspaceId = null, ?string $apiToken = null)
    {
        $this->workspaceId = $workspaceId;
        $this->apiToken = $apiToken;
        $this->baseUrl = 'https://api.track.toggl.com';
        $this->apiVersionUrl = '/api/v9';
    }


    public function setWorkspace(int $workspaceId)
    {
        $this->workspaceId = $workspaceId;
    }

    public function setApiToken(string $apiToken)
    {
        $this->apiToken = $apiToken;
    }

    /**
     * Send a GET message to the Toggl API
     *
     * @param   string      $url        Url to which the request is to be sent
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    protected function sendGetMessage(string $url, array $data = array())
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
    protected function sendPostMessage(string $url, array $data = array())
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
    protected function sendPutMessage(string $url, array $data = array())
    {
        return $this->prepareMessage( $url, $data )
            ->put();
    }

    /**
     * Send a PATCH message to the Toggl API
     *
     * @param   string      $url        Url to which the request is to be sent
     * @param array         $data       Data payload that is to be sent with the request
     *
     * @return  stdClass
     */
    protected function sendPatchMessage(string $url, array $data = array())
    {
        return $this->prepareMessage( $url, $data )
            ->patch();
    }

    /**
     * Send a DELETE message to the Toggl API
     *
     * @param   string      $url        Url to which the request is to be sent
     * @return  stdClass
     */
    protected function sendDeleteMessage(string $url)
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
    protected function prepareMessage(string $url, array $data = array())
    {
        if( empty($this->workspaceId) ) {
            throw new InvalidConfigurationException('Workspace ID is required. Please add a valid workspace ID in the configuration file or set it via the setWorkspace() method.');
        }

        if( empty($this->apiToken) ) {
            throw new InvalidConfigurationException('API token is required. Please add a valid API token in the configuration file.');
        }

        $data[ 'workspace_id' ] = (int) $this->workspaceId;
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
