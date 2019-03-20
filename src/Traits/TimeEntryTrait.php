<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait TimeEntryTrait {

    /**
     * Get time entries started in a specific time range
     * @param   string      $startDate  Start of date range
     * @param   string      $endDate    End of date range
     * @return  stdClass
     */
    public function timeEntries($startDate, $endDate)
    {
        $requestData = array(
            'wid'           => $this->workspaceId,
            'start_date'    => $startDate,
            'end_date'      => $endDate,
        );

        return $this->sendGetMessage( 'https://www.toggl.com/api/v8/time_entries', $requestData );
    }

    /**
     * Create a time entry
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createTimeEntry(array $data = array())
    {
        $data[ 'wid' ] = $this->workspaceId;
        $requestData = array(
            'time_entry'    => $data
        );

        return $this->sendPostMessage( 'https://www.toggl.com/api/v8/time_entries', $requestData );
    }

    /**
     * Start a time entry
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function startTimeEntry(array $data = array())
    {
        $data[ 'wid' ] = $this->workspaceId;
        $requestData = array(
            'time_entry'    => $data
        );

        return $this->sendPostMessage( 'https://www.toggl.com/api/v8/time_entries/start', $requestData );
    }

    /**
     * Stop a time entry
     *
     * @param   integer     $id         ID of the time entry
     * @return  stdClass
     */
    public function stopTimeEntry($id)
    {
        return $this->sendPutMessage( 'https://www.toggl.com/api/v8/time_entries/'. $id .'/stop' );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   integer     $id         ID of the time entry
     * @return  stdClass
     */
    public function timeEntry($id)
    {
        return $this->sendGetMessage( 'https://www.toggl.com/api/v8/time_entries/'. $id );
    }
    
    /**
     * Summary report returns the aggregated time entries data
     *
     * @return  stdClass
     */
    public function entry()
    {
        return $this->sendGetMessage( 'https://www.toggl.com/api/v8/time_entries' );
    }

    /**
     * Get running time entry
     *
     * @return  stdClass
     */
    public function current()
    {
        return $this->sendGetMessage( 'https://www.toggl.com/api/v8/time_entries/current' );
    }

    /**
     * Update a time entry
     *
     * @param   integer     $id         ID of the time entry
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateTimeEntry($id, array $data = array())
    {
        $requestData = array(
            'time_entry'    => $data
        );

        return $this->sendPutMessage( 'https://www.toggl.com/api/v8/time_entries/'. $id, $requestData );
    }

    /**
     * Delete a time entry
     *
     * @param   integer     $id         ID of the time entry
     * @return  stdClass
     */
    public function deleteTimeEntry($id)
    {
        return $this->sendDeleteMessage( 'https://www.toggl.com/api/v8/time_entries/'. $id );
    }

}
