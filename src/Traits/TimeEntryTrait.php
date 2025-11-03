<?php namespace Ixudra\Toggl\Traits;


use Carbon\Carbon;
use stdClass;

trait TimeEntryTrait {

    /**
     * Get time entries started in a specific time range
     *
     * @param   Carbon|null      $startDate  Start of date range
     * @param   Carbon|null      $endDate    End of date range
     * @return  stdClass
     */
    public function timeEntries(?Carbon $startDate, ?Carbon $endDate)
    {
        $requestData = array();
        if( !empty($startDate) || !empty($endDate) ) {
            $requestData = [
                'start_date'    => $startDate->toDateString(),
                'end_date'      => $endDate->toDateString(),
            ];
        }

        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl . '/me/time_entries', $requestData );
    }

    /**
     * Create a time entry
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createTimeEntry(array $data = array())
    {
        return $this->sendPostMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/time_entries', $data);
    }

    /**
     * Stop a time entry
     *
     * @param   int         $id         ID of the time entry
     * @return  stdClass
     */
    public function stopTimeEntry(int $id)
    {
        return $this->sendPatchMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/time_entries/'. $id .'/stop' );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   int         $id         ID of the time entry
     * @return  stdClass
     */
    public function timeEntry(int $id)
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl . '/me/time_entries/'. $id );
    }

    /**
     * Get running time entry
     *
     * @return  stdClass
     */
    public function current()
    {
        return $this->sendGetMessage( $this->baseUrl . $this->apiVersionUrl . '/me/time_entries/current' );
    }

    /**
     * Update a time entry
     *
     * @param   int         $id         ID of the time entry
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateTimeEntry(int $id, array $data = array())
    {
        return $this->sendPutMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/time_entries/'. $id, $data);
    }

    /**
     * Delete a time entry
     *
     * @param   int         $id         ID of the time entry
     * @return  stdClass
     */
    public function deleteTimeEntry(int $id)
    {
        return $this->sendDeleteMessage( $this->baseUrl . $this->apiVersionUrl .'/workspaces/'. $this->workspaceId .'/time_entries/'. $id );
    }

}
