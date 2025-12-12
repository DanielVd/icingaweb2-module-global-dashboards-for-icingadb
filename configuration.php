<?php

use Icinga\Authentication\Auth;

$userGroups = "";

$auth = Auth::getInstance();
if ($auth->isAuthenticated()) {
  $userGroups = $auth->getUser()->getGroups();
  //var_dump($userGroups);
  //exit;
}

## If we want dashboards for specific user groups hard code them in a if statement like this
#if (in_array("<USERGROUPNAME>", $userGroups)) {
#
#}

## All users see these
/*
 * Example
 */
$dashboard = $this->dashboard(N_('Example'), array('priority' => 100));
$dashboard->add(
    N_('Tactical Overview'),
    'icingadb/tactical',
    100
);
$dashboard->add(
    N_('Service Problems'),
    'icingadb/services?service.state.is_problem=y&sort=service.state.severity%20desc',
    110
);
$dashboard->add(
    N_('Host Problems'),
    'icingadb/hosts?host.state.is_problem=y&sort=host.state.severity%20desc',
    120
);

