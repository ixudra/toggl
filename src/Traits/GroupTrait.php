<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait GroupTrait {

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createGroup(array $data = array())
    {
        $data[ 'wid' ] = $this->workspaceId;
        $requestData = array(
            'group'        => $data
        );

        return $this->sendPostMessage( 'https://www.toggl.com/api/v8/groups', $requestData );
    }

    /**
     * Update a group
     *
     * @param   integer     $id         ID of the group
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateGroup($id, array $data = array())
    {
        $requestData = array(
            'group'         => $data
        );

        return $this->sendPutMessage( 'https://www.toggl.com/api/v8/groups/'. $id, $requestData );
    }

    /**
     * Delete a group
     *
     * @param   integer     $id         ID of the group
     * @return  stdClass
     */
    public function deleteGroup($id)
    {
        return $this->sendDeleteMessage( 'https://www.toggl.com/api/v8/groups/'. $id );
    }

}