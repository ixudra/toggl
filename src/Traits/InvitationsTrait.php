<?php

namespace Ixudra\Toggl\Traits;

use stdClass;

trait InvitationsTrait
{
    /**
     * Accepts invitation
     *
     * @param string $invitationCode
     * @return stdClass
     */
    public function acceptInvitation(string $invitationCode)
    {
        return $this->sendPostMessage($this->baseUrl . $this->apiVersionUrl .'/organizations/invitations/'. $invitationCode .'/accept');
    }

    /**
     * Rejects invitation
     *
     * @param string $invitationCode
     * @return stdClass
     */
    public function rejectsInvitation(string $invitationCode)
    {
        return $this->sendPostMessage($this->baseUrl . $this->apiVersionUrl .'/organizations/invitations/'. $invitationCode .'/reject');
    }

    /**
     * Creates a new invitation for the user
     *
     * @param integer $organizationId
     * @param array $data
     * @return stdClass
     */
    public function inviteUsers(int $organizationId, array $data = [])
    {
        $requestData = [
            'emails' => $data,
        ];

        return $this->sendPostMessage($this->baseUrl . $this->apiVersionUrl .'/organizations/'. $organizationId .'/invitations', $requestData);
    }

    /**
     * Resends user their invitation
     *
     * @param integer $organizationId
     * @param string $invitationCode
     * @return stdClass
     */
    public function resendInvitation(int $organizationId, string $invitationCode)
    {
        return $this->sendPutMessage($this->baseUrl . $this->apiVersionUrl .'/organizations/'. $organizationId .'/invitations/'. $invitationCode .'/resend');
    }
}
