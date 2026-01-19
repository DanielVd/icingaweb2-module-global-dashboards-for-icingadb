# Global Dashboards Module for Icingaweb2 with Icinga DB

This module is a template for managing custom global dashboards in Icingaweb2 with Icinga DB. Fork this repository, customise the dashboards for your own needs, then deploy them to Icingaweb2 as you would any other module.

![Language](https://img.shields.io/github/languages/top/DanielVd/icingaweb2-module-global-dashboards-for-icingadb)
![License](https://img.shields.io/github/license/DanielVd/icingaweb2-module-global-dashboards-for-icingadb)
![Last commit](https://img.shields.io/github/last-commit/DanielVd/icingaweb2-module-global-dashboards-for-icingadb)
![Release](https://img.shields.io/github/v/release/DanielVd/icingaweb2-module-global-dashboards-for-icingadb)

---

## Setup

1. Fork the repository and add your own dashboards.
2. Install the module to Icingaweb2:

```bash
cd /usr/share/icingaweb2/modules
git clone https://github.com/DanielVd/icingaweb2-module-global-dashboards-for-icingadb ./global-dashboards-for-icingadb
```

3. Add access permissions to the roles that should have access to the `global-dashboards-for-icingadb` module.

---

## Configuration

To configure your own global dashboard, add the details for your dashboard to `configuration.php`.

The example below creates a new global dashboard with the name **Example**. The dashboard contains one element with the title **Tactical Overview** and points to:

`http(s)://icinga.your.domain/icingaweb2/icingadb/tactical`

```php
$dashboard = $this->dashboard(N_('Example'), array('priority' => 100));
$dashboard->add(
    N_('Tactical Overview'),
    'icingadb/tactical',
    100
);
```

### Restrict dashboards to a specific group

To further restrict access to dashboards to a specific group, add code within the module that explicitly adds dashboards for that group.

In the example below, only members of the `example_group` will get the global **Example** dashboard.

```php
if (in_array("example_group", $userGroups)) {
  $dashboard = $this->dashboard(N_('Example'), array('priority' => 100));
  $dashboard->add(
      N_('Tactical Overview'),
      'icingadb/tactical',
      100
  );
}
```

_Note: you will need to add permissions for that group's role as well._

---

## License

This project is based on an adapted fork of an existing Icingaweb2 module. The original repository did not specify a license.

All modifications and additions in this repository are licensed under the GNU General Public License v2.0 or later (GPL-2.0-or-later).

If the original author wishes to clarify or specify licensing terms, this repository can be updated accordingly.
