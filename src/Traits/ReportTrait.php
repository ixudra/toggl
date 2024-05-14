<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait ReportTrait {

    /**
     * Returns an overview of what users in the workspace are doing and have been doing
     *
     * @return  stdClass
     */
    public function dashboard()
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl . '/dashboard/'. $this->workspaceId );
    }

    /**
     * Returns the aggregated time entries data
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function summary(array $data = array())
    {
        return $this->sendGetMessage( $this->baseUrl .'/reports/api/v2/summary', $data );
    }

    /**
     * Returns the detailed time entries data
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function detailed(array $data = array())
    {
        return $this->sendGetMessage( $this->baseUrl .'/reports/api/v2/details', $data );
    }

    /**
     * Returns at-a glance information for a single project
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function projectReport($id, array $data = array())
    {
        $data[ 'project_id' ] = $id;

        return $this->sendGetMessage( $this->baseUrl .'/reports/api/v2/project', $data );
    }

}
