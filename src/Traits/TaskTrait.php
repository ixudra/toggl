<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait TaskTrait {

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createTask(array $data = array())
    {
        $data[ 'wid' ] = $this->workspaceId;
        $requestData = array(
            'task'          => $data
        );

        return $this->sendPostMessage( 'https://www.toggl.com/api/v8/tasks', $requestData );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   integer     $id         ID of the task
     * @return  stdClass
     */
    public function task($id)
    {
        return $this->sendGetMessage( 'https://www.toggl.com/api/v8/tasks/'. $id );
    }

    /**
     * Update a task
     *
     * @param   integer     $id         ID of the task
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateTask($id, array $data = array())
    {
        $requestData = array(
            'task'          => $data
        );

        return $this->sendPutMessage( 'https://www.toggl.com/api/v8/tasks/'. $id, $requestData );
    }

    /**
     * Delete a task
     *
     * @param   integer     $id         ID of the task
     * @return  stdClass
     */
    public function deleteTask($id)
    {
        return $this->sendDeleteMessage( 'https://www.toggl.com/api/v8/tasks/'. $id );
    }

}