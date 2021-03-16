<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait ClientTrait {

    /**
     * Get clients visible to user
     *
     * @return  stdClass
     */
    public function clients()
    {
        return $this->sendGetMessage( $this->baseUrl .'/v8/clients' );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createClient(array $data = array())
    {
        $data[ 'wid' ] = $this->workspaceId;
        $requestData = array(
            'client'        => $data
        );

        return $this->sendPostMessage( $this->baseUrl .'/v8/clients', $requestData );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   integer     $id         ID of the client
     * @return  stdClass
     */
    public function client($id)
    {
        return $this->sendGetMessage( $this->baseUrl .'/v8/clients/'. $id );
    }

    /**
     * Update a client
     *
     * @param   integer     $id         ID of the client
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateClient($id, array $data = array())
    {
        $requestData = array(
            'client'        => $data
        );

        return $this->sendPutMessage( $this->baseUrl .'/v8/clients/'. $id, $requestData );
    }

    /**
     * Delete a client
     *
     * @param   integer     $id         ID of the client
     * @return  stdClass
     */
    public function deleteClient($id)
    {
        return $this->sendDeleteMessage( $this->baseUrl .'/v8/clients/'. $id );
    }

    /**
     * Get client projects
     *
     * @param   integer     $id         ID of the project
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function clientProjects($id, array $data = array())
    {
        return $this->sendGetMessage( $this->baseUrl .'/v8/clients/'. $id .'/projects', $data );
    }

}
