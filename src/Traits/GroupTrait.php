<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait GroupTrait {

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   integer     $organizationId     ID of the organization for which the request is to be executed
     * @param   array       $data               Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createGroup(int $organizationId, array $data = array())
    {
        return $this->sendPostMessage( $this->baseUrl . $this->apiVersionUrl . '/organizations/'. $organizationId .'/groups', $data );
    }

    /**
     * Update a group
     *
     * @param   integer     $organizationId     ID of the organization for which the request is to be executed
     * @param   integer     $id                 ID of the group
     * @param   array       $data               Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateGroup(int $organizationId, int $id, array $data = array())
    {
        return $this->sendPostMessage( $this->baseUrl . $this->apiVersionUrl . '/organizations/'. $organizationId .'/groups/'. $id, $data );
    }

    /**
     * Delete a group
     *
     * @param   integer     $organizationId     ID of the organization for which the request is to be executed
     * @param   integer     $id                 ID of the group
     * @return  stdClass
     */
    public function deleteGroup(int $organizationId, int $id)
    {
        return $this->sendDeleteMessage( $this->baseUrl . $this->apiVersionUrl . '/organizations/'. $organizationId .'/groups/'. $id );
    }

}
