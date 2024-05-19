<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait ClientTrait {

    /**
     * Get workspace clients
     *
     * @return  stdClass
     */
    public function clients()
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/clients' );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createClient(array $data = array())
    {
        return $this->sendPostMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/clients', $data );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   integer     $id         ID of the client
     * @return  stdClass
     */
    public function client(int $id)
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/clients/'. $id );
    }

    /**
     * Update a client
     *
     * @param   integer     $id         ID of the client
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateClient(int $id, array $data = array())
    {
        return $this->sendPutMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/clients/'. $id, $data );
    }

    /**
     * Delete a client
     *
     * @param   integer     $id         ID of the client
     * @return  stdClass
     */
    public function deleteClient(int $id)
    {
        return $this->sendDeleteMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/clients/'. $id );
    }

    /**
     * Archives client
     *
     * @param   integer     $id         ID of the client
     * @return  stdClass
     */
    public function archiveClient(int $id)
    {
        return $this->sendPostMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/clients/'. $id );
    }

    /**
     * Restores client and related projects
     *
     * @param   integer     $id         ID of the client
     * @return  stdClass
     */
    public function restoreClient(int $id, array $data = array())
    {
        return $this->sendPostMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/clients/'. $id, $data );
    }
}
