# Global Dashboards Module for Icingaweb2 with Icinga DB
This module is a template for managing custom global dashboards in Icingaweb2 with Icinga DB. Fork this repository, customise the dashboards for your own needs then deploy them to Icingaweb2 as you would any other module.

## Setup
1. Fork'd the repository and have added your own dashboards
2. Install the module to Icingaweb2
```
cd  /usr/share/icingaweb2/modules
git clone https://github.com/DanielVd/icingaweb2-module-global-dashboards-for-icingadb ./global-dashboards-for-icingadb
```
3. Add access permissions to the roles that should have access to the global-dashboards module.

## Configuration
To configure your own global dashbaord you need to add the details for your dashboard to `configuration.php`.

The example below would create a new global dashboard with the name Example, the dashboard would contain one element with the title Tactical Overview and the url it points to would be http(s)://icinga.your.domain/icingaweb2/icingadb/tactical
```
$dashboard = $this->dashboard(N_('Example'), array('priority' => 100));
$dashboard->add(
    N_('Tactical Overview'),
    'icingadb/tactical',
    100
);
```

To further restrict access to dashboards to specific group add code within the module that explictly adds dashboards for that group. 
In the example below only members of the `example_group` would get the global Example dashboard.
```
if (in_array("example_group", $userGroups)) {
  $dashboard = $this->dashboard(N_('Example'), array('priority' => 100));
  $dashboard->add(
      N_('Tactical Overview'),
      'icingadb/tactical',
      100
  );
}
```
_Note you will need to add permissions for that groups role as well._
